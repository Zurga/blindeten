<?php

include_once 'model/Model.php';
include_once 'model/Auth.php';
include_once 'model/User.php';
include_once 'model/Restaurant.php';

class Controller {
	public $model;
	public $index;

	public function invoke(){
		//set variables for use in other controllers
		$model = new Model;
		$auth = new Auth;
		$logged_in = $auth->check_login();
		$index = 'http://' . $_SERVER['SERVER_NAME'];
		$root = $_SERVER['DOCUMENT_ROOT'];
		$request = $_SERVER['REQUEST_URI'];

		//get user info if logged in
		if($logged_in){
			$user = new User($_SESSION['id']);
		}

		$urlRoutes = array(
			'/\/$/' => 'index',
			'/\/account\/ajax\//' => 'ajax',
			'/\/account\/[^ajax]/'=> 'account',
			'/\/admin\//' => 'admin',
			'/\/ajax\//' => 'ajax',
			'/\/text\//' => 'text'
			);

		foreach($urlRoutes as $route=>$controller_name){
			if(preg_match($route, $request)){
				echo $controller_name;
				$controller = $controller_name;
				
			}
		}
		
		if (!empty($controller)){
			require $root . '/controller/' . $controller. '_controller.php';
		}
		else{
			echo 'page not found';
		}	
	}
}
?>
