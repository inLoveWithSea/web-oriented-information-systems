<?php

require_once 'Point.php';
require_once 'Circle.php';

echo "Creating Point objects<br>";
$point1 = new Point;
$point2 = new Point(4.2);
$point3 = new Point(-2.0, 3.1);

$point1->display();
echo '<br>';
$point2->display();
echo '<br>';
$point3->display();
echo '<br>';

echo 'Destroying Point objects<br>' ;
// Destruct objects
$point1 = null;
echo '<br>';
$point2 = null;
echo '<br>';
$point3 = null;
echo '<br><hr>';

echo 'Creating Circle objects<br>';
$circle1 = new Circle(1, 5.3, 2);
$circle2 = new Circle(-1, -2, 14);
$circle1->display();
echo '<br>';
echo "Area: " . $circle1->area();
echo '<br>';
$circle2->display();
echo '<br>';
echo "Area: " . $circle2->area();
echo '<br>';
echo 'Destroying ColorPoint objects<br>';
$circle1 = null;
echo '<br>';
$circle2 = null;
?>