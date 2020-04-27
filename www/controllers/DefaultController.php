<?php

namespace mvc\controllers;

class DefaultController{
	public function defaultAction()
	{
		// parameter order -> vues, tpl
		$myView = new View("dashboard");
	}
}