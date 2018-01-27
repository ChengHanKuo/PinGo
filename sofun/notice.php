<?php
session_start();
$uid = $_SESSION['uid'];

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");

$query = "SELECT n_content FROM notice WHERE uid2 = '$uid' ORDER BY time desc";
$result = mysqli_query($link, $query);


//while($row=mysqli_fetch_assoc($result))
//	{
//	$content = $row['n_content'];
//	echo $content;
//	echo "</br>";
//	}
 

 function refresh_content()
 {
  var div = document.all()
 }

	
	
	
?>
