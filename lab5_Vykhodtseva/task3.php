<?php
class Db{
    /** @var Db */
    private static $db;
    private function __construct(){}

    public static function getInstance(){
        if (self::$db === null) {
            echo "<h1>Connecting with database</h1>";
            self::$db = new mysqli('localhost', 'root', '');
            if (self::$db->connect_error) {
                throw new DbException("Connection error: ");
            }
            self::$db->query("SET NAMES 'UTF8'");
        }
        return self::$db;
    }

    public function get_data(): array{
        $query = "SELECT * from menu";
        $result = self::$db->query($query);
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row[] = $result->fetch_assoc();
        }
        return $row;
    }


    private function __clone()
    {
        
    }

    private function __wakeup()
    {
        
    }
}

$obj1 = DB::getInstance();

$obj2 = DB::getInstance();

$obj3 = DB::getInstance();
?>