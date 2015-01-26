<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/controller/mail_controller.php';

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

//Save user data
if($request == '/account/save_data'){
	$attr = $_POST['input'];
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
	$attr = $_POST['input'];
	$bday= $attr['year'].'-'.$attr['month'].'-'.$attr['day'];
	$attr['birthdate'] = $bday;
	if($model->add_account($attr)){
		//mail_id 1 is welcome mail
		send_mail($user,1);
		if($auth->login($attr['email'], $attr['password'])){
				header("Location: ". $index);
		}
		else{
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
	if($auth->login($_POST['email'], $_POST['password'])){
		//include $root . '/html/index.php';
		header("Location: ". $index);
	}
	else{
		header("Location: ". $index . "/account/login.php");
	}
}

//User pressed delete account
if($request == '/account/delete_account'){
	var_dump($user->id);
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
	$new_e_password = encrypt($user->email,$_POST['new_password']);
	$model->change_password($user->id, $new_e_password);
	header("Location: ". $index);
}

//User forgot password
if($request == '/account/forgot_password.php') {
	include $root . '/html/forgot_password.php';
}

if($request == '/account/forgot_password'){
	$email = $_POST['email'];
	$model->forgot_password($email);
	//header("Location: ". $index);
}

if($request == '/account/mijnreserveringen.php') {
	$bookings = $model->get_bookings($user);
	foreach($bookings as $booking){
		$booking->user1 = new User($booking->user1);
		$booking->user2 = new User($booking->user2);
	}

	include $root . '/html/mijnreserveringen.php';
}
?>
