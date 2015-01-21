<?php

include_once 'model/Model.php';
include_once 'model/Auth.php';
include_once 'model/User.php';

class Controller {
	public $model;
	public $index;

	public function __construct(){
		$this->model = new Model;
	}

	public function invoke(){
		//set variables for use in other controllers
		$auth = new Auth;
		$logged_in = $auth->check_login();
		$index = 'http://' . $_SERVER['SERVER_NAME'];

		if($logged_in){
			$user = new User($_SESSION['id']);
		}

		$urlRoutes = array(
			'/\/$/' => 'index',
			'/\/account\//'=> 'account',
			'/\/admin\//' => 'admin',
			'/\/about\//' => 'about',
			'/\/ajax\//' => 'ajax'
			);

		$root = $_SERVER['DOCUMENT_ROOT'];
		$request = $_SERVER['REQUEST_URI'];
//		var_dump($request);
		foreach($urlRoutes as $route=>$controller_name){
			if(preg_match($route, $request)){
				$controller = $controller_name;
			}
		}
		
		if (!empty($controller)){
			require $root . '/controller/' . $controller. '.php';
		}
		else{
			echo 'page not found';
		}	
	}
}
?>
