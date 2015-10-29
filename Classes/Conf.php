<?php

namespace App\Classes;

class Conf
{
    public static function Db()
    {
        return include __DIR__ . '/../config/db_conf.php';
    }

}
