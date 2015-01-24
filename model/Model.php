<?php
//get db connection
include_once 'dblogin.php';
include_once 'User.php';
include_once 'Restaurant.php';
include_once 'Booking.php';

class Model{
	private $db;

	public function __construct(){
		global $db;
		$this->db = $db;
	}

	//Create new account with specified attributes, return true or with reason.
	public function add_account($attr){
		//Password Encryption
		$password = encrypt($attr['email'],$attr['password']);

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
			
			//permission
			if ($this->db->query($query)) {
				$id = $this->db->insert_id;
				$query = "INSERT INTO user_perm (perm_id, user_id)".
					"VALUES (2,". $this->db->insert_id .")"; 
				$this->db->query($query);
				return true;
			}
			else {
				return false;
			}
			
		}
		else {
			return false;
		}
	}

	public function book_table($user, $restaurant, $table_id, $date, $time){
		//check if the table belongs to the restaurant
		if (in_array($table_id, $restaurant->tables)) {
			//check if the booking does exists to determine
			//if the booking is new or if the user books 
			//to an existing table
			$query = "SELECT id, user1 FROM bookings" .
				" WHERE table_id = " . $table_id . 
				" AND date = '" . $date . "'" .
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
				$bookQ = "INSERT INTO bookings (restaurant_id,".
					" table_id, user1, date, time)" .
					" VALUES (". $restaurant->id ."," . $table_id . "," .
					$user->id . ",'". $date . "','" . $time . "')";
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

	//get an array of restaurants objects
	public function get_restaurants(){
		$restaurants = array();

		$query = 'SELECT id' .
			' FROM restaurant';
		
		if ($rows = get_rows($this->db->query($query))) {
			foreach($rows as $row) {
				//new restaurant object
				$restaurant = new Restaurant($row['id']);

				//check which table belong to the restaurant
				$tableQ = 'SELECT id FROM `tables`' .
					' WHERE rest_id = ' . $row['id'];

				if($tables = get_rows($this->db->query($tableQ))){
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
				$restaurants[] = $restaurant;
			}
			return $restaurants;
		}
	}
	
	//Get the history (time and restaurant)
	public function get_history($user) {
		$query = "SELECT bookings_time, restaurant_id ".
			"FROM history WHERE user_id = ". $user->id;
		
		return get_rows($this->db->query($query));
	}
	
	//Get bookings with id / time 
	public function get_bookings($object, $date=NULL){
		if (get_class($object) == 'User') {
			$query = "SELECT id FROM bookings WHERE user1 = ". $object->id .
			" or user2 = ". $object->id;
		}
		else if (get_class($object) == 'Restaurant') {
			$query = "SELECT id FROM bookings WHERE restaurant_id = ". $object->id .
				" AND user2 is NULL";
		}
		else {
			return false;
		}
		
		//add the date to the query if it is set
		if(isset($date)){
			$query = $query . ' AND date = "' . $date . '"';
		}
		if($rows = get_rows($this->db->query($query))){
			$bookings = array();
			foreach($rows as $row){
				if(gettype($row) == 'string'){
					$bookings[] = new Booking($row);
				}
				else{
					$bookings[] = new Booking($row['id']);
				}
			}
			return $bookings;
		}
	}
	
	//Send email with new random password and update the database
	public function forgot_password($email) {
		$query = "SELECT id FROM user WHERE email='". $email."'";
		
		if($row = get_rows($this->db->query($query))){
			$user = new User($row['id']);
			//5 = forgot password mail
			$password = new_string(8);
			send_mail($user, 5, $password);
			$e_passwd = encrypt($email, $password);
			$this->change_password($row['id'], $e_passwd);
			return true;
		}
		return false;
	}
	
	//Change the password
	public function change_password($user_id, $new_passw) {
		$query = "UPDATE user SET password = '". $new_passw ."' WHERE id= ".$user_id;
		var_dump($query);
		$this->db->query($query);
	}
}
?>
