<?php
class UserController{
	public function loginAction(){
		$myView = new View("login", "account");
	}

	public function registerAction(){
		
		$user = new users();
		
		$user->setId(1);
		$user->setEmail("nasfahdine@gmail.com");
		$user->setPwd("toto");

		$user->save();

		$myView = new View("register", "account");

	}

	public function forgetPwdAction(){
		$myView = new View("forgetPwd", "account");
	}
}