<?php

namespace App\Models\Users\Validators;

use App\Interfaces\IValidator;

class FLValidator implements IValidator
{
    /**
     * @param \App\Interfaces\stdClass|mixed $obj
     * @return bool
     */
    public function isValid($obj)
    {
        if ($obj->getName() === 'fl') {
            return true;
        }
    }
    public function getMessage()
    {
        return 'FL';
    }
}