<?php

require 'vendor/autoload.php';
require './Logger/Logger.php';

use Animals\Cat;
use Animals\Dog;
use Animals\Bird;

$cat = new Cat();
$dog = new Dog();
$bird = new Bird();

echo $cat->makeSound() . "<br>";
echo $dog->makeSound() . "<br>";
echo $bird->makeSound() . "<br>";
echo $cat->eat() . "<br>";
echo $dog->eat() . "<br>";
echo $bird->eat() . "<br>";
echo $cat->sleep() . "<br>";
echo $dog->sleep() . "<br>";
echo $bird->sleep() . "<br>";