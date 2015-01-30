<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/controller/mail_controller.php';
include_once $root .'/model/User.php';

//show the user information
if($request == '/account/show.php'){
	$title = "Mijn account";
	//$age
	if($user->owner != 0){
		$restaurant = new Restaurant($user->owner);
		}
	include $root . '/html/show.php';
	}

//the user wants to edit the information
if($request == '/account/edit.php'){
	if ($logged_in == true) {
		$title = "Account wijzigen";
		include $root . '/html/edit.php';
	}
	else {
		header("Location: ". $index . "/account/login.php");
	}	
}

//change restaurant attributes
if ($request == '/account/edit_restaurant.php') {
	if ($logged_in == true and $user->owner != 0) {
		$title = "Restaurant wijzigen";
		include $root . '/html/edit_restaurant.php';
	}
	else {
		header("Location: ". $index ."/account/login.php");
	}
}

//change restaurant attributes
if ($request == '/account/save_restaurant') {
	if($user->owner != 0){
		$restaurant = new Restaurant($user->owner);
	}
	$attr = sanitize($_POST['input'],$model->db);
	if($user->change_rest($attr)) {
		$changed_restaurant = 'Het restaurant is aangepast.';
		include $root ."/html/show.php";
	}
}

//Save user data
if($request == '/account/save_data'){
	if($user->owner != 0){
		$restaurant = new Restaurant($user->owner);
		}
	$attr = sanitize($_POST['input'],$model->db);
	$bday= $attr['year'].'-'.$attr['month'].'-'.$attr['day'];
	$attr['birthdate'] = $bday;
	if($user->change_attr($attr)){
		$changed_attributes = 'Je hebt je gegevens aangepast';
		include $root . '/html/show.php';
	}
}
//User request register.php
if($request == '/account/register.php') {
	$title = "Registeren";
	include $root . '/html/register.php';
}

//User pressed register button
if($request == '/account/register'){
	$attr = sanitize($_POST['input'],$model->db);
	$bday = $attr['year'].'-'.$attr['month'].'-'.$attr['day'];
	$attr['birthdate'] = $bday;
	if($user = new User($model->add_account($attr))){
		//mail_id 1 is welcome mail
		send_mail($user,1);
		if($auth->login($attr['email'], $attr['password'])){
			header("Location: ". $index);
		}
		else{
			$last_input= $attr;
			$register_error = 'De ingevulde gegevens zijn niet compleet of onjuist';
			include $root . '/html/register.php';
		}
	}
}

//logout
if ($request == '/account/logout') {
	$auth->logout();
	header("Location: ". $index);
}	

//User request login.php
if($request == '/account/login.php'){
	$title = "Login";
	if($logged_in == false){
		include $root . '/html/login.php';
	}
	else {
		header("Location: ". $index);
	}
}

//User pressed login button
if($request == '/account/set_login'){
	if($auth->login(sanitize($_POST['email'],$model->db), sanitize($_POST['password'],$model->db))){
		$welcome = "Je bent ingelogd!";
		header("Location: ". $index);
	}
	else{
		$error = 'Deze combinatie is bij ons niet bekend';
		include $root . '/html/login.php';
	}
}

//User pressed delete account
if($request == '/account/delete_account'){
	$auth->logout();
	$user->delete_account($user->email);
	header("Location: ". $index);
}
//Change password
if($request == '/account/change_password.php') {
	include $root . '/html/change_password.php';
}
//Save new password
if($request == '/account/save_new_password'){
	if($user->owner != 0){
		$restaurant = new Restaurant($user->owner);
		}
	if($auth->login($user->email,sanitize($_POST['cur_password'],$model->db))) {
		$new_e_password = encrypt($user->email,sanitize($_POST['password']),$model->db);
		$model->change_password($user->id, $new_e_password);
		$changed_password = 'Je wachtwoord is aangepast.';
		include $root . '/html/show.php';
	}
	else {
		$password_error = "Het huidige wachtwoord is niet correct.";
		include $root . '/html/change_password.php';
	}
}

//User forgot password
if($request == '/account/forgot_password.php') {
	include $root . '/html/forgot_password.php';
}

if($request == '/account/forgot_password'){
	$email = sanitize($_POST['email'],$model->db);
	$model->forgot_password($email);
	header("Location: ". $index);
}

if($request == '/account/mybookings.php') {
	$bookings = $model->get_bookings($user);
	include $root . '/html/mybookings.php';
}

//User request editbooking.php
if($request == '/account/edit_booking'){
	$booking = new Booking($_POST['booking_id']);
	$restaurant = new Restaurant($booking->restaurant_id);
	include $root . '/html/editbooking.php';
}
//Save changed booking
if($request == '/account/save_editbooking'){
	$booking_id = sanitize($_POST['old_booking'],$model->db);
	$user->cancel_booking($booking_id);
	$message = "Je hebt je reservering gewijzigd";
	send_mail($user,8);
	$bookings = $model->get_bookings($user);
	include $root . '/html/mybookings.php';
}

//Delete booking
if($request == '/account/delete_booking') {
	$bookings = $model->get_bookings($user);
	$booking_id = sanitize($_POST['booking_id'],$model->db);
	$booking = new Booking($booking_id);
	//mail_id 6 is cancelling booking
	send_mail($user,6,$booking->date);
	$other_user= new User($booking->other_user($user));
	send_mail($other_user,4,$booking->date);
	
	if($user->cancel_booking($booking_id)){
		$message = "Reservering succesvol verwijderd.";
		include $root . "/html/mybookings.php";
		//header("Location: ". $index .'/account/mybookings.php');
	}
}
?>
