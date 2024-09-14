<?php 
// Import Point class
require_once 'class.php';

class CSV
{
    private $_csv_file = null;

    /** 
     * @param string $csv_file  - path to csv file
     */     
    public function __construct($csv_file) 
    {         
        if (file_exists($csv_file) || is_writable(dirname($csv_file))) {  
            // If file exists or if directory is writable
            $this->_csv_file = $csv_file;  
        } else {
            throw new Exception("File not found or directory not writable");
        }  
    }
    
    public function setCSV(Array $csv) { 
        $handle = fopen($this->_csv_file, "a"); // Open the file for writing (append mode)
        foreach ($csv as $obj) {              
            fputcsv($handle, // Write to file
                array(
                    $obj->get_x(),
                    $obj->get_y(),
                    $obj->get_color()
                ), 
                ";"
            );  
        }
        fclose($handle);  // Close the file
    }

    public function getCSV(){
        $handle = fopen($this->_csv_file, "r"); // Open file for reading
        $array_line_full = array();
        while(($line = fgetcsv($handle, 0, ";")) !== FALSE) {
            $array_line_full[] = $line;
        }
        fclose($handle); // Close the file
        return $array_line_full;
    }

}

echo 'Creating objects:<br>';
$point1 = new Point;
$point1->set_x(10);
$point1->set_y(-10.2);
$point1->set_color('Red');

$point2 = new Point;
$point2->set_x(1);
$point2->set_y(13);
$point2->set_color('Blue');

$point3 = new Point;
$point3->set_x(-4);
$point3->set_y(5);
$point3->set_color('Green');

$array = array($point1, $point2, $point3);
Point::show_objects($array);

echo 'Writing objects in csv:<br>';

try {
    $csv = new CSV("points.csv"); // Ensure this is a valid path or writeable directory
    $csv->setCSV($array); // Use $array instead of undefined $objects
    echo 'Objects saved!<br>';

    echo '<hr>Reading data from csv:<br>';
    $get_csv = $csv->getCSV();
    foreach ($get_csv as $value) {
        if (isset($value[0])) echo 'X: ' . $value[0] . '<br/>';
        if (isset($value[1])) echo 'Y: ' . $value[1] . '<br/>';
        if (isset($value[2])) echo 'Color: ' . $value[2] . '<br/>';
        echo '-----------<br/>';
    }
    echo 'Reading completed!';
} catch(Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>