<?php

require_once 'Point.php';

class Circle extends Point {
    protected $radius;

    public function __construct(float $x=0, float $y=0, float $radius=0) {
        parent::__construct($x, $y);  // Call parent constructor to initialize the point
        $this->radius = $radius;
    }

    public function display() {
        echo "Circle center: ($this->x, $this->y), Radius: $this->radius";
    }

    public function area() {
        return pi() * $this->radius * $this->radius;
    }

    public function getRadius(): float {
        return $this->radius;
    }

    public function __destruct()
    {
        parent::__destruct();
    }
}
?>