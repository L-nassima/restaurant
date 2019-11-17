<?php
	
	class UserModel {
		private $db;
		

		function __construct() {
			$this->db= new Database();
		}

		function addContactUser($firstName, $lastName, $email, $password, $birthDate, $adress, $city, $zipCode, $country, $phone ) {
			$password=password_hash($password, PASSWORD_BCRYPT);
			$newUserId = $this->db->executeSql('INSERT INTO user(FirstName, LastName,Email, Password, BirthDate, Address, City, ZipCode, Country, Phone, CreationTimestamp, LastLoginTimestamp) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, Now(), Now())',[$firstName, $lastName, $email, $password, $birthDate, $adress, $city, $zipCode, $country, $phone]);
	

		}
	} 