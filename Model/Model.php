<?php

namespace App\Model;

use App\Core\Config;
use App\Core\Database\Connection;

class Model
{
    protected $pdo, $tableName = null;

    public function __construct()
    {
        $this->tableName = $this->setTable();
        
        $app = Config::con();
        $this->pdo = Connection::make($app['database']);
    }

    public function raw ($query = '') {
        $app = Config::con();
        $pdo = Connection::make($app['database']);
        return $pdo->exec($query);
    }

    public function insert() {
        
    }

    public function all()
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->tableName");

        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_CLASS);
    }

    public function select($query = '') {
        $app = Config::con();
        $pdo = Connection::make($app['database']);
        $stm = $pdo->query($query);
        return $stm->fetchAll(\PDO::FETCH_CLASS);
    }

    public function update() {
        
    }

    public function delete() {
        
    }

    private function setTable() {

        if ($this->tableName) 
            return $this->tableName;
        
        $tableClass = get_class($this);

        $extracting = explode('\\', $tableClass);

        $table = strtolower(end($extracting)); 

        return $this->isTablePlural($table);
    }

    
    private function isTablePlural($table) {
        return $table. 's';
    }

}
