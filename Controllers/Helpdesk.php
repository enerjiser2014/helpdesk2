<?php

namespace App\Controllers;

use App\Models\Ticket;

class Helpdesk {
    public function startPoint(){

    }

    public function index(){
        $model = new Ticket();
        echo $model->getTable();
    }
}