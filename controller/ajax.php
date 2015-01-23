<?php

//	echo 'het werkt, het restaurant id = ' . $_GET['input'];
	//$bookings = $this->model->get_bookings($_GET['input']);
	//include $root . '/html/calendar.php';

if($request == '/ajax/booking'){
	$restaurant = new Restaurant($_POST['input']);
	
	if (!isset($_GET['date'])){
		$bookings = $model->get_bookings($restaurant);
	}
	header('Content-Type: application/json');
	$days = array();
	if(!empty($bookings)){
		foreach($bookings as $booking){
			$days[$booking->time] += 1;
		}
	}
	echo json_encode($days);
}
