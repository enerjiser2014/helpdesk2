<?php

namespace App\Core;

use App\Core\Interfaces\IPlugin;

abstract class Plugin implements IPlugin
{
    public function __construct()
    {
        $this->exec();
    }
}