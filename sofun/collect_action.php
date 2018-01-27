<?php
session_start();
$uid = $_SESSION['uid'];

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");

if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];
	$query2="SELECT pid FROM collect WHERE pid =$pid";
	$result2=mysqli_query($link, $query2);
	while($row2=mysqli_fetch_assoc($result2))
		$pid_check[]=$row2['pid'];	
	if (isset($pid_check))
	{}
	else
	{
	$query="INSERT INTO collect(`uid`,`bid`,`pid`) VALUES ('$uid', '100000000', '$pid')";
	$result=mysqli_query($link, $query);
	}
}
?>