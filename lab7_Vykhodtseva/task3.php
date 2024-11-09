<?php
interface PointHandler {
    public function setNext(PointHandler $handler): PointHandler;
    public function handle(Point $point); 
}

abstract class AbstractPointHandler implements PointHandler {
    private ?PointHandler $nextHandler = null;

    public function setNext(PointHandler $handler): PointHandler {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(Point $point) {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($point);
        }
        return null;
    }
}

class Point {
    public int $x;
    public int $y;
    public string $color;

    public function __construct(int $x, int $y, string $color) {
        $this->x = $x;
        $this->y = $y;
        $this->color = $color;
    }
}

class ColorHandler extends AbstractPointHandler {
    private string $requiredColor;

    public function __construct(string $requiredColor) {
        $this->requiredColor = $requiredColor;
    }

    public function handle(Point $point) {
        if ($point->color !== $this->requiredColor) {
            return "Point color is not " . $this->requiredColor . "."."<br>";
        }
        return parent::handle($point);
    }
}

class XCoordinateHandler extends AbstractPointHandler {
    private int $minX;
    private int $maxX;

    public function __construct(int $minX, int $maxX) {
        $this->minX = $minX;
        $this->maxX = $maxX;
    }

    public function handle(Point $point) {
        if ($point->x < $this->minX || $point->x > $this->maxX) {
            return "Point x-coordinate is out of bounds."."<br>";
        }
        return parent::handle($point);
    }
}

class YCoordinateHandler extends AbstractPointHandler {
    private int $minY;
    private int $maxY;

    public function __construct(int $minY, int $maxY) {
        $this->minY = $minY;
        $this->maxY = $maxY;
    }

    public function handle(Point $point) {
        if ($point->y < $this->minY || $point->y > $this->maxY) {
            return "Point y-coordinate is out of bounds."."<br>";
        }
        return parent::handle($point);
    }
}

// Sample points to test
$points = [
    new Point(5, 10, 'red'),   // Valid point
    new Point(15, 10, 'red'),  // x-coordinate out of range
    new Point(5, 20, 'red'),   // y-coordinate out of range
    new Point(5, 10, 'blue'),  // Color mismatch
    new Point(7, 12, 'red'),   // Valid point within range
];

// Set up the chain of responsibility
$colorHandler = new ColorHandler('red');
$xHandler = new XCoordinateHandler(0, 10);
$yHandler = new YCoordinateHandler(0, 15);

// Link the handlers
$colorHandler->setNext($xHandler)->setNext($yHandler);

// Test each point in the list
foreach ($points as $index => $point) {
    echo "<br>"."Testing Point {$index} (x: {$point->x}, y: {$point->y}, color: {$point->color})"."<br>";
    $result = $colorHandler->handle($point);
    echo $result ?: "Point is valid within the defined constraints."."<br>";
    echo "\n\n";
}
?>