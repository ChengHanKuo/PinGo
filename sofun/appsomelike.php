<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$pid=$_POST["pid"];

$sql="SELECT count(*) FROM `ratings` WHERE `pid`=$pid;";
$res=mysqli_query($link, $sql);

while($row = mysqli_fetch_assoc($res)){
	echo $row['count(*)'];
	}
mysqli_close($link);
?>
