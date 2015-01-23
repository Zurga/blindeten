<?php

//	echo 'het werkt, het restaurant id = ' . $_GET['input'];
	//$bookings = $this->model->get_bookings($_GET['input']);
	//include $root . '/html/calendar.php';

if($request == '/ajax/booking'){
	var_dump($_POST);
	$restaurant = new Restaurant($_POST['input']);
	if (!isset($_GET['date'])){
		$bookings = $model->get_bookings($restaurant);
	}
	echo json_encode($bookings);
}
