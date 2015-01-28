<?php

include_once 'dbFunctions.php';
class User {
	private $db;
	public $name;
	public $surname;
	public $id;
	public $permission;
	public $email;
	public $sex;
	public $birthdate;
	public $city;
	public $owner;

	//fills the user class objects with data
	public function __construct($id){
		global $db;
		$this->db = $db;

		//query from the database
		$query = "SELECT user.id, user.name, user.sex ," .
			" user.birthdate, user.city, user.email," .
		        " user.owner, permission.name AS permission".
			" FROM user" .
			" JOIN user_perm ON user.id = user_perm.user_id" .
			" JOIN permission ON user_perm.perm_id = permission.id" .
			" WHERE user.id = " . $id;
		
		if($row = get_rows($this->db->query($query))){
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
	
	//Change data of user
	public function change_attr($attr) {
		$query = "UPDATE user SET name = '".$attr['name']."', sex = '".$attr['sex']."',".
			"birthdate = '".$attr['birthdate']."', city = '".$attr['city']."'". 
			" WHERE email = '".$this->email."'";
		
		return $this->db->query($query);
	}

	//Add restaurant
	public function add_restaurant($user_id, $attr){
		$query = "INSERT INTO restaurant (owner, name, lat, lon, url, street, number, zipcode, city)" .
			" VALUES (". $user_id . "," . $attr['name'] . ",". 
			$attr['lat'] . "," . $attr['lon'] . "," . $attr['url'] . ",".
			$attr['street'].",".$attr['zipcode'].",".$attr['number']. ",".
			$attr['city'].")";
			
		$this->db->query($query);
		$rest_id = $this->db->insert_id;

		for ($i = 1; $i <= $attr['num_tables']; $i++) {
			$this->add_table($rest_id);
		}
	}
	
	//Change Restaurant
	public function change_rest($attr) {
		$query = "UPDATE restaurant SET name = '".$attr['name']."', url = '".$attr['url']."',".
			"street = '".$attr['street']."', number = ".$attr['number'].", city = '".$attr['city']."'". 
			", zipcode = '".$attr['zipcode']."' WHERE id = '".$this->owner."'";
		
		for ($i = 1; $i <= abs($attr['tables']); $i++) {
			$this->add_table(new Restaurant($this->owner));
		}
		
		return $this->db->query($query);
	}
	
	//Delete account (selected by email)
	public function delete_account($email) {
		if ($this->permission == "Admin" or $this->email == $email) {
			$query = "DELETE FROM user WHERE email = '". $email . "'";
			
			//check if owner, if so it deletes the restaurant from the owner
			if (is_null($this->owner)) {
				//Nothing
			}
			else {
				$this->delete_restaurant($owner);
			}
			return $this->db->query($query);
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
	
	//deletes tables by id
	public function delete_table ($restaurant, $table_id) {
		if ($this->permission == "Admin" or $this->owner == $restaurant->id) {
			$query = "DELETE FROM tables WHERE id = ". $table_id;
			
			return $this->db->query($query);
		}
		else {
			return false;
		}
	}	
	
	//Delete restaurant
	public function delete_restaurant ($rest_id) {
		if ($this->permission == "Admin" or $this->owner == $rest_id) {
			$query = "DELETE FROM restaurant WHERE id = ". $rest_id;
			$table_query = "DELETE FROM tables WHERE rest_id = ". $rest_id;
			
			$this->db->query($query);
			$this->db->query($table_query);
		}
		else {
			return false;
		}
	}
	
	//Edit the permissions
	public function change_perm ($permission, $email) {
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
	
	//Display age, calculated by birthdate
	//Source: http://bit.ly/1AYzPZS
	public function age() {
	date_default_timezone_set('Europe/Amsterdam');
		$age = date_create($this->birthdate)->diff(date_create('today'))->y;
    
		return $age;
	}
	
	//Save changed booking
	//Verwijder jezelf uit de booking en maak een nieuwe booking aan als die datum/tijd beschikbaar is.
	public function change_booking($booking, $time, $date){
	$this->cancel_booking($booking->id);
	$restaurant = new Restaurant($booking->restaurant_id);
	var_dump($time);
	var_dump($date);
	if($cur_bookings = $model->get_bookings($restaurant,$date, $time, NULL, true)){
		foreach($cur_bookings as $booking){
			foreach($restaurant->tables as $table){
				if($booking->table_id != $table){
					if($booking = $model->book_table($user, $restaurant, 
						$table, $date, $time)){
						return true;
					}
				}
			}
		}
	}
	else {
		return false;
	}
	}
	//Cancel bookings
	public function cancel_booking($booking_id) {
		$booking = new Booking($booking_id);
	
		// check if the user is user1 or user2 and if there is another user
		if ($booking->user1->id == $this->id) {
			if ($booking->user2 != 0) {
				$delquery = "UPDATE bookings SET user1 = ". $booking->user2->id .
				", user2 = 0 WHERE id = ". $booking_id;
				
			}
			else {
				$delquery = "DELETE FROM bookings WHERE id = ". $booking_id;
			}
		}
		elseif ($booking->user2 == $this->id) {
			$delquery = "UPDATE bookings SET user2 = 0 WHERE id = ". $booking_id;
		}
		else {
			return false;
		}
		var_dump(other_user($user));
		return $this->db->query($delquery);
		}		
}
?>
