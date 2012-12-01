<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database_name = 'mklass2012';
$char_set = 'UTF8';

$last_error = array();
if(!mysql_connect($server, $username, $password)){// подклюение к серверу MySQL
  $last_error[] = mysql_error();
}
if(!mysql_select_db($database_name)){
  $last_error[] = mysql_error();
}
mysql_query("SET NAMES {$char_set}");

?>
