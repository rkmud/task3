<?php

declare(strict_types=1);

namespace Animals;

require_once 'Animal.php';

class Dog implements Animal 
{
    public function makeSound(): void 
    {
        echo "Woof";
    }

    public function eat(): void 
    {
        echo "Meat";
    }

    public function sleep(): void 
    {
        echo "Barn";
    }
}