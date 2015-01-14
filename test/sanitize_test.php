<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/model/dbFunctions.php';

$test1 = array('name'=>'Abba','type'=>'top');
$test2 = 'This is a test';
$test3 = array('query'=>'OR "1"');
$test4 = 'OR "1"';

var_dump(sanitize($test1));
echo '<br>';
var_dump(sanitize($test2));
echo '<br>';
var_dump(sanitize($test3));
echo '<br>';
var_dump(sanitize($test4));
?>