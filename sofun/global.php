<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");





$uid=$_POST["uid"];
$myid=$_POST["myid"];
if($uid=="***a"||$uid=="***f"||$uid=="***m")
{
	if($uid=="***a"){
		$sql="SELECT `pid` FROM `photo` order by `pid` desc LIMIT 50";
		$res=mysqli_query($link, $sql);
		$sql2="SELECT `altitude` FROM `photo` order by `pid` desc LIMIT 50";
		$res2=mysqli_query($link, $sql2);
		$sql3="SELECT `latitude` FROM `photo` order by `pid` desc LIMIT 50";
		$res3=mysqli_query($link, $sql3);
	}
	if($uid=="***f"){
		$sql="SELECT `pid` FROM `photo` WHERE `uid` IN (SELECT `uid2`FROM `friend` WHERE `uid1`=$myid AND (`relation`=0 OR 2)) order by `pid` desc LIMIT 50";
		$res=mysqli_query($link, $sql);
		$sql2="SELECT `altitude` FROM `photo` WHERE `uid` IN (SELECT `uid2`FROM `friend` WHERE `uid1`=$myid AND (`relation`=0 OR 2)) order by `pid` desc LIMIT 50";
		$res2=mysqli_query($link, $sql2);
		$sql3="SELECT `latitude` FROM `photo` WHERE `uid` IN (SELECT `uid2`FROM `friend` WHERE `uid1`=$myid AND (`relation`=0 OR 2)) order by `pid` desc LIMIT 50";
		$res3=mysqli_query($link, $sql3);
	}
	if($uid=="***m"){
		$sql="SELECT `pid` FROM `photo` WHERE `uid`=$myid order by `pid` desc LIMIT 50";
		$res=mysqli_query($link, $sql);
		$sql2="SELECT `altitude` FROM `photo` WHERE `uid`=$myid order by `pid` desc LIMIT 50";
		$res2=mysqli_query($link, $sql2);
		$sql3="SELECT `latitude` FROM `photo` WHERE `uid`=$myid order by `pid` desc LIMIT 50";
		$res3=mysqli_query($link, $sql3);
	}
}
else
{
$sql="SELECT `pid` FROM `photo` WHERE `uid`=$uid order by `pid` desc LIMIT 50";
$res=mysqli_query($link, $sql);
$sql2="SELECT `altitude` FROM `photo` WHERE `uid`=$uid order by `pid` desc LIMIT 50";
$res2=mysqli_query($link, $sql2);
$sql3="SELECT `latitude` FROM `photo` WHERE `uid`=$uid order by `pid` desc LIMIT 50";
$res3=mysqli_query($link, $sql3);
}
while($row = mysqli_fetch_assoc($res)){
			echo $row['pid']."\t";
	}
echo "\n";
while($row2 = mysqli_fetch_assoc($res2)){
			echo $row2['altitude']."\t";
	}			
echo "\n";
while($row3 = mysqli_fetch_assoc($res3)){
			echo $row3['latitude']."\t";
	}
			


mysqli_close($link);
?>