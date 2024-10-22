<?php

trait SingletoneTrait {
    /** @var self */
    protected static $_instance;

    private function __construct(){}

    public static function getInstance(): self{
        if (self::$_instance === null) {
            echo 'Creating instance<br>';
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    private function __clone(){}

    private function __wakeup(){}
}

class SomeClass{
    use SingletoneTrait;
    public function someFunc(): void{
        echo 'Some public method call';
    }
}

?>