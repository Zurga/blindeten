<?php
include_once 'User.php';


class Booking{
	public $id;
	public $table_id;
	public $user1;
	public $user2;
	public $time;
	
	public function __construct($id){
		global $db;
		$this->db = $db;

		$query = "SELECT id, table_id, time".
			" FROM bookings" .
			" WHERE id = " . $id;
		
		if($row = get_rows($this->db->query($query))){
			//assign values to user based on mySQL columns
			set_var($row, $this);
			return $this;
		}
		else{
			return false; 
		}
	}
	
	public function add_history(){	
		//select correct bookings, move to history, delete booking
		$query = "SELECT restaurant_id,time,user1,user2 FROM bookings WHERE time".
			" > ". time();
			
		if ($bookings = get_rows($this->db->query($query))) {
			foreach ($bookings as $booking) {
				var_dump($booking);
				$hist_query = "INSERT INTO history (user_id,".
					"restaurant_id,bookings_time)".
					" VALUES (". $booking['user1'] .",". 
					$booking['restaurant_id'] .",'".
					$booking['time']. "'),(". 
					$booking['user2'] .",". 
					$booking['restaurant_id'] .",'". 
					$booking['time']. "')";
				$this->db->query($hist_query);
				return true;	
			}
		}
		else {
			return false;
		}
	}
}
