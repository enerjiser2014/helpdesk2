<?php

namespace App\Models\Users\Validators;

use App\Core\Interfaces\IValidator;

class ULValidator implements IValidator
{
    /**
     * @param \App\Core\Interfaces\stdClass|mixed $obj
     * @return bool
     */
    public function isValid($obj)
    {
        if ($obj->getName() === 'ul') {
            return true;
        }
    }
    public function getErrorMessage()
    {
        return 'UL';
    }
}