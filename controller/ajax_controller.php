<?php

//	echo 'het werkt, het restaurant id = ' . $_GET['input'];
	//$bookings = $this->model->get_bookings($_GET['input']);
	//include $root . '/html/calendar.php';

if($request == '/ajax/calendar'){
	$input = $_POST['input'];
	$restaurant = new Restaurant($input['id']);
	
	header('Content-Type: application/json');
	$bookings = $model->get_bookings($restaurant);
	$days = array();
	if(!empty($bookings)){
	foreach($bookings as $booking){
		$days[$booking->date] += 1;
		}
	}
	echo json_encode($days);
}

if($request == '/ajax/booking'){
	header('Content-Type: application/json');
	$input = $_POST['input'];
	$restaurant = new Restaurant($input['id']);
	var_dump($input);
	$bookings = $model->get_bookings($restaurant, $input['date']);
	var_dump($bookings);
	if(!empty($bookings){
		foreach($bookings as $booking){
			$user = new User($booking->user1);
			//$booking->user1['age'] = $user->age();
			$booking->user1['sex'] = ($user->sex == 0 ? 'Man' : 'Vrouw');
			echo json_encode($bookings);
		}
	}
}

if($request == 'ajax/book_table'){
	if($logged_in){
		$restaurant = new Restaurant($_POST['input']['id']);
		$table = $_POST['input']['table_id'];
		$time = $_POST['input']['time'];
		if($booking = $model->book_table($user, $restaurant, $table, $time)){
			//$booking->
		}
	}
	else {
	}
}
