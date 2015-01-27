<?php

$input = sanitize($_POST['input']);

if($request == '/ajax/calendar'){
	$restaurant = new Restaurant($input['id']);
	
	header('Content-Type: application/json');
	//get all the bookings after the current date which is given by javascript
	$cur_date = date("Y-m-d");
	$bookings = $model->get_bookings($restaurant, $cur_date, NULL, true);
	$days = array();
	if(!empty($bookings)){
	foreach($bookings as $booking){
		$days[$booking->date] += 1;
		}
	}
	echo json_encode($days);
}

if($request == '/ajax/booking'){
	$restaurant = new Restaurant($input['id']);
	$bookings = $model->get_bookings($restaurant, $input['date']);

	//check if we have something to return
	$html = '';
	$times = array();
	if(!empty($bookings)){
		foreach($bookings as $booking){
			$user = new User($booking->user1);
			//check the sex of the user
			$booking->user1 = $user;
			$html .= '<li id="' . $booking->id . '" class="booking">'.
				 $booking->user1->age() . ' ' . ($user->sex == 0 ? 'Man' : 'Vrouw') . $booking->time .
				 '<button value="Reserveer" onClick="get_output('."'book_table',". $restaurant->id .
				",'input[time]='".$booking->time. "input[booking]='". $booking->id ."')" . 
				'">Schuif aan!</button>';
			$times[$booking->time] += 1;
		}
	}
	$html .= '<select name="time" id="new-' . $restaurant->id . '">'; 
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
	$html .= '</select><button value="Reserveer" onClick="'.
		"var params = 'input[time]='+ document.getElementById('new-".$restaurant->id."').value;".
		"params += '&input[restaurant]=" . $restaurant->id . "&input[date]=". $input['date'] . "';" .
		"get_output('book_table',". $restaurant->id .' ,params);">Reserveer</button>';
	echo $html;
}

if($request == '/ajax/book_table'){
	if($logged_in){
		$time = $input['time'];
		$date = $input['date'];
		$restaurant = new Restaurant($input['id']);
		if(isset($input['booking'])){
			$booking = new Booking($input['booking']);
			if($booking = $model->book_table($user, $restaurant, $booking->table, $time)){
				echo 'je hebt geboekt!1!!!11!11';
			}
		}
		else {
			$cur_bookings = $model->get_bookings($restaurant, $input['date'], $input['time']);
			foreach($cur_bookings as $booking){
				foreach($restaurant->tables as $table){
					if($booking->table_id != $table){
						if($booking = $model->book_table($user, $restaurant, $table, $date, time)){
							echo 'je hebt geboekt!1!!!11!11';
						}
					}
				}
			}
		}
	}
	else {
		echo 'Je moet ingelogd zijn om te kunnen reserveren...'.
		     '<a href="/account/register.php">Registreer hier</a>';
	}
}
