<?php

include_once 'model/Model.php';

class Controller {
	public $model;

	public function __construct(){
		$this->model = new Model;
	}

	public function invoke(){
		$root = $_SERVER['DOCUMENT_ROOT'];
		include $root . '/html/header.php';
		$restaurants = $this->model->get_restaurants();

		include $root . '/html/map.php';

		if($url== 'add_restaurant'){
			$attr = $_POST[''];
		}
	}
}
?>
