<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$uid=$_POST["uid"];
$uid2=$_POST["uid2"];

$sql="DELETE FROM `friend` WHERE `uid1`=$uid AND `uid2`=$uid2";
$res=mysqli_query($link, $sql);
if($res)
{
	echo $uid;
}
mysqli_close($link);
?>