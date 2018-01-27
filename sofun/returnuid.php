<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");





$name=$_POST["name"];


$sql="SELECT  `uid` FROM `user` WHERE `account`='$name'";
$res=mysqli_query($link, $sql);


while($row = mysqli_fetch_assoc($res)){
			echo "{$row['uid']}";
	}


mysqli_close($link);
?>