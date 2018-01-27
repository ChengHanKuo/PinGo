<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$uid=$_POST["uid"];
$pid=$_POST["pid"];
$fdid=$_POST["fdid"];
$abc="推薦了一張照片給你";
$a=iconv("big5","utf-8",$abc);



		$sql2="INSERT INTO `notice` (`uid1`, `uid2`,`pid`,`n_content`) VALUES ('$uid','$fdid','$pid','$a');";
		$res2=mysqli_query($link,$sql2);
		if($res2){
			echo $uid;
		}


mysqli_close($link);
?>
