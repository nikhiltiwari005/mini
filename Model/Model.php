<?php

namespace App\Model;

use App\Core\Config;
use App\Core\Database\Connection;

class Model
{
    protected $pdo, $tableName = null;

    public function __construct()
    {
        $app = Config::con();
        $this->tableName = $this->setTable();
        
        $this->pdo = Connection::make($app['database']);
    }

    public function insert() {
        
    }

    public function all()
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->tableName");

        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_CLASS);
    }

    public function select() {
        
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
