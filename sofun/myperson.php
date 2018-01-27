<?php
$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$uid1=$_POST["uid"];
$uid2=$_POST["sendid"];

$sql0="SELECT `account` FROM `user` WHERE `uid`='$uid2'";
$res0=mysqli_query($link, $sql0);
while($row0 = mysqli_fetch_assoc($res0)){

$sql="SELECT `name`,`sex`,`birthday`,`email` FROM `user_profile` WHERE `uid`='$uid2'";
$res=mysqli_query($link, $sql);

while($row = mysqli_fetch_assoc($res)){
			echo $row['name']."\n".$row['sex']."\n".$row['birthday']."\n".$row['email']."\n".$row0['account']."\n";
}
}
if($uid1)
{
	$sql2="SELECT `relation` FROM `friend` WHERE `uid1`='$uid1' AND `uid2`='$uid2'";
	$res2=mysqli_query($link,$sql2);
	while($row2=mysqli_fetch_assoc($res2))
	{
		$relation=$row2['relation'];
	}
	$sql3="SELECT `relation` FROM `friend` WHERE `uid1`='$uid2' AND `uid2`='$uid1'";
	$res3=mysqli_query($link,$sql3);
	while($row3=mysqli_fetch_assoc($res3))
	{
		if($row3['relation']==1)
			$relation="3";
	}
	echo $relation."\n";
}
mysqli_close($link);
?>