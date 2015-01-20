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

if($request == '/account/login.php' & empty($_POST) & $_SESSION['logged_in'] == false){
	include $root . '/html/login.php';
}
else{
	$login = new Login;
	echo '<br/>';
	if($login->login($_POST['email'], $_POST['password'])){
		header("Location: http://ik35.webdb.fnwi.uva.nl");
	}
	else{
		include $root . '/html/login.php';
	}
}
?>
