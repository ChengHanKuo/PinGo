<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$uid=$_POST["uid"];
$pid=$_POST["pid"];
$com=$_POST["commend"];
$abc="在你的照片留言";
$a=iconv("big5","utf-8",$abc);
$sql="INSERT INTO `comment` (`uid`, `pid`,`content`) VALUES ('$uid', '$pid','$com');";
$res=mysqli_query($link, $sql);

if($res)
{
	$sql3="SELECT `uid` FROM `photo` WHERE `pid`=$pid";
	$res3=mysqli_query($link,$sql3);
	while($row = mysqli_fetch_assoc($res3)){
		$uid2=$row['uid'];
		if($uid!=$uid2)
		{
		$sql2="INSERT INTO `notice` (`uid1`, `uid2`,`pid`,`n_content`) VALUES ('$uid','$uid2','$pid','$a');";
		$res2=mysqli_query($link,$sql2);
		if($res2){
			echo $uid;
		}
		}
		else
			echo $uid;
	}
}
mysqli_close($link);
?>
