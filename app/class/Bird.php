<?php

declare(strict_types=1);

namespace Animals;

require_once 'Animal.php';

class Bird implements Animal 
{
    public function makeSound(): void 
    {
        echo "Chirrup";
    }

    public function eat(): void 
    {
        echo "Grain";
    }

    public function sleep(): void 
    {
        echo "Branch";
    }
}