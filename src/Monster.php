<?php

class Monster {

    private $name;
    private $food;
    private $attention;
    private $energy;

    function __construct($name = "Huey", $food = 100, $attention = 100 , $energy = 100) {
        $this->name = $name;
        $this->food = $food;
        $this->attention = $attention;
        $this->energy = $energy;
    }

    function setName($new_name) {
        $this->name = (string) $new_name;
    }

    function getName() {
        return $this->name;
    }

    function setFood($new_food) {
        $this->food = (integer) $new_food;
    }

    function getFood() {
        return $this->food;
    }

    function setAttention($new_attention) {
        $this->attention = (integer) $new_attention;
    }

    function getAttention() {
        return $this->attention;
    }

    function setEnergy($new_energy) {
        $this->energy = (integer) $new_energy;
    }

    function getEnergy() {
        return $this->energy;
    }

    function saveMonster() {
        array($_SESSION['list_of_monsters'], $this);
    }

    static function getAll() {
        return $_SESSION['list_of_monsters'];
    }

    static function releaseAll() {
        $_SESSION['list_of_monsters'] = array();
    }


}


?>
