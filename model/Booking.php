<?php

class Booking{
	public $id;
	public $table_id;
	public $user1;
	public $user2;
	public $time;
	
	public function __construct($id){
		global $db;
		$this->db = $db;

		$query = "SELECT id, table_id, user1 ," .
			" user2, time".
			" FROM bookings" .
			" WHERE id = " . $id;
		
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
}