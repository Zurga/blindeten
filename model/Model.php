<?php
//get db connection
include_once 'dblogin.php';
//include_once 'Map.php';
include_once 'User.php';
include_once 'Restaurant.php';
include_once 'Booking.php';

class Model{
	private $salt1 = "12M6&#%lN*msp";
	private $salt2 = "@#k45hHdsl$2*";

	function __construct(){
		global $db;
		$this->db = $db;
	}

	//Create new account with specified attributes, return true or with reason.
	public function add_account($attr){
		$salted = $this->salt1 . $attr['email'] . $attr['password'] . $this->salt2;
		$password = hash('sha256', $attr['password']);

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
					"VALUES (2,". $this->db->insert_id .")"; 
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
			$query = "SELECT id, user1 FROM bookings" .
				" WHERE table_id = " . $table_id . 
				" AND time = '" . $time ."'";
			
			//it exists
			if ($exists = get_rows($this->db->query($query))){
				//check if the user is booking the same table again
				if($exists['user1'] == $user->id){
					return false;
				}
				else{
				$bookQ = "UPDATE bookings SET user2 = " . $user->id.
					" WHERE id = " . $exists['id'];
				}
			}
			else{
				//write the booking to the database
				$bookQ = "INSERT INTO bookings (table_id, user1, time)" .
					" VALUES (" . $table_id . "," . $user->id . ",'" .
					$time . "')";
			}
			if($this->db->query($bookQ)){
				$booking = new Booking($this->db->insert_id);
				return $booking;
			}
		}
		else{
			return false;
		}
	}

	public function add_history($user_id, $booking_id){
		
		
		}
	//get an array of restaurants objects
	public function get_restaurants(){
		global $db;
		$restaurants = array();

		$query = 'SELECT id' .
			' FROM restaurant';
		
		$result = $db->query($query);
		
		if ($rows = get_rows($result)) {
			foreach($rows as $row) {
				//new restaurant object
				$restaurant = new Restaurant($row['id']);

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
	
	public function get_history($user) {
		global $db;
		$query = "SELECT user_id, date, time, restaurant_id ".
			"FROM history WHERE id = ". $user->id;
		
		var_dump($db->query($query));
	}
}
