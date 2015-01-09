<?php

include('dblogin.php');

class Map{
	//markers is an array with restaurant associative arrays.
	var $markers = array();
	
	public function get_geo_info(){
		global $db;

		$query = 'SELECT restaurant.name, restaurant.lat, restaurant.lon,'.
			' restaurant.url, tables.id' .
			' FROM restaurant' .
			' JOIN tables on restaurant.id = tables.rest_id' .
			' WHERE tables.user2 is NULL';
		
		$result = $db->query($query);
		
		if ($result->num_rows > 0) {
			$rows = array();
			while ($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			var_dump($rows);
			//add the rows to the marker array
			$names = array();
			foreach ($rows as $row) {
				$names[] = array($row['name']);
			}
			$markers[] = array_unique($names);
		}	
			//foreach ($markers['names'] as $name) {
				//foreach ($row as $r) {
				//	if ($r['name'] == $r['name']){
	}
}
				
$map = new Map;
$map->get_geo_info();
var_dump($map);
