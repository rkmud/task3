<?php

namespace Animals;

require_once 'Animal.php';

class Cat implements Animal {
    public function makeSound() {
        echo "Meow";
    }
    public function eat() {
        echo "Meet";
    }
    public function sleep() {
        echo "Table";
    }
}