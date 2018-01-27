<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$uid=$_POST["uid"];


$sql="SELECT DISTINCT `pid` FROM `collect` WHERE `uid`=$uid";
$res=mysqli_query($link, $sql);

while($row = mysqli_fetch_assoc($res)){
	echo $row['pid']."\t";
	}
mysqli_close($link);
?>
