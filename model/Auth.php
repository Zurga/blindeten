<?php

include_once 'dblogin.php';
include_once 'dbFunctions';

class{
	function __construct(){
		global $db;
		$this->db = $db;
	}
	//log the user the system and then return user info
	public function login($email_addr, $password){
		$salted = $this->salt1 . $email_addr . $password . $this->salt2;
		$epassword = crypt($salted);
	
		$query = "SELECT user.id, user.name, user.sex ,".
			" user.birthdate, user.city, user.email, ".
			" permission.name AS permission".
			" FROM user".
			" JOIN user_perm ON user.id = user_perm.user_id".
			" JOIN permission ON user_perm.perm_id = permission.id".
			" WHERE user.email = '" . $email_addr .
			" ' AND user.password = '" . $epassword . "'";
		
		$result = $this->db->query($query);
	 
		//check if email exists in db
		if($row = get_rows($result)){
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$user = new User();
			//assign values to user based on mySQL columns
			foreach($row as $key=>$val){
				$user->$key = $val;
			}
			$user->logged_in = true;
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
