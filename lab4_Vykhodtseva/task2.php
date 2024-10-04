<?php
    trait FirstTrait {
        public function helloFunction (): void {
            echo "Hello world";
        }
        
        public function greeting(): void {
            $greeting = "Good ";
            $currentHour = (int)date('H');
            if ($currentHour <12) {
            $greeting.= "morning";
            } elseif ($currentHour >= 12 && $currentHour < 18) {
            $greeting.= "afternoon";
            } else {
            $greeting.= "evening";
            }
            echo $greeting;
        }
    }

    class helloWorld { 
        use FirstTrait;  //train using
    } 

    $objTest = new HelloWorld(); 

    $objTest->greeting(); 

?>