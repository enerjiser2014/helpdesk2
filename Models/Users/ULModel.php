<?php

namespace App\Models\Users;

use App\Models\Model;

class ULModel extends Model
{
    private $name;

    public function __construct($name)
    {
        $this->setName($name);
    }

    public function getTable()
    {
        return 'ULModel';
    }

    public function getIdName()
    {
        return 'id_ul';
    }

    public function setName($name)
    {
        $this->name = $name;
        return true;
    }

    public function getName()
    {
        return $this->name;
    }
}