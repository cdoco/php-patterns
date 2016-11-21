<?php

/**
 * 简单工厂模式
 */
abstract class Operation {
    abstract public function getValue($num1, $num2);
}

class OperationAdd extends Operation {
    public function getValue($num1, $num2) {
        return $num1 + $num2;
    }
}

class OperationSub extends Operation {
    public function getValue($num1, $num2) {
        return $num1 - $num2;
    }
}

class Factory {
    public static function createObj($operate) {
        switch ($operate) {
            case '+':
                return new OperationAdd();
                break;
            case '-':
                return new OperationSub();
                break;
        }
    }
}

$factory = Factory::createObj('+');
$result = $factory->getValue(23, 0);
echo $result;