<?php

namespace App\Models\Users\Validators;

use App\Core\Interfaces\IValidator;

class FLValidator implements IValidator
{
    /**
     * @param \App\Core\Interfaces\stdClass|mixed $obj
     * @return bool
     */
    public function isValid($obj)
    {
        if ($obj->getName() === 'fl') {
            return true;
        }
    }
    public function getErrorMessage()
    {
        return 'FL';
    }
}