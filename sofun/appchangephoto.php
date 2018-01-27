<?php
$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");


$uid=$_POST['uid'];

mysqli_close($link);

$target_path="head/";
$target_path = $target_path.$uid.$_FILES['userfile']['name']; 
 
if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path))  
{ 
	echo $uid;
} 


?> 