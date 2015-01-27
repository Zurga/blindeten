<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/controller/mail_controller.php';
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

//the user wants to edit the iformation
if($request == '/account/edit.php'){
	if ($logged_in == true) {
		$title = "Account wijzigen";
		include $root . '/html/edit.php';
	}
	else {
		header("Location: ". $index . "/account/login.php");
	}	
}

if ($request == '/account/edit_restaurant.php') {
	if ($logged_in == true and $user->owner != 0) {
		$title = "Restaurant wijzigen";
		include $root . '/html/edit_restaurant.php';
	}
	else {
		header("Location: ". $index ."/account/login.php");
	}
}

//Save user data
if($request == '/account/save_data'){
	$attr = sanitize($_POST['input'],$model->db);
	$bday= $attr['year'].'-'.$attr['month'].'-'.$attr['day'];
	$attr['birthdate'] = $bday;
	if($user->change_attr($attr)){
		header("Location: ". $index . "/account/show.php");
	}
}
//User request register.php
if($request == '/account/register.php') {
	$title = "Registeren";
	include $root . '/html/register.php';
}

//User pressed register button
if($request == '/account/register'){
	$model = new Model;
	$attr = sanitize($_POST['input'],$model->db);
	$bday= $attr['year'].'-'.$attr['month'].'-'.$attr['day'];
	$attr['birthdate'] = $bday;
	$email= $attr['email'];
	if($user = new User($model->add_account($attr))){
			//mail_id 1 is welcome mail
			send_mail($user,1);
			if($auth->login($attr['email'], $attr['password'])){
				header("Location: ". $index);
			}
			else{
				$last_input= $_POST['input'];
				$register_error = 'De ingevulde gegevens zijn niet compleet of onjuist';
				include $root . '/html/register.php';
			}
		}	
}
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
	}
}

//User pressed login button
if($request == '/account/set_login'){
	if($auth->login(sanitize($_POST['email'],$model->db), sanitize($_POST['password'],$model->db))){
		$welcome = "Je bent ingelogd!";
		$logged_in = true;
		include $root .'/controller/index_controller.php';
	}
	else{
		$error = 'Deze combinatie is bij ons niet bekend';
		include $root . '/html/login.php';
	}
}

//User pressed delete account
if($request == '/account/delete_account'){
	$auth->logout();
	$user->delete_account($user->id);
	header("Location: ". $index);
}
//Change password
if($request == '/account/change_password.php') {
	include $root . '/html/change_password.php';
}
//Save new password
if($request == '/account/save_new_password'){
	$new_e_password = encrypt($user->email,sanitize($_POST['new_password']),$model->db);
	$model->change_password($user->id, $new_e_password);
	header("Location: ". $index);
}

//User forgot password
if($request == '/account/forgot_password.php') {
	include $root . '/html/forgot_password.php';
}

if($request == '/account/forgot_password'){
	$email = sanitize($_POST['email'],$model->db);
	$model->forgot_password($email);
	//header("Location: ". $index);
}

if($request == '/account/mijnreserveringen.php') {
	$bookings = $model->get_bookings($user);
	if(!empty($bookings)){

		foreach($bookings as $booking){
			$booking->user1 = new User($booking->user1);
			$booking->user2 = new User($booking->user2);
		}
	}
	include $root . '/html/mijnreserveringen.php';
}

if($request == '/account/delete_booking') {
	$booking_id = sanitize($_POST['booking_id'],$model->db);
	if ($user->cancel_booking($booking_id)) {
		//mail_id 6 is cancelling booking
		send_mail($user,6,$booking->date);
		header("Location: ". $index .'/account/mijnreserveringen.php');
	}
}
?>