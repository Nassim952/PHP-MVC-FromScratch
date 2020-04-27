<?php

// function myAutoload($class){
// 	if(file_exists("core/".$class.".php")){
// 		include "core/".$class.".php";

// 	}else if(file_exists("models/".$class.".php")){
// 		include "models/".$class.".php";
// 	}
// }

function myAutoload($class)
{
	$class = str_replace("mvc", "", $class);

	$class = str_replace('\\', '/', $class);

	if($class[0] == '/') {
		include substr($class.'.php', 1);
		} else {
		include $class.'.php';
	}
	
}

spl_autoload_register("myAutoload");

use mvc\core\ConstLoader;

new ConstLoader();

$uri = $_SERVER["REQUEST_URI"];

$listOfRoutes = yaml_parse_file("routes.yml");

if( !empty($listOfRoutes[$uri]) ){
	$c = 'mvc\controllers\\'.ucfirst($listOfRoutes[$uri]["controller"]."Controller");
	$a = $listOfRoutes[$uri]["action"]."Action";
	
	//Est ce que dans le dossier controller il y a une class
	//qui correspond à $c
	// if( file_exists("controllers/".$c.".php") ){

		// include "controllers/".$c.".php";
		if( class_exists($c)){

			$controller = new $c();
			if( method_exists($controller, $a)){

				$controller->$a();
				
			}else{
				die("L'action n'existe pas");
			}
		
		}else{
			die("Le class controller n'existe pas");
		}

	// }else{
	// 	die("Le fichier du controller n'existe pas : controllers/".$c.".php");
	// }

}else{
	// include "views/404.php";
}