<?php

include_once 'dbFunctions.php';
include_once 'dblogin.php';

class User {
	private $db;
	public $name;
	public $id;
	public $permission;
	public $email;
	public $sex;
	public $birthdate;
	public $city;
	public $owner;


	public function __construct($id){
		global $db;

		$query = "SELECT user.id, user.name, user.sex ," .
			" user.birthdate, user.city, user.email," .
		        " user.owner, permission.name AS permission".
			" FROM user" .
			" JOIN user_perm ON user.id = user_perm.user_id" .
			" JOIN permission ON user_perm.perm_id = permission.id" .
			" WHERE user.id = " . $id;
		
		//check if email exists in db
		if($row = get_rows($db->query($query))){
			//assign values to user based on mySQL columns
			foreach($row as $key=>$val){
				$this->$key = $val;
			}
			return $this;
		}
		else{
			return false; 
		}
	}

	public function change_attr($attr) {
		global $db;
		$query = "UPDATE user SET name = '".$attr['name']."', sex = '".$attr['sex']."',".
			"birthdate = '".$attr['birthdate']."', city = '".$attr['city']."'". 
			" WHERE email = '".$this->email."'";
		
		return $db->query($query);
	}

	public function add_restaurant($user_id, $attr){
		global $db;
		$query = "INSERT INTO restaurant (owner, name, lat, lon, url)" .
			" VALUES (". $attr['user_id'] . "," . $attr['name'] . "," . 
			$attr['lat'] . "," . $attr['lon'] . "," . $attr['url'] . ")";

		if($db->query($query)){
			$rest_id = $db->insert_id;
			$qeury;
			//TO DO add tables to restaurants
			//foreach($attr['tables'] as table){
			//	$this->add_table();
			//}
		}
	}
	
	public function delete_account($user_id) {
		global $db;
		if ($this->permission == "Admin" or $this->id == $user_id) {
			$query = "DELETE FROM user WHERE id = ". $user_id;
			//if ($this->permission == "Owner") {
				//delete_restaurant();
			//}
			//else {
				//return false;
			//}
			return $db->query($query);
		}
		else {
			return false;
		}
	}

	//add table {id,rest_id}
	public function add_table($restaurant){
		global $db;
		if ($this->permission == "Admin" or $this->owner == $restaurant->id) {
			$query = "INSERT INTO test_tables (rest_id)".
				"VALUES (" . $restaurant->id . ")";
			$db->query($query);
			$db->insert_id;
		}
		else {
			return false;
		}
	}
	
	public function delete_table ($restaurant, $table_id) {
		global $db;
		if ($this->permission == "Admin" or $this->owner == $restaurant->id) {
			$query = "DELETE FROM tables WHERE id = ". $table_id;
			
			return $db->query($query);
		}
		else {
			return false;
		}
	}	
	
	//Dit is nu test verwijder 'test_'
	public function delete_restaurant ($rest_id) {
		global $db;
		if ($this->permission == "Admin" or $this->owner == $rest_id) {
			$query = "DELETE FROM test_restaurant WHERE id = ". $rest_id;
			$table_query = "DELETE FROM test_tables WHERE rest_id = ". $rest_id;
			
			$db->query($query);
			$db->query($table_query);
		}
		else {
			return false;
		}
	}
	
	public function change_perm ($permission,$email) {
		global $db;
		if ($this->permission == "Admin") {
			$user_query = "SELECT id FROM user WHERE email = '". $email ."'";
			$query = "UPDATE user_perm SET perm_id = ". $permission .
					" WHERE user_id = (". $user_query .")";
					
			return $db->query($query);
		}
		else {
			return false;
		}
	}
	
	public function age() {
	date_default_timezone_set('Europe/Amsterdam');
		$age = date_create($this->birthdate)->diff(date_create('today'))->y;
    
		return $age;
	}
}
?>
