<?php 
$root = $_SERVER['DOCUMENT_ROOT']. '/';

include_once $root ."model/Model.php";
include_once $root ."model/User.php";
include_once $root ."model/Restaurant.php";

$user = new User(4);
$restaurant = new Restaurant(2);
$model = new Model;
$restaurant->tables=array(4,5);
$table_id=4;
var_dump($model->book_table($user,$restaurant,$table_id, '2015-02-04 18:00:00'));

?>
