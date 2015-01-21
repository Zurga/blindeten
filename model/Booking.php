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
	
	public function get_bookings ($object) {
		global $db;
		
		if (get_class($object) == 'User') {
			$query = "SELECT * FROM bookings WHERE user1 = ". $user->id .
			" or user2 = ". $user->id;
		}
		if (get_class($object) == 'Restaurant') {
			$query = "SELECT * FROM bookings WHERE restaurant_id = ". $restaurant->id;
		}
		else {
			return false;
		}
		
		return get_rows($this->db->query($query));
}
}
?>
