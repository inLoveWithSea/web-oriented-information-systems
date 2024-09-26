<?php
abstract class Shape //basic class
{ 
    protected $centerX;
    protected $centerY;

    public function __construct($centerX, $centerY) {
        $this->centerX = $centerX;
        $this->centerY = $centerY;
    }

    abstract public function area();//finding of area

    abstract public function center();//method to dispaly center coordinates 
}  

class Circle extends Shape 
{    
    private $radius;

    public function __construct($centerX, $centerY, $radius) {
        parent::__construct($centerX, $centerY); // Call the parent constructor
        $this->radius = $radius;
    }

    // Implementing the abstract method
    public function area() {
        return pi() * pow($this->radius, 2);
    } 

    // Implementing the abstract method
    public function center() {
        echo "Circle center is at ($this->centerX, $this->centerY)<br>";
    }
} 

class Rectangle extends Shape 
{  
    private $width;
    private $height;

    public function __construct($centerX, $centerY, $width, $height) {
        parent::__construct($centerX, $centerY); // Call the parent constructor
        $this->width = $width;
        $this->height = $height;
    }

    // Implementing the abstract method
    public function area() {
        return $this->width * $this->height;
    }

    // Implementing the abstract method
    public function center() {
        echo "Rectangle center is at ($this->centerX, $this->centerY)<br>";
    } 
} 

// Create a Rectangle instance
$rectangle=new Rectangle(0.5,2,12,8);
echo 'Rectangle area is '. $rectangle->area() .'<br>';
$rectangle->center();

// Create a Circle instance
$circle=new Circle(1, -6, 13);
echo '<br>Circle area is '. $circle->area() .'<br>';
$circle->center();
?>