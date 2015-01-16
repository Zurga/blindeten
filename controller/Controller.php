<?php

include_once 'model/Model.php';

class Controller {
	public $model;

	public function __construct(){
		$this->model = new Model;
	}

	public function invoke(){
<<<<<<< HEAD
		if($_SERVER['REQUEST_URI'])
=======
		$urlRoutes = array(
<<<<<<< HEAD
			'/' => 'index',
			'/account/'=> 'account');
>>>>>>> a2a3ec125bd043813ed0f1230f74ccc6f54c0aa2
=======
			'/\/$/' => 'index',
			'/\/account\//'=> 'account',
			'/\/admin\//' => 'admin');

>>>>>>> f4ce71375e5e4c4d7d814abfd987224973b419dc
		$root = $_SERVER['DOCUMENT_ROOT'];
		$request = $_SERVER['REQUEST_URI'];
		var_dump($request);
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
