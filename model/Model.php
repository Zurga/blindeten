<?php
//get db connection
include_once 'dblogin.php';
//include_once 'Map.php';
include_once 'User.php';
include_once 'Restaurant.php';

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
			$user = new User();
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

	public function booktable($user, $restaurant, $table_id, $time){
		global $db;
		//get if the table id exsists
		
		if (in_array($table_id, $restaurant->tables)) {
			$check_table = "SELECT * FROM bookings" .
				       " WHERE table_id = " . $table_id . "AND ".
				       " ";
		}

		$tableQ = "SELECT DISTINCT  FROM tables" .
			" WHERE id = " . $table_id;
	
		$result = $db->query($tableQ);
		
		if ($rows = get_rows($result)){
			if ($rows["user1"] == NULL) {
				$column = "user1";
			}
			else {
				$column = "user2";
			}

			$bookQ = "UPDATE tables SET ".$column." = ".$user->id.
					" , start_time = ".$time;
			$result = $db->query($bookQ);
		}
		else {
			return false;
		}
			//todo find out in which column to place user
			//and if table has two people send email to first user
			//also put booking in the archive
	}

	//get an array of restaurants objects
	public function getRestaurants(){
		global $db;
		$restaurants = array();

		$query = 'SELECT restaurant.id,restaurant.name,' .
			' restaurant.lat, restaurant.lon, restaurant.url' .
			' FROM restaurant';
		
		$result = $db->query($query);
		
		if ($rows = get_rows($result)) {
			foreach($rows as $row) {
				//new restaurant object
				$restaurant = new Restaurant;

				//check which table belong to the restaurant
				$tableQ = 'SELECT id FROM `tables`' .
					' WHERE rest_id = ' . $row['id'];

				if ($tables = get_rows($db->query($tableQ))) {
					foreach($tables as $table){
						echo $table['id'];
						//add the table id to the restaurant
						$restaurant->tables[] = $table['id'];
					}
				}
				//fill the restaurant data
				foreach($row as $key=>$val){
					$restaurant->$key = $val;
				}
				//$rest = set_var($row, $restaurant);
				//var_dump($rest);
				$restaurants[] = $restaurant;
			}
			return $restaurants;
		}
	}
}
