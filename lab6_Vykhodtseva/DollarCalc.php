<?php 

//DollarCalc.php 
class DollarCalc 

{ private $dollar; private $product; private $service; public $rate=1; 

//request processing

public function requestCalc($productNow,$serviceNow) { 

$this->product=$productNow; 

$this->service=$serviceNow; 

$this->dollar=$this->product + $this->service; return $this->requestTotal(); 

} 

//result return

public function requestTotal() 

{ 

$this->dollar*=$this->rate; return $this->dollar; 

} 

} 

?> 