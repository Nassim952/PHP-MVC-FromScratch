<?php 
class users extends DB{
    protected $id=null;
    protected $firstname;    
    protected $lastname;
    protected $email;
    protected $pwd;
    protected $status;

    public function __construct(){
        parent::__construct();
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setFirstName($firstname){
        $this->firstname = ucwords(strtolower(trim($firstname)));
    }
    public function setLastName($lastname){
        $this->lastname = strtoupper(trim($lastname));
    }

    public function setEmail($email){
        $this->email = strtolower(trim($email));
    }

    public function setPwd($pwd){
        $this->pwd = $pwd;
    }

    public function setStatus($status){
        $this->status = $status;
    }

}