<?php
//Create interfaces that declare the methods used in the traits
interface PointInterface {
    public function move($dx, $dy);
}

interface ColorInterface{
    public function changeColor($newColor);
}

//Define the traits
trait PointOperations {
    public function move($dx, $dy) {
        $this->x += $dx;
        $this->y += $dy;
        echo "Moved to new coordinates: ({$this->x}, {$this->y})\n";
    }
}

trait ColorOperations {
    public function changeColor($newColor){
        $this->color=$newColor;
        echo "Color changed to: {$this->color}\n";
    }
}

class Point{
    protected $x;
    protected $y;

    public function __construct($x, $y){
        $this->x=$x;
        $this->y=$y;
    }

    public function getCoordinates(){
        return "Coordinates: ({$this->x},{$this->y})";
    }
}

class ColoredPoint extends Point implements PointInterface, ColorInterface {
    use PointOperations, ColorOperations;

    private $color;

    public function __construct($x, $y, $color) {
        parent::__construct($x, $y);
        $this->color = $color;
    }

    public function getColor() {
        return "Color: {$this->color}";
    }

    public function getDescription() {
        return $this->getCoordinates() . ", " . $this->getColor();
    }
}

// Testing the implementation
$colorPoint = new ColoredPoint(10, 20, "Red");
echo $colorPoint->getDescription() . "\n";

echo"<br>";
$colorPoint->move(5, -10);       // Move the point
echo"<br>";
$colorPoint->changeColor("Blue"); // Change color
?>