<?php

namespace Animals;

require_once 'Animal.php';

class Dog implements Animal {
    public function makeSound() {
        echo "Woof";
    }
    public function eat() {
        echo "Meet";
    }
    public function sleep() {
        echo "Barn";
    }
}