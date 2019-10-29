<?php

$uri = $_SERVER["REQUEST_URI"];

// $uri = /	
// $uri = /user/add
$uri = trim($uri, "/");
// $uri = 
// $uri = user/add
$uriExploded = explode("/", $uri);
//$uriExploded = ["user", "add"];

$c = (empty($uriExploded[0]))
			?"default"
			:$uriExploded[0] ; 
			//Par defaut on doit avoir default
$c = $c."Controller";

$a = (empty($uriExploded[1]))
			?"default"
			:$uriExploded[1] ; 
			//Par defaut on doit avoir default
$a = $a."Action";

//echo "Le controller c'est ".$c." et l'action c'est ".$a;


//Est ce que dans le dossier controller il y a une class
//qui correspond à $c
if( file_exists("controllers/".$c.".class.php") ){

	include "controllers/".$c.".class.php";
	if( class_exists($c)){

		$controller = new $c();
		if( method_exists($controller, $a)){

			$controller->$a();
			
		}else{
			die("L'action' n'existe pas");
		}


	}else{

		die("Le class controller n'existe pas");
	}

}else{
	die("Le fichier du controller n'existe pas : controllers/".$c."Controller.class.php");
}






