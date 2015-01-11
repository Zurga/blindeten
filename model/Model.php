<?php
//get db connection
include_once('dbConnect');
include_once('Map.php');
include_once('User.php');


class Model{

	//log the user the system and then return user info
	public function login($email_addr, $password){
		$query = "SELECT user.id, user.name, user.sex ,".
			" user.birthdate, user.city, user.email, permission.name AS permission".
			" FROM user".
			" JOIN user_perm ON user.id = user_perm.user_id".
			" JOIN permission ON user_perm.perm_id = permission.id".
			" WHERE user.email ='" . $email_addr .
			" ' AND user.password = '" . $password . "'";
		
		$result = $db->query($query);
		
		//check if email exists in db
		if($row = get_rows($result)){
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$user = new User()
			//assign values to user based on mySQL columns
			foreach($row as $key=>$val){
				$user->$key = $val;
			}
			return $user;
		}
		else{
			return false; 
		}
			
	}

	public function change_attr($user, $attr) {
		global $db;
		$query = "UPDATE user SET name = '".$attr['name']."', sex = '".$attr['sex']."',".
			"birthdate = '".$attr['birthdate']."', city = '".$attr['city']."'". 
			" WHERE email = '".$user->email."'";
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

	public function booktable($user, $table_id){
		//get if the table id exsists
		$tableQ = "SELECT DISTINCT * FROM tables" .
			" WHERE id = " . $table_id;
		$result = $db->query($tableQ);
		
		if ($rows = get_rows($result){
			
		}
	}

	//get a list of restaurants that have tables that can be reserved
	public function get_restaurants($city){
		global $db;
		$restaurants = array();

		$query = 'SELECT DISTINCT restaurant.id,restaurant.name,' .
			' restaurant.lat, restaurant.lon, restaurant.url' .
			' FROM restaurant' .
			' JOIN tables on restaurant.id = tables.rest_id' .
			' WHERE tables.user2 is NULL';
		
		$result = $db->query($query);
		
		if ($rows = get_rows($result)) {
			foreach($rows as $row) {
				//new restaurant object
				$restaurant = new Restaurant;
				$tableQ = 'SELECT id FROM `tables`' .
					' WHERE rest_id = ' . $row['id'];

				if ($tables = get_rows($db->query($tableQ) {
					foreach($tables as $table){
						//add the table id to the restaurant
						$restaurant->table[] = $table['id'];
					}
				}
				//fill the restaurant data
				$restaurant = set_var($row, $restaurant);
				$restaurants[] = $restaurant;
				return $restaurant;
			}
		}
	}


}

//return all rows or one
function get_rows($result){
	if ($result->num_rows == 1){
		$row = result->fetch_assoc();
		return $row;
	}
	else if($result->num_rows > 1){
		var $rows;
		while ($row = result->fetch_assoc()){
			$rows[] = $row;
		}
		return $rows;
	}
	else{
		return false;
	}
}

function set_var($var, $object){
	foreach($row as $key=>$val){
		$object->$key = $val;
	}
}
