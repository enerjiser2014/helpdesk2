<?php

namespace App\Core;
use App\Core\Interfaces\IConfig;

class ConfYml implements IConfig
{
    public function getConf($name)
    {
        $fileList = scandir(__DIR__ . '/../config/');
        foreach ($fileList as $file){
            $parts = explode('.', $file);
            var_dump($parts);
            echo '<br>';
        }
        return$fileList;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'yml';
    }
}