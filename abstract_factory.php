<?php

/**
 * 抽象工厂模式
 */
abstract class Vehicle {

    /**
     * 属性
     *
     * @var array
     */
    private $props = array();

    /**
     * 设置属性
     *
     * @param $key
     * @param $value
     */
    public function setProperty($key, $value) {
        $this->props[$key] = $value;
    }

    public function getProperty($key) {
        return $this->props[$key];
    }

}

abstract class Bus extends Vehicle {

    /**
     * 车体形状
     *
     * @var
     */
    public $shape;

    /**
     * 设置形状
     *
     * @param $value
     */
    public function setShape($value) {
        $this->shape = $value;
    }

    abstract function run();
}


abstract class Car extends Vehicle {

    /**
     * 两厢/三厢
     *
     * @var
     */
    public $room;

    public function setRoom($value) {
        $this->room = $value;
    }

    public function getRoom() {
        return $this->room;
    }

    abstract function run();
}

//抽象工厂
abstract class Factory {
    abstract static function create($className);
}

class CarFactory extends Factory {

    public static function create($className) {
        $class = $className;
        return new $class();
    }
}

class Audi extends Car {

    public function run() {

        parent::setProperty('brand', 'audi');
        $brand = parent::getProperty('brand');
        $this->setRoom('threeRoom');
        return $this->room . ' ' . $brand . ' Car is running';
    }
}

$Car = CarFactory::create('Audi');
echo $Car->run();  