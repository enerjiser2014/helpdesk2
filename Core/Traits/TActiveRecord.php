<?php

namespace App\Core\Traits;

use App\Core\Db\Db as Db;
use App\Core\Conf as Conf;

trait TActiveRecord
{
     //{ должена вернуть имя таблицы - строка}
    abstract public function getTable();

    //{ должена вернуть имя главного ключа}
    abstract public function getIdName();

    // {доллжна вернуть имена всех колонок таблицы ввиде массива}
    abstract public function getColNames();
    abstract public function getValues();
    abstract public function getColVals();

    protected function getAllRecords()
    {
        $sql = 'SELECT * FROM ' . $this->getTable();
        return (new Db(Conf::Db()))->getRecords(static::class, $sql);
    }


    protected function getRecordById($id)
    {
        $sql = 'SELECT * FROM ' . $this->getTable() . ' WHERE ' . $this->getIdName() . '=:id';
        return (new Db(Conf::Db()))->getRecord(static::class, $sql, [':id' => $id]);
    }

    protected function insert()
    {
        $sql = 'INSERT INTO ' . $this->getTable() . '(' . implode(',', $this->getColNames()) . ') ' .
            'VALUES (\'' . implode('\',\'', $this->getValues()) . '\');';

        $ret = (new Db(Conf::Db()))->sqlExec(static::class,$sql);
    }

    protected function saveRecord()
    {
        $idName = $this->getIdName();
        if (false == $this->$idName) {
            $this->insert();
        }
        else {
            $this->updateRecord();
        }
    }

    protected function updateRecord()
    {
        $idName = $this->getIdName();
        if (false == $this->$idName) {
            throw new \Exception('Невозможно обновить запись с несуществующим id!<br>');
        }

        // make k = 'v'
        $cv = $this->getColVals();
        foreach($cv as $k => $v) {
            $arr[] = $k . '=\'' . $v . '\'';
        }
        $cvStr = implode(',',$arr);
        // make k = 'v'

        $sql = 'UPDATE ' . $this->getTable() . '
                SET ' . $cvStr . '
                WHERE ' . $this->getIdName() . '=' . $this->$idName . ';';
        $ret = (new Db(Conf::Db()))->sqlExec(static::class,$sql);

    }

    protected function deleteRecord($id)
    {
        $sql = 'DELETE FROM ' . $this->getTable() . ' WHERE ' . $this->getIdName() . '=:id';
        $ret = (new Db(Conf::Db()))->sqlExec(static::class,$sql,[':id' => $id]);
    }

}