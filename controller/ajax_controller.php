<?php
if($request == '/ajax/calendar'){
	$input = $_POST['input'];
	$restaurant = new Restaurant($input['id']);
	
	header('Content-Type: application/json');
	//get all the bookings after the current date which is given by javascript
	$cur_date = date("Y-m-d");
	$bookings = $model->get_bookings($restaurant, $cur_date, true);
	$days = array();
	if(!empty($bookings)){
	foreach($bookings as $booking){
		$days[$booking->date] += 1;
		}
	}
	echo json_encode($days);
}

if($request == '/ajax/booking'){
	$input = $_POST['input'];
	$restaurant = new Restaurant($input['id']);
	$bookings = $model->get_bookings($restaurant, $input['date'], false);

	//check if we have something to return
	$html = '';
	$times = array();
	if(!empty($bookings)){
		foreach($bookings as $booking){
			$user = new User($booking->user1);
			//check the sex of the user
			$booking->user1 = $user;
			$html .= '<li id="' . $booking->id . '" class="booking"><form action="/ajax/book_table" method="POST">' .
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
	$html .= '</select><input type="submit" value="Reserveer"></form>';
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
