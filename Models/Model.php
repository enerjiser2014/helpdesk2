<?php

namespace App\Models;

use App\Core\Interfaces\IActiveRecord;
use App\Core\Traits\TMagicGetSet as TMagicGetSet;
use App\Core\Traits\TActiveRecord as TActiveRecord;

abstract class Model implements IActiveRecord
{
    use TMagicGetSet;
    use TActiveRecord;

    // abstract
    public function getColNames(){
        return array_keys($this->getColVals());
    }
    // abstract
    public function getValues(){
        return array_values($this->getColVals());
    }
    // abstract
    public function getColVals() {
        $cv = $this->magicProp;
        unset($cv[$this->getIdName()]);
        return $cv;
    }

    public function save()
    {
        $this->saveRecord();
    }

    public function read($id)
    {
        $read = $this->getRecordById($id);
        foreach($read as $k => $v) {
            $this->$k = $v;
        }
        return $this;
    }

    public function update()
    {
        $this->updateRecord();
    }

    public function delete($id)
    {
        $this->deleteRecord($id);
    }
}

