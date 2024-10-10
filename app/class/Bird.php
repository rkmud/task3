<?php

namespace Animals;

require_once 'Animal.php';

class Bird implements Animal {
    public function makeSound() {
        echo "Chirrup";
    }
    public function eat() {
        echo "Grain";
    }
    public function sleep() {
        echo "Branch";
    }
}