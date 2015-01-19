<?php

include_once 'dblogin.php';
include_once 'dbFunctions.php';

class Login{
	private $salt1 = "12M6&#%lN*msp";
	private $salt2 = "@#k45hHdsl$2*";
	
	function __construct(){
		global $db;
		$this->db = $db;
	}
	//log the user the system and then return user info
	public function login($email_addr, $password){
		$salted = $this->salt1 . $email_addr . $password . $this->salt2;
		$epassword = hash('sha256', $salted);
	
		$query = "SELECT user.id,".
			" FROM user".
			" WHERE user.email = '" . $email_addr .
			" ' AND user.password = '" . $epassword . "'";
		
		$result = get_rows($this->db->query($query));
	 
		if($
			$_SESSION['logged_in'] = true;
			$_SESSION['id'] = $user->id;
			return $user;
		}
		else{
			return false; 
		}
	}

	public function check_login(){
		if(isset($_SESSION['logged_in'])){
			return true;
		}
		else {
			return false;
		}
	}
	
	public function logout() {
		session_destroy();
		session_start();
	}
}
