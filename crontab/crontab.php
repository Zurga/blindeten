<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once 'dblogin.php';


public function add_history(){	
	//select correct bookings, move to history, delete booking
	$query = "SELECT restaurant_id,time,user1,user2 FROM bookings WHERE time".
		" > ". time();
		
	if ($bookings = get_rows($db->query($query))) {
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
?>