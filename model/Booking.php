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
			//make new users and store them in $user1 and $user2
			$this->user1 = new User($this->user1);
			$this->user2 = new User($this->user2);
			return $this;
		}
		else{
			return false; 
		}
	}
}
?>
