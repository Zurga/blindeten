<?php
include_once "model/Model.php";
include_once "model/Auth.php";

$model = new Model;
$auth = new Login;
$attr = array('name'=>'Jaap Testpersoon',
'email'=>'JT4@hotmail.com',
'sex'=>'0',
'birthdate'=>'1995-08-22',
'city'=>'Urk',
'password'=>'blabla');
$user = new User($model->add_account($attr));

echo $auth->Login($user->email, $user->password);
?>
