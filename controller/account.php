<?php
//var_dump($_POST);
//echo '<br>';
$root = $_SERVER['DOCUMENT_ROOT'];
include_once $root . '/model/Auth.php';
include $root . '/controller/mail.php';
include_once $root . '/model/dbFunctions.php';


//show the user information
if($request == '/account/show.php'){
	//$age
	if($user->owner != 0){
		$restaurant = new Restaurant($user->owner);
		}
	include $root . '/html/show.php';
	}

//the user wants to edit the iformation
if($request == '/account/edit.php'){
	include $root . '/html/edit.php';
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
	include $root . '/html/register.php';
}

//User pressed register button
if($request == '/account/register'){
/*
	$attr = array(
		"name" => $_POST['name'],
		"email"=> $_POST['email'],
		"birthdate" => $_POST['birthdate'],
		"sex" => $_POST['sex'],
		"password" => $_POST['password'],
		"city" => $_POST['city']
		);*/
	$model = new Model;
	$attr = $_POST['input'];
	$bday= $attr['year'].'-'.$attr['month'].'-'.$attr['day'];
	$attr['birthdate'] = $bday;
	var_dump($attr);
	if($model->add_account($attr)){
		header("Location: ". $index);
	}
	else{
		include $root . '/html/register.php';
	}
}
if ($request == '/account/logout') {
	$auth->logout();
	header("Location: ". $index);
}	

//User request login.php
if($request == '/account/login.php'){
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
	header("Location: ". $index);
}

//User forgot password
if($request == '/account/forgot_password.php') {
	include $root . '/html/forgot_password.php';
}

if($request == '/account/forgot_password'){
	$email = $_POST['email'];
	$query = "SELECT id FROM user WHERE email=". $email;
	$user = new User($db->query($query);
	send_mail($user,5);
	$new_passw = encrypt($user,$new_passw);
	$newpquery = "UPDATE user SET password= ".$new_passw." WHERE id= ".$user->id;
}
?>
