<?php

namespace App\Core;

use App\Core\Interfaces\IConfig;

class ConfigContext
{
    private $configStrategy;

    public function __construct(IConfig $cStrategy)
    {
        $this->configStrategy = $cStrategy;
    }

    public function getSettings(IConfig $configObj)
    {
        $type = $this->configStrategy->getType();

    }
}