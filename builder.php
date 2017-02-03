<?php

/**
 * 建造者模式
 */
class Person {
    private $head;
    private $body;
    private $foot;

    //头  
    public function getHead() {
        return $this->head;
    }

    public function setHead($head) {
        $this->head = $head;
    }

    //体  
    public function getBody() {
        return $this->body;
    }

    public function setBody($body) {
        $this->body = $body;
    }

    //脚  
    public function getFoot() {
        return $this->foot;
    }

    public function setFoot($foot) {
        $this->foot = $foot;
    }
}

//创建一个product对象的各个部件指定抽象接口  
interface PersonBuilder {

    public function buildHead();

    public function buildBody();

    public function buildFoot();

    //产品返还方法
    public function getResult();
}

//实现接口
class ConcreteBuilder implements PersonBuilder {
    private $person;

    function __construct() {
        $this->person = new Person();
    }

    function buildHead() {
        $this->person->setHead('建造头 ~');
    }

    function buildBody() {
        $this->person->setBody('建造身体 ~');
    }

    function buildFoot() {
        $this->person->setFoot('建造脚 ~');
    }

    function getResult() {
        return $this->person;
    }
}

//指导者  
class Director {

    public function __construct(ConcreteBuilder $builder) {
        $builder->buildHead();
        $builder->buildBody();
        $builder->buildFoot();
    }
}

//Test
$builder = new ConcreteBuilder();
$director = new Director($builder);
$person = $builder->getResult();
echo $person->getHead();
echo $person->getBody();
echo $person->getFoot();
