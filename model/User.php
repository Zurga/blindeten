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
	public $log_in;
	public $owner;


	public function __construct($id){
		global $db;
		$this->db = $db;

		$query = "SELECT user.id, user.name, user.sex ," .
			" user.birthdate, user.city, user.email," .
		        " permission.name AS permission".
			" FROM user" .
			" JOIN user_perm ON user.id = user_perm.user_id" .
			" JOIN permission ON user_perm.perm_id = permission.id" .
			" WHERE user.id = " . $id;
		var_dump($db);
		var_dump($this->db);
		$result = $db->query($query);
		
		//check if email exists in db
		if($row = get_rows($result)){
			$row = $result->fetch_array(MYSQLI_ASSOC);
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
		$query = "UPDATE user SET name = '".$attr['name']."', sex = '".$attr['sex']."',".
			"birthdate = '".$attr['birthdate']."', city = '".$attr['city']."'". 
			" WHERE email = '".$this->email."'";
		
		return $this->db->query($query);
	}

	public function add_restaurant($user_id, $attr){
		$query = "INSERT INTO restaurant (owner, name, lat, lon, url)" .
			" VALUES (". $attr['user_id'] . "," . $attr['name'] . "," . 
			$attr['lat'] . "," . $attr['lon'] . "," . $attr['url'] . ")";

		if($this->db->query($query)){
			$rest_id = $this->db->insert_id;
			//TO DO add tables to restaurants
			//foreach($attr['tables'] as table){
			//	$this->add_table();
			//}
		}
	}
	
	public function delete_account($user_id) {
		if ($this->permission == "Admin" or $this->id == $user_id) {
			$query = "DELETE FROM user WHERE id = ". $user_id;
			//if ($this->permission == "Owner") {
				//delete_restaurant();
			//}
			//else {
				//return false;
			//}
			$this->db->query($query);
		}
		else {
			return false;
		}
	}

	//add table {id,rest_id}
	public function add_table($restaurant){
		if ($this->permission == "Admin" or $this->owner == $restaurant->id) {
			$query = "INSERT INTO tables (rest_id)".
				"VALUES (" . $restaurant->id . ")";
			$this->db->query($query);
			$this->db->insert_id;
		}
		else {
			return false;
		}
	}
	
	public function delete_table ($restaurant, $table_id) {
		if ($this->permission == "Admin" or $this->owner == $restaurant->id) {
			$query = "DELETE FROM tables WHERE id = ". $table_id;
			
			return $this->db->query($query);
		}
		else {
			return false;
		}
	}	
	
	public function change_perm ($permission,$email) {
		if ($this->permission == "Admin") {
			$user_query = "SELECT id FROM user WHERE email = '". $email ."'";
			$query = "UPDATE user_perm SET perm_id = ". $permission .
					" WHERE user_id = (". $user_query .")";
					
			return $this->db->query($query);
		}
		else {
			return false;
		}
	}
}
?>
