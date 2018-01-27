<?php
session_start();
$uid = $_SESSION['uid'];

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");
header("Content-Type:text/html; charset = utf8");


if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];
	echo $pid;
	$query3="SELECT uid1 FROM FRIEND WHERE uid2 = $uid AND relation = '2'";
	$result3=mysqli_query($link, $query3);
	while($row3=mysqli_fetch_assoc($result3))
	{
		$uid2[]=$row3['uid1'];
	}	
	for($i=0;$i<count($uid2);$i++)
	{
		$query="INSERT INTO notice(`uid1`,`uid2`,`pid`, `n_content`) VALUES ('$uid', '$uid2[$i]', '$pid', '推薦了一張照片給你')";
		$result=mysqli_query($link, $query);
	}
}
?>