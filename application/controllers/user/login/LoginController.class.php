<?php
class LoginController {
	public function httpGetMethod(Http $http, array $queryFields){


    }
    
    public function httpPostMethod(Http $http, array $formFields){

    	
    	$password =$formFields['Password']; 
    	$email= $formFields['Email'];

        
    	$model = new LoginModel();
    	$result = $model->getUserByEmail($email);
        



    	if($result != false) {
    		$hash = $result['Password'];
           
    		$check = password_verify($password, $hash);
    		if($check){
                
    			$_SESSION['user'] = $result; 
                if($_SESSION['user']['Admin'] == 1){
                    $http->redirectTo('/Article');

                }

    			$http->redirectTo('/Commande');
    		}
    	}

    }
  	
}


