<?php

namespace mvc\controllers;

use mvc\core\QueryBuilder;
use mvc\models\users;
use mvc\core\View;
use mvc\core\Validator;
use mvc\managers\PostManager;

class UserController{
	public function loginAction(){
		$myView = new View("login", "account");
	}

	public function registerAction(){

		$configForm = users::getRegisterForm();

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$error = Validator::formValidate($configForm, $_POST);
		}

		$user = new users();
		
		$user->setId(11);
		$user->setFirstName("cristiano");
		$user->setLastName("ronaldo");
		$user->setEmail("cristiano.ronaldo@gmail.com");
		$user->setPwd("juve");
		$user->setStatus(0);

		// $user->save();
		// $user->findId(2);

		// $myView = new View("register", "account");
		// $myView->assign("configForm",$configForm);

		$postManager = new PostManager();
		$result = $postManager->getUserPost(11);
		print_r($result);
	}

	public function forgetPwdAction(){
		$myView = new View("forgetPwd", "account");
	}
}