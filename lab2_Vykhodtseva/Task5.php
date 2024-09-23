<?php
require_once 'Point.php';
require_once 'Circle.php';

echo 'Creating Objects<br><br>';

// Create instances of Point
$point1 = new Point(1, 2);
$point2 = new Point(3, 4);

// Create instances of Circle
$circle1 = new Circle(5, 6, 7);
$circle2 = new Circle(8, 9, 10);

//Display objects
$point1->display();
echo '<br>';
$point2->display();
echo '<br>';
$circle1->display();
echo '<br>';
$circle2->display();
echo '<br>';

// Get instance counts
echo '<br>Calling static method<br><br>';
echo "Total number of instances created: " . Point::getInstanceCount() . "<br>";
echo '<hr>';

echo 'Destroying Objects<br><br>';
$point1 = null;
echo '<br>';
$point2 = null;
echo '<br>';
$circle1 = null;
echo '<br>';
$circle2 = null;

?>