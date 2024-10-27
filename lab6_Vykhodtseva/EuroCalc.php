<?php //EuroCalc.php 
class EuroCalc { private $euro; private $product; private $service; public $rate=1; 

//request processing

public function requestCalc($productNow,$serviceNow) 

{ 

$this->product=$productNow; 

$this->service=$serviceNow; 

$this->euro=$this->product + $this->service; return $this->requestTotal(); 

} 

//result return

public function requestTotal() 

{ 

$this->euro*=$this->rate; return $this->euro; 

} 

} 

interface ITarget {
    function requester();
    function requestCalc($productNow, $serviceNow); // Add this line
}

//ITarget.php //Target interface ITarget 

{ 

function requester(){}

} 

?>