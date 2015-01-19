<?php
//var_dump($_POST);
//echo '<br>';
//var_dump($_SESSION);
include_once $root . '/model/Auth.php';

if($request == '/account/show.php'){
	$title = 'Account';
	//$user = new User
	//$age
	if($user->owner != 0){
		$restaurant = new Restaurant($user->owner);
	}

	include $root . '/html/show.php';
}
if($request == '/account/login.php' & empty($_POST)){
	include $root . '/html/login.php';
}
else{
	$login = new Login;
	var_dump($_POST);
	echo '<br/>';
	var_dump($login->login($_POST['email'], $_POST['password']));
//	header("Location: http://ik35.webdb.fnwi.uva.nl");
}
?>
