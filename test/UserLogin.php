<?php
include_once "model/Model.php";

$model = new Model;
$date = date('Y-m-d', '1995-09-30');
$attr = array('name'=>'Rens Mosterd',
'email'=>'rens.mosterd4@hotmail.com',
'sex'=>'0',
'birthdate'=>'1993-05-07',
'city'=>'Hoorn',
'password'=>'blabla');
$user = $model->add_account($attr);





?>
