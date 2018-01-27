<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$uid=$_POST["uid"];
$pid=$_POST["pid"];

$sql="DELETE FROM `ratings` WHERE `uid`=$uid AND `pid`=$pid;";
$res=mysqli_query($link, $sql);

if($res){
	echo $uid;
	}
mysqli_close($link);
?>
