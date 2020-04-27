<?php

namespace mvc\core;

class View{

	private $view;
	private $template;
	private $data = [];

	public function __construct($view, $template="back"){
		$this->setTemplate($template);
		$this->setView($view);
	}

	//redéfini la propriété avec la variable template récupérée via le controleur
	public function setTemplate($template){
		$this->template = strtolower(trim($template));

		if( !file_exists("views/templates/".$this->template.".tpl.php")){
			die("Le template n'existe pas");
		}
	}

	//redéfini la propriété avec la variable view récupérée via le controleur
	public function setView($view){
		$this->view = strtolower(trim($view));

		if( !file_exists("views/".$this->view.".php")){
			die("La vue n'existe pas");
		}
	}

	// envoie les donnée à la vue
	public function assign($key, $value){
		$this->data[$key] = $value;
	}

	//inclue le modal si il existe
	public function addModal($modal, $data){
		if(!file_exists("views/modals/".$modal.".mod.php")){
			die("Le modal n'existe pas");
		}
		include "views/modals/".$modal.".mod.php";
	}
		
	// affiche le template et ce qui va avec
	public function __destruct(){
		include "views/templates/".$this->template.".tpl.php"; 
	}
	
}









