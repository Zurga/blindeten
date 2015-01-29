<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once 'dblogin.php';

//set timezone
date_default_timezone_set("Europe/Amsterdam");

public function add_history(){	
	//select correct bookings, move to history, delete booking
	$query = "SELECT restaurant_id,time,user1,user2 FROM bookings WHERE time".
		" > ". date('H:i:s')." AND date = ". date('Y-m-j');
		
	if ($bookings = get_rows($db->query($query))) {
		foreach ($bookings as $booking) {
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

public function reminder_mail() {
	$query = "SELECT * FROM bookings"
	if($bookings = get_rows($db->query($query))) {
		foreach ($bookings as $booking) {
			//checks the date and time, if the time to booking 
			$booking = new Booking($booking['id']);
			if ($booking->date == date('Y-m-j') and $booking->time < date('H:i:s',strtotime('1 hour'))) {
				send_mail($booking->user1,7,$booking->time);
				if ($booking->user2->id != 0 and $booking->user2->id != NULL) {
					send_mail($booking->user2,7,$booking->time);
				}
			}
		}
	}
	else {
		return false;
	}
}
?>