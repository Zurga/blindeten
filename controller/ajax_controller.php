<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/controller/mail_controller.php';

//strip away all other controller text form url
$needle = '/account';
$pos = strpos($request, $needle);

if($pos === false){
}
else{
	$request = substr($request, strlen($needle));
}

$input = sanitize($_POST['input'], $model->db);
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

$html = '';
$times = array('18:00:00'=> 0,
			'20:00:00' => 0);
		
	//check if we have something to return
	if(!empty($bookings)){
		foreach($bookings as $booking){
			if(!isset($booking->user2->id) and $booking->user1->id != $user->id){
				$html .= '<li id="' . $booking->id . '" class="booking"><p>'.
					($booking->user1->sex == 0 ? 'Man' : 'Vrouw') . ' van '.  $booking->user1->age() .
				      	' jaar om' . substr($booking->time,0,5) . '</p><button value="Reserveer" onClick="get_output('."'book_table',". 
					$restaurant->id . ",'input[time]=".$booking->time. "&input[booking]=". 
					$booking->id ."&input[date]=" .  
					$input['date'] ."');" . '">Schuif aan!</button></li>';
			}
			$times[$booking->time] += 1;
		}
	}

	$times_count = array_sum($times);
	//check if there are disabled times
	if($times_count < count($restaurant->tables) * 2 and $times_count != 0){
		$html .= '<li><select name="time" id="new-' . $restaurant->id . '">'; 
		foreach($times as $time=>$count){
			if($count < count($restaurant->tables)){
				$html .= '<option value=' . $time . '>' . substr($time, 0, 5) . '</option>';
			}
		}
		$html .= '</select><button value="Reserveer" onClick="'.
			"var params = 'input[time]=' + document.getElementById('new-".$restaurant->id."').value;".
			"params += '&input[restaurant]=" . $restaurant->id . "&input[date]=". $input['date'] . "';" .
			"get_output('book_table',". $restaurant->id .' ,params);">Reserveer</button></li>';
		
		echo $html;
		return true;
	}
	//booking is not possible
	else if($times_count == count($restaurant->tables) * 2){
		echo $html;
		return true;
	}
	else{
		$html .= '<li><select name="time" id="new-' . $restaurant->id . '">'; 
		$html .= '<option value="18:00:00">18:00</option><option value="20:00:00">20:00</option>';
		$html .= '</select><button value="Reserveer" onClick="'.
			"var params = 'input[time]=' + document.getElementById('new-".$restaurant->id."').value;".
			"params += '&input[restaurant]=" . $restaurant->id . "&input[date]=". $input['date'] . "';" .
			"get_output('book_table',". $restaurant->id .' ,params);">Reserveer</button></li>';
		
		echo $html;
	}
}

if($request == '/ajax/book_table'){
	if($logged_in){
		$time = $input['time'];
		$date = $input['date'];
		
		//the user is booking table where there is another user
		if(isset($input['booking'])){
			$booking = new Booking($input['booking']);
			$restaurant = new Restaurant($booking->restaurant_id);
			if($model->book_table($user, $restaurant, $booking->table_id, $date, $time)){
				echo '<p class="confirm">Maak er een mooie avond van!</p>';
				send_mail($user,2);
				send_mail($booking->user1,3);
			}
		}
		else {
			$restaurant = new Restaurant($input['restaurant']);
			//check which table is available
			if($cur_bookings = $model->get_bookings($restaurant, $input['date'], $input['time'])){
				//check if all the tables have been booked
				if(count($cur_bookings) != count($restaurant->tables) * 2){
					foreach($cur_bookings as $booking){
						foreach($restaurant->tables as $table){
							if($booking->table_id != $table){
								if($booking = $model->book_table($user, $restaurant, 
									$table, $date, $time)){
									echo '<p class="confirm">Je hebt gereserveerd!</p>';
								}
							}
						}
					}
				}
				else{
					echo '<p class="error">Bij dit restaurant kan helaas niet meer gereserveerd worden</p>';
				}
			}
			//every table is available
			else {
				if($booking = $model->book_table($user, $restaurant, 
					$restaurant->tables[0], $date, $time)){
					echo '<p class="confirm">Je hebt gereserveerd!</p>';
					send_mail($user,2);
				}
			}	
		}
	}
	else {
		echo '<p class="error">Je moet ingelogd zijn om te kunnen reserveren...'.
		     '<a href="/account/login.php">Login</a> om te kunnen reserveren</p>';
	}
}
?>
