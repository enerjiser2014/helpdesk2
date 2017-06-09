<?php

namespace App\Core;

use App\Core\Interfaces\IValidator;

class ValidatorContext
{
    private $validationStrategy;

    public function __construct(IValidator $vStrategy)
    {
        $this->validationStrategy = $vStrategy;
    }

    function ifValid($obj)
    {
        if ($this->validationStrategy->isValid($obj)) {
            echo $obj->getName() . '<br>';
        } else {
            echo $obj->getName() . ' object has not correct ' . $this->validationStrategy->getErrorMessage() . ' type' . '<br>';
        }
    }
}