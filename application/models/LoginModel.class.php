<?php 

class LoginModel {
	private $db;

		function __construct() {
			$this->db= new Database();
		}

		function getUserByEmail($email) {
				return  $this->db->queryOne('SELECT * FROM user WHERE Email = ?', [$email]); 
		}


}
