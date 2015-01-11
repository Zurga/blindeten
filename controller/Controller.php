<?php

include_once('../model/class_map.php');

class Controller {
	public $model;

	public function __construct(){
		$this->model = new Model();
	}

	public function invoke(){
		$restaurants = $this->model->get_restaurants();
		include 'view/map.php';
	}
}
?>
