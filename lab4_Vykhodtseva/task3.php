<?php
    interface ILoger{
        public  function log(string $message): void;
    }

    trait CurrDateTime{
        public function getCurrentDateTime(): string{
            return date("F j, Y, g:i a");
        }
    }

    trait CreateLog{
        use CurrDateTime;

        public function log(string $message): void{
            //redefinition "log" function
            $message = $this->getCurrentDateTime() .
            ' : ' .$message. "\n";
            fwrite($this->file, $message);
        }
    }

    class FileLoger implements ILoger{
        use CreateLog;
        /** @var resource a file pointer resource private $file; */
        private $file;
        /** @var string */

        private $logFile;

        public function __construct(string $filename, string $mode ='a'){
            $this->logFile = $filename;
            $this->file = fopen($filename, $mode)
            or die('Could not open the log file'); //open file or print an error
        }

        public  function __destruct()
        {
            if($this->file){

                fclose($this->file);
            }
        }
    }

    $test = new FileLoger('result');
    $test->log('This is a message!');
?>