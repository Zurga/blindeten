<?php
include_once "model/Model.php";
include_once "model/Auth.php";

$model = new Model;
$auth = new Auth;
$attr = array('name'=>'Jaap Testpersoon',
'email'=>'JT3@hotmail.com',
'sex'=>'0',
'birthdate'=>'1995-08-22',
'city'=>'Urk',
'password'=>'blabla');
$user = $model->add_account($attr);
echo $auth->Login($user->email, $user->password);
?>
