<?php

//	echo 'het werkt, het restaurant id = ' . $_GET['input'];
	//$bookings = $this->model->get_bookings($_GET['input']);
	//include $root . '/html/calendar.php';

if($request == '/ajax/booking'){
	$restaurant = new Restaurant($_POST['input']);
	//var_dump($restaurant);	
	if (!isset($_GET['date'])){
		$bookings = $model->get_bookings($restaurant);
	}
	echo json_encode($bookings);
	echo 'test';
}
