<?php

class Point { // Creating Point class
    // Create public variables
    public $x;
    public $y;
    public $color;

    // Method to set X value
    public function set_x($x) {
        if (!isset($x)) {
            exit('X coordinate does not exist');
        }
        $this->x = $x;
    }

    // Method to get X value
    public function get_x(): float {
        return $this->x;
    }

    // Method to show X value
    public function show_x() {
        echo "X: $this->x<br>";
    }

    // Method to set Y value
    public function set_y($y) {
        if (!isset($y)) {
            exit('Y coordinate does not exist');
        }
        $this->y = $y;
    }

    // Method to get Y value
    public function get_y(): float {
        return $this->y;
    }

    // Method to show Y value
    public function show_y() {
        echo "Y: $this->y<br>";
    }

    // Method to set color value
    public function set_color($color) {
        if (!isset($color)) {
            exit('Color does not exist');
        }
        $this->color = $color;
    }

    // Method to get color value
    public function get_color(): string {
        return $this->color;
    }

    // Method to show color value
    public function show_color() {
        echo "Color: $this->color<br>";
    }

    // Method to search for field specified in field variable and check value for equality
    public function search($field, $value): bool {
        switch ($field) {
            case 'color':
                return $this->color === $value;
            case 'x':
                return $this->x === $value;
            case 'y':
                return $this->y === $value;
            default:
                return false; // Search field not found
        }
    }
}

// Adapter class for Point
class PointAdapter {
    private $point;

    public function __construct(Point $point) {
        $this->point = $point;
    }

    public function setCoordinates($x, $y) {
        $this->point->set_x($x);
        $this->point->set_y($y);
    }

    public function setColor($color) {
        $this->point->set_color($color);
    }

    public function displayPoint() {
        echo "Coordinates and Color:<br>";
        $this->point->show_x();
        $this->point->show_y();
        $this->point->show_color();
        echo '<br>';
    }

    public function search($field, $value): bool {
        return $this->point->search($field, $value);
    }
}

// Creating 3 instances of Point class and their adapters
$point1 = new Point();
$point1Adapter = new PointAdapter($point1);
$point1Adapter->setCoordinates(10, -10.2);
$point1Adapter->setColor('Red');

$point2 = new Point();
$point2Adapter = new PointAdapter($point2);
$point2Adapter->setCoordinates(1, 13);
$point2Adapter->setColor('Blue');

$point3 = new Point();
$point3Adapter = new PointAdapter($point3);
$point3Adapter->setCoordinates(-4, 1.5);
$point3Adapter->setColor('Green');

// Display instances using adapters
echo 'Point 1<br>';
$point1Adapter->displayPoint();

echo 'Point 2<br>';
$point2Adapter->displayPoint();

echo 'Point 3<br>';
$point3Adapter->displayPoint();
?>
