<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$pid=$_POST["pid"];
$sql2="SELECT count(*) FROM `ratings` WHERE `pid`=$pid";
$res2=mysqli_query($link, $sql2);
while($row2 = mysqli_fetch_assoc($res2)){
	$sql="SELECT `uid`,`time`,`description`,`type`,`latitude`,`altitude` FROM `photo` WHERE `pid`=$pid";
	$res=mysqli_query($link, $sql);

	while($row = mysqli_fetch_assoc($res)){
	$u= $row['uid'];
	$sql0="SELECT `account` FROM `user` WHERE `uid`=$u";
	$res0=mysqli_query($link, $sql0);

	while($row0 = mysqli_fetch_assoc($res0)){
		echo $row['uid']."\t".$row['time']."\t".$row['description']."\t".$row['type']."\t".$row['latitude']."\t".$row['altitude']."\t".$row2['count(*)']."\t".$row0['account']."\t";
	}
	}
}
mysqli_close($link);
?>
