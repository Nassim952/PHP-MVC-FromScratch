<?php
class UserController{
	public function loginAction(){
		$myView = new View("login", "account");
	}

	public function registerAction(){
		
		$user = new users();
		
		$user->setFirstName("nassim");
		$user->setLastName("mmadi");
		$user->setEmail("nasfahdine@gmail.com");
		$user->setPwd("password");
		$user->setStatus(0);

		$user->save();

		$myView = new View("register", "account");

	}

	public function forgetPwdAction(){
		$myView = new View("forgetPwd", "account");
	}
}