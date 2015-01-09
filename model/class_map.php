<?php

include('dblogin.php');

class Map{
	//markers is an array with restaurant associative arrays.
	var $markers = array();
	
	public function get_geo_info(){
		global $db;

		$query = 'SELECT restaurant.name, restaurant.lat, restaurant.lon,'.
			' restaurant.url, tables.id' .
			' JOIN tables on restaurant.id = tables.rest_id' .
			' WHERE tables.user2 is NULL';
		
		$result = $db->query($query);
		var_dump($result);
		
		if ($result->num_row > 0) {
			$row = $result->fetch_assoc();
			//add the rows to the marker array
			$names = array();
			foreach ($row as $r) {
				$names[] = array($r['name']);
			}
			array_push(array_unique($names));
		}	
			//foreach ($markers['names'] as $name) {
				//foreach ($row as $r) {
				//	if ($r['name'] == $r['name']){
	}
}
				
$map = new Map;
$map->get_geo_info();
var_dump($map);
