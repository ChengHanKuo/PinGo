<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$pid=$_POST["pid"];


$sql="SELECT `uid`,`time`,`content` FROM `comment` WHERE `pid`=$pid ORDER BY `time`";
$res=mysqli_query($link, $sql);

while($row = mysqli_fetch_assoc($res)){
	$u= $row['uid'];
	$sql2="SELECT `account` FROM `user` WHERE `uid`=$u";
	$res2=mysqli_query($link, $sql2);

	while($row2 = mysqli_fetch_assoc($res2)){
	echo $row['uid']."\t".$row['time']."\t".$row['content']."\t".$row2['account']."\t";
	echo "\n";
	}
}
mysqli_close($link);
?>
