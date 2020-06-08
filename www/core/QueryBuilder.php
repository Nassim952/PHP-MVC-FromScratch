<?php 

namespace mvc\core;

use PDO;

class QueryBuilder{

    protected $connection;
    protected $query;
    protected $parameters;
    protected $alias;
    protected $from;
    protected $select = ["*"];
    protected $where;

    public function __construct(){
        try{
            $this->pdo = new PDO(DRIVER_DB.":host=".HOST_DB.";dbname=".NAME_DB, USER_DB, PWD_DB);
        }catch(Exception $e){
            die("error sql : ".$e->getMessage());
        }
        $this->table = PREFIXE_DB.get_called_class();
        $cleanTable = str_replace('mvc\models\users', 'users', $this->table);
        $this->table = $cleanTable;
    }

    public function select(string $select): self{
        $this->select = $select;
        return $this;
    }

    public function from(string $table, string $alias){
        $this->from = "$table $alias";
    }

    public function where(string $conditions): self{
        $this->where=$conditions;
        return $this;
    }

    public function setParameter(string $key, $value): self{
        return $this;
    }

    public function join(string $table, string $aliasTarget, string $filedSource = 'id', string $fieldTarget = 'id'){
        $this->from = "$table $aliasTarget $filedSource $fieldTarget";
    }

    public function leftjoin(string $table, string $aliasTarget, string $filedSource = 'id', string $fieldTarget = 'id'){
        $this->from = "$table $aliasTarget $filedSource $fieldTarget";
    }

    public function addToQuery(string $query): self{
        $this->query=$query;
        return $this;
    }

    public function getQuery(): ResultInterface{}

}