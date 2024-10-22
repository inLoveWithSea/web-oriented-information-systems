<?php
abstract class PointFactory{
    public abstract function createPoint ($x, $y, $color):Point;
}

class IndividualPointFactory extends PointFactory{
    public function createPoint ($x, $y, $color):Point
    { 
        return new IndividualPoint($x, $y, $color);//returns an class object
    }
}

class ColoredPointFactory extends PointFactory{
    public function createPoint ($x, $y, $color):Point
    { 
        return new ColoredPoint($x, $y, $color);//returns an class object
    }
}

interface Point
{
    public function getInfo(): string;
}

trait PointInfo{
    private $x;
    private $y;
    private $color;

    public function __construct($x, $y, $color){
        $this->x=$x;
        $this->y=$y;
        $this->color=$color;
    }
}

class IndividualPoint implements Point{
    use PointInfo;

    public function getInfo(): string{
        return "Individual point: ({$this->x};{$this->y}), Color: {$this->color}";
    }
}

class ColoredPoint implements Point{
    use PointInfo;
    public function getInfo(): string
    {
        return "Colored point: ({$this->x};{$this->y}), Color: {$this->color}";
    }
}

$factory=new IndividualPointFactory();
$point1=$factory->createPoint(16,-2,'Red');
$factory=new ColoredPointFactory();
$point2=$factory->createPoint(1,-20,'Green');

echo $point1->getInfo() . "<br/>";
echo $point2->getInfo() . "<br/>";
?>