<?php 

namespace mvc\models;

use mvc\core\DB;

class post extends DB{
    protected $id;
    protected $title;
    protected $author;

    public function __construct($valeurs = array()){
        parent::__construct();

        if(isset($valeurs)){
            $this->hydrate($valeurs);
        }
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            // permet de mettre une majuscule a la 1ere lettre de chaque clé (correspondance nom méthodes)
            $method = 'set'.ucfirst($key);
            
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function initRelation(): array{
        return [
            'author' => user::class
        ];
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function setAuthor($author){
        $this->author = $author;
    }
}