<?php

declare(strict_types=1);

require_once('./class/Cat.php');
require_once('./class/Dog.php');
require_once('./class/Bird.php');

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