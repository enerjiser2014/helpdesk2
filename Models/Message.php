<?php

namespace App\Models;

class Message
    extends Model
{
    public function getTable()
    {
        return 'Messages';
    }

    public function getIdName()
    {
        return 'id_Message';
    }

    public function getAllMessages()
    {
        return $this->getAllRecords();
    }
}