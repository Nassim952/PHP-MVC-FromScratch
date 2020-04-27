<?php

namespace mvc\core;

class ConstLoader{

    private $extend;
    private $text;

    public function __construct($extend = "env"){

        $this->extend=$extend; 
        $this->checkFiles();
        $this->getFilesEnv();
        $this->load();

    }

    public function getFilesEnv(){
        //.dev ou .prod
        $this->text = trim(file_get_contents(".".$this->extend));
        //.env
        $this->text .= "\r\n".trim(file_get_contents(".env"));
    }

    public function checkFiles(){
        if(!file_exists(".env")){
            die("le fichier n'existe pas");
        }
        else if(!file_exists(".".$this->extend)){
            die("le fichier ".$this->extend."n'existe pas");
        }
    }

    public function load(){
        $lines = explode("\r\n",$this->text);
        foreach ($lines as $line) {
            $data = explode ("=", $line);
            if(!defined($data[0]) && isset($data[1])){
                define($data[0], $data[1]);
            }
        }
    }
}