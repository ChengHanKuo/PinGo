<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$uid=$_POST["uid"];


$sql="SELECT `uid` FROM `user_profile` WHERE `uid` IN (SELECT `uid2` FROM `friend` WHERE `uid1`=$uid AND `relation`=0)";
$res=mysqli_query($link, $sql);

while($row = mysqli_fetch_assoc($res)){
	echo $row['uid']."\n";
}
echo "\t";
	$sql3="SELECT `name` FROM `user_profile` WHERE `uid` IN (SELECT `uid2` FROM `friend` WHERE `uid1`=$uid AND `relation`=0)";
	$res3=mysqli_query($link, $sql3);
	while($row3 = mysqli_fetch_assoc($res3)){
		echo $row3['name']."\n";
	}
	echo "\t";


mysqli_close($link);
?>