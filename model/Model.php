<?php
//get db connection
include_once 'dblogin.php';
//include_once 'Map.php';
include_once 'User.php';
include_once 'Restaurant.php';

class Model{
	private $salt1 = "12M6&#%lN*msp";
	private $salt2 = "@#k45hHdsl$2*";

	function __construct(){
		global $db;
		$this->db = $db;
	}

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


	//Create new account with specified attributes, return true or with reason.
	public function add_account($attr){
		$salted = $this->salt1 . $attr['email'] . $attr['password'] . $this->salt2;
		$password = crypt($salted);

		//create a date int array to check if the date exists
		$date = explode('-',$attr['birthdate']);
		array_walk($date, 'intval');

		//check if the date is valid
		if(checkdate($date[1],$date[2], $date[0])){
			//it is so add account
			$query = "INSERT INTO user (name, email, birthdate, sex, password, city) ".
				"VALUES ('". $attr['name'] . "','" . $attr['email'] . "','" .
				$attr['birthdate']. "','" . $attr['sex'] . "','" . $password . "','" . 
				$attr['city'] . "')";
			
			if ($this->db->query($query)) {
				$query = "INSERT INTO user_perm (perm_id, user_id)".
					"VALUES (2,". $db->insert_id .")"; 
				$this->db->query($query);
			}
			else {
				return false;
			}
			
		}
		else {
			return false;
		}
	}

	public function book_table($user, $restaurant, $table_id, $time){
		//check if the table belongs to the restaurant
		if (in_array($table_id, $restaurant->tables)) {
			//check if the booking does exists to determine
			//if the booking is new or if the user books 
			//to an existing table
			$query = "SELECT id FROM bookings" .
				" WHERE table_id = " . $table_id . 
				" AND time = ". $time;

			if ($exists = get_rows($this->db->query($query))){
				//it exists
				$user1 = $exists['user1'];
				$bookQ = "UPDATE bookings SET user2 = " . $user->id.
					" WHERE id = " . $exists['id'];
				return $user1;
			}
			else{
				//write the booking to the database
				$bookQ = "INSERT INTO bookings (table_id, user1, time)" .
					" VALUES (" . $table_id . "," . $user-id . "," .
					$time . ")";

				return $this->db->query($bookQ);
			}
		}
		else{
			return false;
		}
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
						if(gettype($table) == 'string'){
							$restaurant->tables[] = $table;
						}
						else{
							$restaurant->tables[] = $table['id'];
						}
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
