<?php  class Point{ //creating Point class

//create public variables
public $x;
public $y;
public $color;

private $test;

//Method to set Test value
public function set_test($test){
    if(!isset($test)){
        exit('test value does not exist');
    }
    $this->test=$test;
}

//Method to get Test value
public function get_test()
{
    return $this->test;
}

//Method to set X value
public function set_x($x){
    if(!isset($x)){
        exit('X coordinate does not exist');
    }
    $this->x=$x;
}

//Method to get X value
public function get_x(): float
{
    return $this->x;
}

// Method to show X value
public function show_x(){
    echo "X: $this->x<br>";
}

//Method to set Y value
public function set_y($y){
    if(!isset($y)){
        exit('Y coordinate does not exist');
    }
    $this->y=$y;
}

//Method to get Y value
public function get_y(): float
{
    return $this->y;
}

// Method to show Y value
public function show_y(){
    echo "Y: $this->y<br>";
}

//Method to set color value
public function set_color($color){
    if(!isset($color)){
        exit('Color does not exist');
    }
    $this->color=$color;
}

//Method to get color value
public function get_color():  string
{
    return $this->color;
}

// Method to show color value
public function show_color(){
    echo "Color: $this->color<br>";
}

// Method to search for field specified in field variable and check value for equality
public function search($field, $value): bool{
    switch ($field){
        case 'color':
            return $this->color===$value;
        case 'x':
            return $this->x===$value;
        case 'y':
            return $this->y===$value;
        default:
        return false; //search field not found
    }
}

// Private method example
private function private_method(){
    echo 'Calling private method within the Point class.<br>';
}

//Inside public_method, the private_methodis called
public function public_method(){
    echo 'Calling public method'.'<br>';
    echo 'Public method calls private method'.'<br>';
    $this->private_method();
    echo 'End of private method'.'<br>';
}

//Method to display an array of class objects
public static function show_objects(array $objects) { 
    $index = 1;
    foreach($objects as $obj) {
        echo "Point $index<br>";
        $obj->show_x();
        $obj->show_y();
        $obj->show_color();
        echo '<br>';
        $index++;
    }
}
}

// Creating 3 instances of Point class
$point1 = new Point;
$point1 ->set_x(10);
$point1 ->set_y(-10.2);
$point1 ->set_color('Red');

$point2 = new Point;
$point2 ->set_x(1);
$point2 ->set_y(13);
$point2 ->set_color('Blue');

$point3 = new Point;
$point3 ->set_x(-4);
$point3 ->set_y(1.5);
$point3 ->set_color('Green');

// Display instances
echo 'Point 1<br>';
$point1->show_x();
$point1->show_y();
$point1->show_color();
echo '<br>';

echo 'Point 2<br>';
$point2->show_x();
$point2->show_y();
$point2->show_color();
echo '<br>';

echo 'Point 3<br>';
$point3->show_x();
$point3->show_y();
$point3->show_color();
echo '<br>';

echo 'Encapsulation demo:<br>';
$point1->set_test('test_result');
// Accessing private field directly (will cause an error)
//echo $point1->test;
// Accessing private field using getter method
echo $point1->get_test().'<br>';

// Creating 2 more instances of Point class
$point4 = new Point;
$point4 ->set_x(0);
$point4 ->set_y(-1.32);
$point4 ->set_color('Violet');

$point5 = new Point;
$point5 ->set_x(51);
$point5 ->set_y(133);
$point5 ->set_color('Yellow');

//Creating array
$array=array($point1,$point2,$point3,$point4,$point5);
//Printing array
echo '<hr>Calling method show_objects<br>';
echo '<br>';
Point::show_objects($array);
?>