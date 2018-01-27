<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$uid=$_POST["uid"];
$uid2=$_POST["uid2"];
$abc="¶}©l°lÂÜ§A";
$a=iconv("big5","utf-8",$abc);
$sql="INSERT INTO `friend` (`uid1`, `uid2`, `relation`) VALUES ($uid, $uid2, '0');";
if(mysqli_query($link,$sql))
{
	$sql2="INSERT INTO `notice` (`uid1`, `uid2`,`n_content`) VALUES ('$uid','$uid2','$a');";
	$res2=mysqli_query($link,$sql2);
	if($res2){
		echo $uid."a";
	}
}
mysqli_close($link);
?>