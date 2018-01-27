<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$uid=$_POST["uid"];
$uid2=$_POST["uid2"];
$abc="已接受你的交友邀請";
$a=iconv("big5","utf-8",$abc);
$sql="INSERT INTO `friend` (`uid1`, `uid2`, `relation`) VALUES ($uid, $uid2, '2');";
mysqli_query($link, $sql);

$sql2="UPDATE `friend` SET `relation` =  '2' WHERE `uid1` =$uid2 AND `uid2` =$uid ;";
if(mysqli_query($link,$sql2))
{
	$sql2="INSERT INTO `notice` (`uid1`, `uid2`,`n_content`) VALUES ('$uid','$uid2','$a');";
	$res2=mysqli_query($link,$sql2);
	if($res2){
		echo $uid."b";
	}
}
mysqli_close($link);
?>