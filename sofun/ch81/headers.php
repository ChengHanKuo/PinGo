<?php

//CONNECTS TO YOUR DATABASE (MODIFY THESE TO YOUR SETTINGS)
$c = mysql_connect("server", "username", "password");
$db = mysql_select_db("database", $c);

$table = 'ratings';
$con = 'content';

?>