<?php

namespace App\Classes;

use App\Interfaces\IValidator;

class Context {
    private $validationStrategy;
    function __construct(IValidator $vStrategy)
    {
        $this->validationStrategy = $vStrategy;
    }

    function ifValid($obj)
    {
        if ($this->validationStrategy->isValid($obj)){
            echo $obj->getName() . '<br>';
        } else {
            echo $obj->getName() . ' object has not correct ' . $this->validationStrategy->getMessage() .' type' . '<br>';
        }
    }
}