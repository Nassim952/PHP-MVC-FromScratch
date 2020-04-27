<?php
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
		
		$user->setFirstName("toto");
		$user->setLastName("tata");
		$user->setEmail("test@gmail.com");
		$user->setPwd("password");
		$user->setStatus(0);

		$user->save();

		$myView = new View("register", "account");
		$myView->assign("configForm",$configForm);
	}

	public function forgetPwdAction(){
		$myView = new View("forgetPwd", "account");
	}
}