<?php
class Point {
    protected $x;
    protected $y;

    private static $instanceCount = 0; // Static field to keep track of instances

    public function __construct(float $x=0, float $y=0) {
        $this->x = $x;
        $this->y = $y;
        self::$instanceCount++; // Increment the instance count in the constructor
    }

    // Static method to return the instance count
    public static function getInstanceCount() {
        return self::$instanceCount;
    }

    public function getX(): float {
        return $this->x;
    }

    public function getY(): float {
        return $this->y;
    }

    public function display() {
        echo "Point ($this->x, $this->y)";
    }

    public function __destruct()
    {
        echo 'Destroying ',$this->display();
    }
}
?>