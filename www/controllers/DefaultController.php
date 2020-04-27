<?php

namespace mvc\controllers;

use mvc\core\View;

class DefaultController{
	public function defaultAction()
	{
		// parameter order -> vues, tpl
		$myView = new View("dashboard");
	}
}