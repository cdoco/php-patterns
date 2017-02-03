<?php

/*
 * 工厂方法模式
 */

interface people {
    function jiehun();
}

class man implements people {
    function jiehun() {
        echo '送玫瑰，送戒指！<br>';
    }
}

class women implements people {
    function jiehun() {
        echo '穿婚纱！<br>';
    }
}

// 注意了，这里是简单工厂本质区别所在，将对象的创建抽象成一个接口。
interface createMan {
    function create();

}

class FactoryMan implements createMan {
    function create() {
        return new man;
    }
}

class FactoryWomen implements createMan {
    function create() {
        return new women;
    }
}

class  Client {
    // 简单工厂里的静态方法
    function test() {
        $Factory = new FactoryMan;
        $man = $Factory->create();
        $man->jiehun();

        $Factory = new  FactoryWomen;
        $man = $Factory->create();
        $man->jiehun();
    }
}

$f = new Client;
$f->test();