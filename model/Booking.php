<?php
include_once 'User.php';

class Booking{
	public $id;
	public $restaurant_id;
	public $table_id;
	public $user1;
	public $user2;
	public $date;
	public $time;
	private $db;
	
	public function __construct($id){
		global $db;
		$this->db = $db;

		$query = "SELECT *".
			" FROM bookings" .
			" WHERE id = " . $id;
		
		if($row = get_rows($this->db->query($query))){
			//assign values to user based on mySQL columns
			set_var($row, $this);
			return $this;
		}
		$this->user1 = new User($this->user1);
		$this->user2 = new USer($this->user2);
		else{
			return false; 
		}
	}
	
	//returns the other user id
	public function other_user($user){
		if ($this->user1 == $user->id) {
			return $user2;
		}
		else if ($this->user2 == $user->id) {
			return $user1;
		}
		else {
			return false;
		}
	}
}
?>
