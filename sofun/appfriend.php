<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$uid=$_POST["uid"];
$sql2="SELECT `uid2` FROM `friend` WHERE `uid1`=$uid AND `relation`=2";
$res2=mysqli_query($link, $sql2);
while($row2 = mysqli_fetch_assoc($res2)){
	echo $row2['uid2']."\t";
}
mysqli_close($link);
?>
