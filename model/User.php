<?php

include_once 'dbFunctions.php';

class User {
	public $name;
	public $id;
	public $permission;
	public $email;
	public $sex;
	public $birthdate;
	public $city;
	public $log_in;
	public $owner;


	public function get_user($id){
		$query = "SELECT user.id, user.name, user.sex ,".
			" user.birthdate, user.city, user.email, permission.name AS permission".
			" FROM user".
			" JOIN user_perm ON user.id = user_perm.user_id".
			" JOIN permission ON user_perm.perm_id = permission.id".
			" WHERE user.id =" . $id;
		
		$result = $db->query($query);
		
		//check if email exists in db
		if($row = get_rows($result)){
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$user = new User();
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
		echo $query;
		
		$result = $db->query($query);
		//if($result = num_rows > 0 
		var_dump($result);
		echo '<br>';
	}

	//add table {id,rest_id}
	public function add_table($restaurant) {
		global $db;
			
		if ($this->permission == "Admin" or $this->owner == $restaurant->id) {
			$query = "INSERT INTO tables (rest_id)".
				"VALUES (" . $restaurant->id . ")";
			return $db->query($query);
		}
		else {
			return false;
		}
	}
	
	public function delete_table ($restaurant, $table_id) {
		global $db;
	
		if ($this->permission == "Admin" or $this->owner == $restaurant->id) {
			$query = "DELETE FROM tables WHERE id = ". $table_id;
			
			echo $query;
			$db->query($query);
			var_dump($db->insert_id);
		}
		else {
			return false;
		}
	}	
}
/*
$model = 
$test->get_user('rens.mester@hotmail.com');
var_dump($test);
$attr = array('name'=>'Rens Mester','sex'=>'0','birthdate'=>'1995-09-31','city'=>'Hoorn');
var_dump($attr);
var_dump($test);
echo '<br>';
echo '<br>';
$test->change_attr($attr);

var_dump($test->get_user('rens.mester@hotmail.com'));
 */

?>
