<?php

declare(strict_types=1);

namespace Animals;

require_once 'Animal.php';

class Cat implements Animal 
{
    public function makeSound(): void
    {
        echo "Meow";
    }

    public function eat(): void 
    {
        echo "Meat";
    }

    public function sleep(): void 
    {
        echo "Table";
    }
}