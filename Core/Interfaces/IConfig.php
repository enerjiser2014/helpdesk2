<?php

namespace App\Core\Interfaces;

interface IConfig {
    public function getConf($name);
    public function getType();
}