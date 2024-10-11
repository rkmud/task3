<?php

declare(strict_types=1);

require_once('./class/Cat.php');
require_once('./class/Dog.php');
require_once('./class/Bird.php');

use Animals\Cat;
use Animals\Dog;
use Animals\Bird;

$animals = [
    new Dog(),
    new Cat(),
    new Bird(),
];

foreach ($animals as $animal) {
    echo $animal->makeSound() . "<br>"; 
    echo $animal->eat() . "<br>";        
    echo $animal->sleep() . "<br>";  
}