<?php  class Coor{

private $name;
private $login;
private $password;

function __construct(string $name, string $login, string $password) // function for setting attributes
{  
$this->name=$name; //set name
$this->login=$login; //set login
$this->password=$password; //set password
}   

function Getname()  //function for getting name
{  
echo "<p>Name: ".$this->name."<br>"; // printing name  
}

function Getlogin()  //function for getting login
{  
echo "<p>Login: ".$this->login."<br>"; // printing login 
}

function Getpassword()  //function for getting password
{  
echo "<p>Password: ".$this->password."<br>"; // printing password 
}

function __destruct() {
    print "Destroying " . $this->name . "<br>";
}


} 

$object = new Coor("Nick", "Nickki", "111111"); //creating “Coor” object

$object->Getname(); //function call
$object->Getlogin();
$object->Getpassword();
echo '<br>';


// Creating two more instances of the Coor class
$object2 = new Coor("Alice", "Alice123", "222222");

$object2->Getname();
$object2->Getlogin();
$object2->Getpassword();
echo '<br>';

$object3 = new Coor("John", "JohnDoe", "333333");

// Displaying values for the third object
$object3->Getname();
$object3->Getlogin();
$object3->Getpassword();
echo '<br>';

//unset($object);
//echo '<p>Object is deleated!</p>';
//destructor called automatically
?>