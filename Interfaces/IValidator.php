<?php

namespace App\Interfaces;

interface IValidator {

    /**
     * Interface IValidator
     * @param Mixed|stdClass $obj
     * @return Boolean
     */
    function isValid($obj);
    function getMessage();
}