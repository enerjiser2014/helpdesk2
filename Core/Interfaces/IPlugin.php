<?php

namespace App\Core\Interfaces;

interface IPlugin {
    public function exec();
    public function install();
    public function uninstall();
}