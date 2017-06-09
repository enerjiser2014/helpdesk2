<?php

namespace App\Core\Interfaces;

interface IValidator {

    /**
     * Interface IValidator
     * @param Mixed|stdClass $obj
     * @return Boolean
     */
    function isValid($obj);
    function getErrorMessage();
}