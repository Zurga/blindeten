<?php

//gives var db which is a connection to the database, use $db->query() to query the database
include("dblogin.php");
global $db;

class User {
	var $name;
	var $id;
	var $permission;
	var $email;
	var $sex;
	var $birthdate;
	var $city;
	var $log_in;

	//function that gets all the info of the user from the db with email
	public function get_user($email_addr){
		global $db;
		$query = "SELECT user.id, user.name, user.sex ,".
			"user.birthdate, user.city, user.email, permission.name AS permission ".
			"FROM user ".
			"JOIN user_perm ON user.id = user_perm.user_id ".
			"JOIN permission ON user_perm.perm_id = permission.id ".
			"WHERE email ='".$email_addr."'";
		
		$result = $db->query($query);
		
		//check if email exists in db
		if($result->num_rows > 0){
			$row = $result->fetch_array(MYSQLI_ASSOC);
			//assign values to user based on mySQL columns
			foreach($row as $key=>$val){
				$this->$key = $val;
			}
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
		
		var_dump($result);
		echo '<br>';
	}
	
	public function add_account($attr){
		global $db;

		$query = "INSERT INTO user (name, email, birthdate, sex, password, city) ".
			"VALUES (". $attr->name . "," . $attr->email . "," .
			$attr->birthdate. "," . $attr->sex . "," . $attr->password . "," . 
			$attr->city . ")";
	       	
		$result	= $db->query($query);
		if($result->num_rows > 0 ){
			echo 'Yay888';
		}
}

$test = new User;
$test->get_user('rens.mester@hotmail.com');
var_dump($test);
$attr = array('name'=>'Rens Mester','sex'=>'0','birthdate'=>'1995-09-31','city'=>'Hoorn');
var_dump($attr);
var_dump($test);
echo '<br>';
echo '<br>';
$test->change_attr($attr);

var_dump($test->get_user('rens.mester@hotmail.com'));


?>
