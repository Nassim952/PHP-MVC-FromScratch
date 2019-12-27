<?php
class DB{
    private $table;
    private $pdo;

    public function __construct(){
        try{
            // $dbh = new PDO(DRIVER_DB.":host=".HOST_DB.";dbname".NAME_DB, USER_DB, PWD_DB);
            // $sql = "INSERT INTO hlqn_users (id, firstname, lastname, email, pwd, status) VALUES (0, test, toto, ok@gmail.com, 0)";
            // $dbh->exec($sql);
            $this->pdo = new PDO(DRIVER_DB.":host=".HOST_DB.";dbname".NAME_DB, USER_DB, PWD_DB);

        }catch(Exception $e){
            die("erreur sql : ".$e->getMessage());
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

        //set only keys from columnsData to columns
        $columns = array_keys($columnsData);

        print_r($columnsData);

        // test column id if there's a number make an update otherwise make an insert
        if(!is_numeric($this->id)){
            //INSERT
            $sql = "INSERT INTO ".$this->table." (".implode(", ", $columns).") VALUES (:".implode(", :", $columns).");";
        }
        else{
            //UPDATE
            foreach ($columns as $column) {
                $sqlUpdate[] =  $column."=:".$column;
            }
            $sql = "UPDATE ".$this->table." SET ".implode(",", $sqlUpdate)." WHERE id=:id;";
            echo "$sql";
        }

        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($columnsData);

        print_r($queryPrepared);

    }
}