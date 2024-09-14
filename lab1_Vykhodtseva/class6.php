<?php
header("Content-Type:text/html; charset=windows-1251");

class FileHandler {
    private $inputFile;
    private $outputFile;

    // Constructor to set file paths
    public function __construct($inputFile, $outputFile) {
        $uploaddir='./';
        $this->inputFile = $uploaddir.$inputFile;
        $this->outputFile = $uploaddir.$outputFile;
    }

        // Method to read integers from the input file
        private function readIntegers() {
            // Check if the file exists
            if (!file_exists($this->inputFile)) {
                throw new Exception("Input file does not exist.");
            }
    
            // Read the content of the input file
            $content = file_get_contents($this->inputFile);
            
            // Convert the content to an array of integers
            $integers = explode(" ", trim($content));
            
            return $integers;
        }
    
        // Method to write integers in reverse order to the output file
        public function writeReversedIntegers() {
            // Read integers from the input file
            $integers = $this->readIntegers();
    
            // Reverse the array of integers
            $reversedIntegers = array_reverse($integers);
    
            // Write the reversed integers to the output file
            file_put_contents($this->outputFile, implode(" ", $reversedIntegers));
        }
    }

    // Define file paths
    $inputFile = 'input.txt';
    $outputFile = 'output.txt';

    // Create a FileHandler object
    $fileHandler = new FileHandler($inputFile, $outputFile);

    // Write the reversed integers to the output file
    try {
        $fileHandler->writeReversedIntegers();
        echo "The integers have been reversed and written to the output file successfully.";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>