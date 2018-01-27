<?php
session_start();
header("Content-Type:text/html; charset = utf-8");

$uid = $_SESSION['uid'];
$pid = $_GET['pid'];
$like = $_GET['like'];

echo $pid;
echo $like;

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");

$query_uid2 = "SELECT uid FROM photo WHERE pid = '$pid'";
$result_uid2 = mysqli_query($link, $query_uid2);
while($row_uid2=mysqli_fetch_assoc($result_uid2))
	$uid2 = $row_uid2['uid'];

$query_account = "SELECT account FROM user WHERE uid = $uid";
$result_account = mysqli_query($link, $query_account);
while($row_account=mysqli_fetch_assoc($result_account))
	$account = $row_account['account'];
if($like=='1')
{
	$query = "INSERT INTO `like`(`uid`, `pid`, `time`) VALUES ('$uid','$pid',CURRENT_TIMESTAMP)";
	$result = mysqli_query($link, $query);
	if($uid!=$uid2)
	{
		$query2 = "INSERT INTO `notice`(`uid1`, `uid2`, `pid`, `time`, `n_content`, `n_read`) VALUES ('$uid','$uid2','$pid',CURRENT_TIMESTAMP,'{$account}按了您一張照片讚!','0')";
		$result2 = mysqli_query($link, $query2);
	}
}
else
{
	$query = "DELETE FROM `like` WHERE uid=$uid AND pid=$pid";
	$result = mysqli_query($link, $query);
	$query = "DELETE FROM `notice` WHERE uid1=$uid AND uid2 = $uid2 AND pid=$pid";
	$result = mysqli_query($link, $query);
}
?>