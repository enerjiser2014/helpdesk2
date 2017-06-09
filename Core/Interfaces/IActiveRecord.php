<?php

namespace App\Core\Interfaces;

interface IActiveRecord
{
    public function read($id);
    public function update();
    public function delete($id);
}