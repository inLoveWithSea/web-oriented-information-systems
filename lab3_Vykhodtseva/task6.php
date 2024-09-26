<?php
interface Figure{
    public function draw();
    public function erase();
    public function move();
    public function getColor();
    public function setColor($color);
}

class Circle implements Figure{

    private $radius;
    private $centerX;
    private $centerY;

    public function __construct($centerX, $centerY, $radius)
    {
        $this->centerX=$centerX;
        $this->centerY=$centerY;
        $this->radius=$radius;
    }

    public function draw(){
        echo <<<EOT
        Circle: center ($this->centerX, $this->centerY), radius = $this->radius
        EOT;
    }

    public function erase(){
        echo'<br>Circle object erased<br>';
    }

    public function move(){}
    public function getColor(){}
    public function setColor($color){}
}

class Triangle implements Figure{
    private $x1;
    private $y1;
    private $x2;
    private $y2;
    private $x3;
    private $y3;

    public function __construct($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $this->x1=$x1;
        $this->y1=$y1;
        $this->x2=$x2;
        $this->y2=$y2;
        $this->x3=$x3;
        $this->y3=$y3;
    }

    public function draw(){
        echo <<<EOT
        Triangle: vertex 1 ($this->x1, $this->y1), vertex 2 ($this->x2, $this->y2), vertex 3 ($this->x3, $this->y3)
        EOT;
    }
    
    public function erase(){
        echo'<br>Triangle object erased<br>';
    }
    
    public function move(){}
    public function getColor(){}
    public function setColor($color){}
    
} 

class Square implements Figure{

    private $side;
    private $centerX;
    private $centerY;

    public function __construct($centerX, $centerY, $side)
    {
        $this->centerX=$centerX;
        $this->centerY=$centerY;
        $this->side=$side;
    }
    public function draw(){
        echo <<<EOT
        Square: center ($this->centerX, $this->centerY), side = $this->side
        EOT;
    }
    
    public function erase(){
        echo'<br>Square object erased<br>';
    }
    
    public function move(){}
    public function getColor(){}
    public function setColor($color){}

} 

echo 'Creating Circle object:<br>';
$circle=new Circle(0.05, 4, 13);
$circle->draw();
$circle->erase();

echo '<br>Creating Square object:<br>';
$square=new Square(2, 3, 12);
$square->draw();
$square->erase();

echo '<br>Creating Triangle object:<br>';
$triangle=new Triangle(1,-4,0,9.7,0.06,-10);
$triangle->draw();
$triangle->erase();
?>