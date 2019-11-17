<?php 

class LoginOutController{
	public function httpGetMethod(Http $http, array $queryFields){
		if(isset($_SESSION['user'])) {
			unset($_SESSION['user']);
			$http->redirectTo('/');
		
		}
	}


	public function httpPostMethod(Http $http, array $formFields){

	}
}
