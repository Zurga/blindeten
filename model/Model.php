<?php
//get db connection
include_once 'dblogin.php';
//include_once 'Map.php';
include_once 'User.php';
include_once 'Restaurant.php';

class Model{
	private $salt1 = "12M6&#%lN*msp";
	private $salt2 = "@#k45hHdsl$2*";

	//log the user the system and then return user info
	public function login($email_addr, $password){
		$salted = $this->salt1 . $password . $this->salt2;
		$epassword = crypt($salted);
		
		$query = "SELECT user.id, user.name, user.sex ,".
			" user.birthdate, user.city, user.email, permission.name AS permission".
			" FROM user".
			" JOIN user_perm ON user.id = user_perm.user_id".
			" JOIN permission ON user_perm.perm_id = permission.id".
			" WHERE user.email ='" . $email_addr .
			" ' AND user.password = '" . $epassword . "'";
		
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


	//Create new account, receive associative array
	public function add_account($attr){
		global $db;
		$salted = $this->salt1 . $attr['password'] . $this->salt2;
		$password = crypt($salted);
		
		$query = "INSERT INTO user (name, email, birthdate, sex, password, city) ".
			"VALUES (". $attr['name'] . "," . $attr['email'] . "," .
			$attr['birthdate']. "," . $attr['sex'] . "," . $password . "," . 
			$attr['city'] . ")";
	       	echo $query;
		$result	= $db->query($query);
		var_dump($result);
		if($result->num_rows > 0 ){
			echo 'Yay888';
		}
	}

	public function book_table($user, $restaurant, $table_id, $time){
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
	public function get_restaurants(){
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
						//add the table id to the restaurant
						//$restaurant->tables[] = $table['id'];
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
