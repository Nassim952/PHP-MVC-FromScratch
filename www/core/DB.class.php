<?php
class DB{
    private $table;
    private $pdo;

    public function __construct(){
        try{
            $this->pdo = new PDO(DRIVER_DB.":host=".HOST_DB.";dbname=".NAME_DB, USER_DB, PWD_DB);
        }catch(Exception $e){
            die("error sql : ".$e->getMessage());
        }
        $this->table = PREFIXE_DB.get_called_class();
    }

    public function save(){
        //retrieve properties of $this
        $objectVars = get_object_vars($this);

        //retrieve properties of current class
        $classVars = get_class_vars(get_class());

        //compare two array var and remove excess keys
        $columnsData = array_diff_key($objectVars, $classVars);
        print_r($columnsData);

        //set only keys from columnsData to columns
        $columns = array_keys($columnsData);

        //test in column id if there's a number make an update otherwise make an insert
        if(!is_numeric($this->id)){

            $sql = "SELECT * FROM ".$this->table.";";

            $queryPrepared = $this->pdo->prepare($sql);
            $queryPrepared->execute();

            $result = $queryPrepared->fetchAll();
            // print_r($result);
            
            if ($result == null){
                //reset column ID auto_increment at 0
                $sql = "TRUNCATE TABLE ".$this->table.";";
                $queryPrepared = $this->pdo->prepare($sql);
                $queryPrepared->execute();

                //INSERT
                $sql = "INSERT INTO ".$this->table." (".implode(", ", $columns).") VALUES (:".implode(", :", $columns).");";
                $queryPrepared = $this->pdo->prepare($sql);
                $queryPrepared->execute($columnsData);
            }else {
                //INSERT
                $sql = "INSERT INTO ".$this->table." (".implode(", ", $columns).") VALUES (:".implode(", :", $columns).");";
                echo $sql;
                $queryPrepared = $this->pdo->prepare($sql);
                $queryPrepared->execute($columnsData);
            }
        }
        else{
            //UPDATE
            foreach ($columns as $column) {
                $sqlUpdate[] =  $column."=:".$column;
            }
            $sql = "UPDATE ".$this->table." SET ".implode(", ", $sqlUpdate)." WHERE ".$this->table.".id=:id;";

            $queryPrepared = $this->pdo->prepare($sql);
            $queryPrepared->execute($columnsData);

            // $queryPrepared->debugDumpParams();
            
        }
    }
}