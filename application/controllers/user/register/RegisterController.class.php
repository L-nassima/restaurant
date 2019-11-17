<?php

class RegisterController {
	public function httpGetMethod(Http $http, array $queryFields){
			return [
				'formFields'=> [
					'FirstName'=>'',
					'LastName' =>'',
					'BirthDate' => '',
					'Adress'=> '',
					'City' => '',
					'ZipCode'=>'',
					'Country' =>'',
					'Phone' => '',
					'Email' => '',
					'Password' => ''
				]
			];
    
	} 
    
    public function httpPostMethod(Http $http, array $formFields){
    	
			if(isset($formFields) && !empty($formFields)) {
				$firstName = $formFields['FirstName'];
				$lastName =$formFields['LastName'];
				$birthDate = $formFields['BirthDate'];
				$adress = $formFields['Adress'];
				$city = $formFields['City'];
				$zipCode = $formFields['ZipCode'];
				$country = $formFields['Country'];
				$phone = $formFields['Phone'];
				$email = $formFields['Email'];
				$password = $formFields['Password'];
				

				$erreurs = array();
				if(empty($lastName)){
					array_push($erreurs, 'entrez votre nom');
				}
				if(empty($lastName)){
					array_push($erreurs, 'entrez votre prenom');
				}
				if(empty($birthDate)){
					array_push($erreurs, "entrez votre date d'anniversssaire");
				}
				if(empty($adress)){
					array_push($erreurs, 'entrez votre addresse');
				}
				if(empty($city)){
					array_push($erreurs, 'entrez le nom de votre ville');
				}
				if(empty($zipCode)){
					array_push($erreurs, 'entrez votre code postale');
				}
				if(empty($country)){
					array_push($erreurs, 'entrez le nom de votre pays');
				}
				if(empty($phone)){
					array_push($erreurs, 'entrez votre numéro de téléphone');
				}
				if(empty($email)){
					array_push($erreurs, 'entrez votre email');
				}
				if(empty($password)){
					array_push($erreurs, 'entrez votre mot de passe');
				}


				if(count($erreurs) == 0){
					$user = new UserModel();
	        		$results = $user->addContactUser($firstName, $lastName, $email, $password, $birthDate, $adress, $city, $zipCode, $country, $phone );
	        		$http->redirectTo('/user/Login');
				}
			}
				return [
				'formFields'=> $formFields,
				'erreurs' => $erreurs,
			];
	}
}			

		
	  
    	


