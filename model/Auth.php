<?php

include_once 'dblogin.php';
include_once 'dbFunctions.php';

class Auth{
	
	function __construct(){
		global $db;
		$this->db = $db;
	}
	//log the user the system and then return user info
	public function login($email_addr, $password){
		$epassword = encrypt($user, $password);
		
		$query = "SELECT user.id".
			" FROM user".
			" WHERE user.email = '" . $email_addr .
			" ' AND user.password = '" . $epassword . "'";
			
		$result = get_rows($this->db->query($query));
		if($result){
			$_SESSION['logged_in'] = true;
			$_SESSION['id'] = $result['id'];
			return true;
		}
		else{
			return false; 
		}
	}

	//Check if logged in
	public function check_login(){
		if(isset($_SESSION['logged_in'])){
			return true;
		}
		else {
			return false;
		}
	}
	
	//Logout
	public function logout() {
		session_destroy();
		session_start();
	}
}
