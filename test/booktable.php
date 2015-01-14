<?php 
$root = $_SERVER['DOCUMENT_ROOT']. '/';

include_once $root ."model/Model.php";
include_once $root ."model/User.php";
include_once $root ."model/Restaurant.php";

$user = new User(4);
$restaurant = new Restaurant;
$model = new Model;
$restaurant->id=2;
$table_id=20;
echo $model->book_table($user,$restaurant,$table_id, '2015-02-04 18:00:00');

?>
