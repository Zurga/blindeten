<?php
//var_dump($_POST);
//echo '<br>';
include_once $root . '/model/Auth.php';

if($request == '/account/show.php'){
	if($_SESSION['logged_in']){
		$title = 'Account';
		$user = new User($_SESSION['id']);
		//$age
		if($user->owner != 0){
			$restaurant = new Restaurant($user->owner);
		}
		include $root . '/html/show.php';
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
	$attr = $_POST[input];
	var_dump($attr);
	if($model->add_account($attr)){
		include $root . '/html/index.php';
	}
	else{
		include $root . '/html/register.php';
	}
}
if ($request == '/account/logout') {
	$auth->logout();
	header("Location: http://ik35.webdb.fnwi.uva.nl");
}	

//User request login.php
if($request == '/account/login.php'){
	if($logged_in == false){
		include $root . '/html/login.php';
	}
	else {
		include $root . '/html/index.php';
	}
}

//User pressed login button
if($request == '/account/set_login'){
	if($auth->login($_POST['email'], $_POST['password'])){
		include $root . '/html/index.php';
	}
}

if($request == '/account/login.php' & $logged_in == false & empty($_POST)){
	include $root . '/html/login.php';
}
else{
	$login = new Login;
	if($logged_in =  $login->login($_POST['email'], $_POST['password'])){
		header("Location: http://ik35.webdb.fnwi.uva.nl");
	}
	else{
		include $root . '/html/login.php';
	}
}
?>