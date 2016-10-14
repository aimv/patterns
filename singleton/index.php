<?php

/**
 * Пример паттерна Singleton
 */

class MySingleton {
    static private $instance = null;

    private function __construct() {}  // Защищаем от создания через new 
    private function __clone() {}  // Защищаем от создания через клонирование
    private function __wakeup() {}  // Защищаем от создания через unserialize

    static public function getInstance() {
        return (self::$instance===null) ? self::$instance = new static() : self::$instance;
    }
    
    private $bar = 0;

    public function incBar() {
        $this->bar++;
    }

    public function getBar() {
        return $this->bar;
    }
}

//usage

$foo = MySingleton::getInstance();
$foo->incBar();

var_dump($foo->getBar());

$foo = MySingleton::getInstance();
$foo->incBar();

var_dump($foo->getBar());





