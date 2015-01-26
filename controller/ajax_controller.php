<?php
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
	$bookings = $model->get_bookings($restaurant, $input['date'], true);

	//check if we have something to return
	$html = '';
	$times = array();
	if(!empty($bookings)){
		foreach($bookings as $booking){
			$user = new User($booking->user1);
			//check the sex of the user
			$booking->user1 = $user;
			$html .= '<li id="' . $booking->id . '"><form action="/ajax/book_table" method="POST">' .
				 $booking->user1->age() . ' ' . ($user->sex == 0 ? 'Man' : 'Vrouw') . $booking->time .
				 '<input type="field" name="input[rest_id]" value="' .
				 $booking->table_id .'" class="hidden">'.
				'<input type="submit" value="Reserveer"></input></form></li>';
			$times[$booking->time] += 1;
		}
	}
	$html .= '<form action="/ajax/book_table" method="POST"><select name=input[time]>'; 
	if(!empty($times)){
		foreach($times as $time){
			if(!$times[$time] > count($restaurant->tables)){
				$html .= '<option value=' . $time . '>' . substr($booking->time, 0, 5) . '</option>';
			}
		}
	}
	else{
		$html .= '<option value="18:00">18:00</option>
			<option value="20:00">20:00</option>';
	}
	$html .= '</select></form>';
	echo $html;
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
