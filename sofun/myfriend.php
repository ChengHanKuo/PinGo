<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$uid=$_POST["uid"];


$sql="SELECT `uid`,`account` FROM `user` WHERE `uid` IN (SELECT `uid2` FROM `friend` WHERE `uid1`=$uid AND `relation`=2) ";
$res=mysqli_query($link, $sql);

while($row = mysqli_fetch_assoc($res)){
		echo $row['uid']."\n".$row['account']."\t";
	}

mysqli_close($link);
?>