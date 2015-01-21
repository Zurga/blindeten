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
	public $zipcode;
	public $city;
	public $url;
	public $tables;
	

	function __construct($id){
		global $db;
		$this->db = $db;

		$query = "SELECT restaurant.name, restaurant.lat, restaurant.lon," .
			" restaurant.street, restaurant.zipcode ,restaurant.city," .
		        " restaurant.url" .
			" FROM restaurant WHERE id = " . $id;

		if($row = get_rows($this->db->query($query))){
			foreach($row as $key => $val){
				$this->$key = $val; 
			}
		}
	}

	function get_bookings(){
		$query = "SELECT id FROM bookings WHERE time =";
	}

}
?>
