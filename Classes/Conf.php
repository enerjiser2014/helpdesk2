<?php

namespace App\Classes;

class Conf
{
    public static function Db()
    {
        return include __DIR__ . '/../config/db_conf.php';
    }

    public static function Site($parameter = '')
    {
        $siteConfig = include __DIR__ . '/../config/site_conf.php';
        if (empty($parameter)){
            return $siteConfig;
        }
        switch ($parameter){
            case 'hostname':
                return $siteConfig['hostname'];
            break;
        }
    }
}
