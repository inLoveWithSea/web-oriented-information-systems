<?php
interface Car {
    public function showInfo();
    public function getBrand();
    public function getModel();
}

interface Truck {
    public function showInfo();
    public function getBrand();
    public function getModel();
    public function getCapacity();
}

interface Bus {
    public function showInfo();
    public function getBrand();
}

trait CarInfo {
    protected $brand;
    protected $model;

    public function __construct($brand, $model) {
        $this->brand = $brand;
        $this->model = $model;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function getModel() {
        return $this->model;
    }
}

trait TruckInfo {
    protected $brand;
    protected $model;
    protected $capacity;

    public function __construct($brand, $model, $capacity) {
        $this->brand = $brand;
        $this->model = $model;
        $this->capacity = $capacity;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function getModel() {
        return $this->model;
    }

    public function getCapacity() {
        return $this->capacity;
    }
}

trait BusInfo {
    protected $brand;

    public function __construct($brand) {
        $this->brand = $brand;
    }

    public function getBrand() {
        return $this->brand;
    }
}

class UAcar implements Car {
    use CarInfo;
    public function showInfo() {
        return "Ukrainian car";
    }
}

class ForeignCar implements Car {
    use CarInfo;
    public function showInfo() {
        return "Foreign car";
    }
}

class UAtruck implements Truck {
    use TruckInfo;
    public function showInfo() {
        return "Ukrainian truck";
    }
}

class ForeignTruck implements Truck {
    use TruckInfo;
    public function showInfo() {
        return "Foreign truck";
    }
}

class UAbus implements Bus {
    use BusInfo;
    public function showInfo() {
        return "Ukrainian bus";
    }
}

class ForeignBus implements Bus {
    use BusInfo;
    public function showInfo() {
        return "Foreign bus";
    }
}

abstract class AbstractFactory {
    abstract public function createCar($brand, $model);
    abstract public function createTruck($brand, $model, $capacity);
    abstract public function createBus($brand);
}

class UkrainianFactory extends AbstractFactory {
    public function createCar($brand, $model) {
        return new UAcar($brand, $model);
    }
    public function createTruck($brand, $model, $capacity) {
        return new UAtruck($brand, $model, $capacity);
    }
    public function createBus($brand) {
        return new UAbus($brand);
    }
}

class ForeignFactory extends AbstractFactory {
    public function createCar($brand, $model) {
        return new ForeignCar($brand, $model);
    }
    public function createTruck($brand, $model, $capacity) {
        return new ForeignTruck($brand, $model, $capacity);
    }
    public function createBus($brand) {
        return new ForeignBus($brand);
    }
}

class CarPark {
    private $factory;
    private $cars = [];
    private $trucks = [];
    private $buses = [];

    public function __construct(AbstractFactory $factory, $carData, $truckData, $busData) {
        $this->factory = $factory;
        foreach ($carData as $carParams) {
            $this->cars[] = $factory->createCar(...$carParams);
        }
        foreach ($truckData as $truckParams) {
            $this->trucks[] = $factory->createTruck(...$truckParams);
        }
        foreach ($busData as $busParams) {
            $this->buses[] = $factory->createBus(...$busParams);
        }
    }

    public function showParkInfo() {
        foreach ($this->cars as $car) {
            echo $car->showInfo() . " - Brand: " . $car->getBrand() . " ,Model: " . $car->getModel() . '<br>';
        }
        foreach ($this->trucks as $truck) {
            echo $truck->showInfo() . " - Brand: " . $truck->getBrand() . " ,Model: " . $truck->getModel() . " ,Capacity: " . $truck->getCapacity() . '<br>';
        }
        foreach ($this->buses as $bus) {
            echo $bus->showInfo() . " - Brand: " . $bus->getBrand() . '<br>';
        }
    }
}

// Configuration and Factory Check
$configParams1 = ["factory" => "ua", "carNum" => 5, "truckNum" => 3, "busNum" => 5];
$configParams2 = ["factory" => "foreign", "carNum" => 2, "truckNum" => 2, "busNum" => 1];

function checkFactory($configParams) {
    if ($configParams["factory"] === "ua") {
        return new UkrainianFactory();
    } elseif ($configParams["factory"] === "foreign") {
        return new ForeignFactory();
    } else {
        throw new Exception("Invalid factory type");
    }
}

function generateRandomVehicleData($num, $vehicleType) {
    $data = [];
    for ($i = 0; $i < $num; $i++) {
        $brand = "Brand" . ($i + 1);
        $model = "Model" . ($i + 1);
        switch ($vehicleType) {
            case 'car':
                $data[] = [$brand, $model];
                break;
            case 'truck':
                $capacity = rand(5000, 20000);
                $data[] = [$brand, $model, $capacity];
                break;
            case 'bus':
                $data[] = [$brand];
                break;
            default:
                throw new InvalidArgumentException("Invalid vehicle type");
        }
    }
    return $data;
}

// Creating Vehicle Park
$factory = checkFactory($configParams1);
$carNum = $configParams1["carNum"];
$truckNum = $configParams1["truckNum"];
$busNum = $configParams1["busNum"];

$carData = generateRandomVehicleData($carNum, 'car');
$truckData = generateRandomVehicleData($truckNum, 'truck');
$busData = generateRandomVehicleData($busNum, 'bus');

echo '<br/><br/>SECOND PARK <br/>';
$carPark = new CarPark($factory, $carData, $truckData, $busData);
$carPark->showParkInfo();
?>