<?php

header('Content-Type:text/html; charset=utf-8');



$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");





$name=$_POST["name"];



echo $name;

$sql1="INSERT INTO user(account) VALUES('$name')";

$result1=mysqli_query($link,$sql1);



mysqli_close($link);

?>