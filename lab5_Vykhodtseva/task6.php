<?php
/**class Point
{     
    public $x;
    public $y;
    public $color;

    public function __construct($x, $y, $color) //setting all attributes
    { 
        $this->x = $x; 
        $this->y = $y; 
        $this->color = $color; 
    } 

    public function getAttributes() //getting attributes
    { 
        return $this->x . ' ' . $this->y. ' ' . $this->color; 
    } 
} 

class PointFactory //factory template
{     
    public static function create($x, $y, $color) 
    { 
        return new Point($x, $y, $color);//returns an class object
    } 
} 

// have the factory create the Point object 

$point1 = PointFactory::create(13,-2,'Red');//creating an class object 
print_r($point1->getAttributes());
?>