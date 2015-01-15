<?php

include_once 'dblogin.php';
include_once 'dbFunctions.php';

class Restaurant{
	public $id;
	public $name;
	public $lat;
	public $lon;
	public $street;
	public $number;
	public $city;
	public $url;
	public $tables;

	function __construct($id){
		global $db;
		$this->db = $db;

		$query = "SELECT restaurant.name, restaurant.lat, restaurant.lon," .
			" restaurant.street, restaurant.city, restaurant.url" .
			" FROM ;

		if($row = get_rows($this->db->query($query))){
		}

	}
}
?>
