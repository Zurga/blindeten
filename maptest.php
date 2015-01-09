<?php
include('model/class_map.php');

$map = new Map;
$map->get_geo_info();
var_dump($map);
?>
