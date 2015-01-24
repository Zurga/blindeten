<?php

//	echo 'het werkt, het restaurant id = ' . $_GET['input'];
	//$bookings = $this->model->get_bookings($_GET['input']);
	//include $root . '/html/calendar.php';

if($request == '/ajax/booking'){
	$input = $_POST['input'];
	$restaurant = new Restaurant($input['id']);
	
	header('Content-Type: application/json');
	if(isset($input['date'])){
		$bookings = $model->get_bookings($restaurant, $date);
		foreach($bookings as $booking){
			$user = new User($booking->user1);
			$booking->user1['age'] = $user->age();
			$booking->user1['sex'] = ($user->sex == 0 ? 'Man' : 'Vrouw');

		echo json_encode($bookings);
	}
	else{
		$days = array();
		if(!empty($bookings)){
		foreach($bookings as $booking){
			$days[$booking->date] += 1;
			}
		}
	}
	echo json_encode($days);
}

if($request == 'ajax/book_table'){
	if($logged_in){
		$restaurant = new Restaurant($_POST['input']['id']);
		$table = $_POST['input']['table_id'];
		$time = $_POST['input']['time'];
		if($booking = $model->book_table($user, $restaurant, $table, $time)){
			$booking->
	}
	else {

