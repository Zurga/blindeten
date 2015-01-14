<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include $root . '/model/dbFunctions.php';

$test1 = array('name'=>'Abba','type'=>'top');
$test2 = 'This is a test';
$test3 = array('query'=>'OR "1"');
$test4 = 'OR "1"';

sanitize($test1);
sanitize($test2);
sanitize($test3);
sanitize($test4);
?>