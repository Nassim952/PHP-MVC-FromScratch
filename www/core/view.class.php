<?php
class View{

	private $view;
	private $template;

	public function __construct($view, $template="back"){
		$this->setTemplate($template);
		$this->setView($view);
	}


	public function setTemplate($template){
		$this->template = strtolower(trim($template));

		if( !file_exists("views/templates/".$this->template.".tpl.php")){
			die("Le template n'existe pas");
		}

	}

	public function setView($view){
		$this->view = strtolower(trim($view));

		if( !file_exists("views/".$this->view.".view.php")){
			die("La vue n'existe pas");
		}
	}


	public function __destruct(){
		include "views/templates/".$this->template.".tpl.php";
	}


}









