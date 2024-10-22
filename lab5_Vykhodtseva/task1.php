<?php
class someClass {

    // Protected static instance variable to store the single instance of the class
    protected static $_instance;

    // Private constructor to prevent instantiation
    private function __construct() {
        echo "A single instance is created<br>";
    }

    // Method to return the single instance
    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    // Prevent cloning
    private function __clone() {
    }

    // Prevent unserialization
    private function __wakeup() {
    }
}

// Try to create multiple instances and check the result

$instance1 = someClass::getInstance();  // Creates the first (and only) instance
$instance2 = someClass::getInstance();  // Returns the existing instance
$instance3 = someClass::getInstance();
$instance4 = someClass::getInstance();  


if ($instance1 === $instance2 && $instance1 === $instance3 && $instance1 === $instance4) {
    echo "All instances are the same. Singleton pattern works.";
} else {
    echo "Instances are different. Singleton pattern failed.";
}

?>