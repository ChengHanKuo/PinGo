<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$word=$_POST["word"];
$seg=$_POST["seg"];
if($seg=='0'){
$sql="SELECT `uid` FROM `user` WHERE `account` LIKE '%{$word}%'";
$res=mysqli_query($link, $sql);

while($row = mysqli_fetch_assoc($res)){
	$u=$row['uid'];
	$sql2="SELECT `account` FROM `user` WHERE `uid`=$u";
	$res2=mysqli_query($link, $sql2);
	while($row2 = mysqli_fetch_assoc($res2)){
		echo $row['uid']."\n".$row2['account']."\t";
	}
}
}
else{

$sql2="SELECT `pid` FROM `photo` WHERE `description` LIKE '%{$word}%'";
$res2=mysqli_query($link, $sql2);

while($row2 = mysqli_fetch_assoc($res2)){
	echo $row2['pid']."\t";
}
}
mysqli_close($link);
?>
