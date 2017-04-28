<?php

namespace App\Models\Users\Validators;

use App\Interfaces\IValidator;

class ULValidator implements IValidator
{
    /**
     * @param \App\Interfaces\stdClass|mixed $obj
     * @return bool
     */
    public function isValid($obj)
    {
        if ($obj->getName() === 'ul') {
            return true;
        }
    }
    public function getMessage()
    {
        return 'UL';
    }
}