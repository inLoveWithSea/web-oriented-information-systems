<?php
abstract class Point{
    public $x;
    public $y;

    function __construct($x, $y){
    $this->x = $x;
    $this->y = $y;
    }

    abstract function show();
}

class ColoredPoint extends Point{

    public $color;

    function __construct($x, $y, $color){
        parent::__construct($x, $y);
        $this->color = $color;
    }

    function show(){
        echo "This point's coordinates are (".$this->x.", ".$this->y."), it's color is ".$this->color."<br>";
    }

}

class point3D extends Point{

    public $z;

    function __construct($x, $y, $z){
        parent::__construct($x, $y);
        $this->z = $z;
    }

    function show(){
        echo "This point's coordinates are (".$this->x.", ".$this->y.", ".$this->z.")<br>";
    }

}

$point1=new ColoredPoint(0.5, -2, "red");
echo 'Colored Point:<br>';
$point1->show();

$point2=new point3D(15, -0.2, 7);
echo '<br>3D Point:<br>';
$point2->show();
?>