<?php
session_start();
$uid = $_SESSION['uid'];

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body  bgcolor="#fff2df">
<?php
$pid=$_GET['pid'];
if(isset($_POST['content']))
{
	$con=$_POST['content'];
	$query_p="SELECT uid FROM photo WHERE pid = $pid";
	$result_p = mysqli_query($link, $query_p);
	while($row_p=mysqli_fetch_assoc($result_p))
		$uid2=$row_p['uid'];
	if($uid!=$uid2)
	{
		$query_n="INSERT INTO notice (`uid1`, `uid2`, `pid`, `n_content`) VALUES ('$uid', '$uid2', '$pid', '在你的照片留言')";
		$result_n = mysqli_query($link, $query_n);
	}
	$query3 = "INSERT INTO comment (`pid`, `uid`, `content`) VALUES ('$pid', '$uid', '$con')";
	$result3 = mysqli_query($link, $query3);
	if($result3)
	{
		$query = "SELECT content, uid FROM comment WHERE pid = $pid ORDER BY time";
		$result = mysqli_query($link, $query);
		while($row=mysqli_fetch_assoc($result))
		{
			$newid=$row['uid'];
			$query2 = "SELECT `account` FROM `user` WHERE `uid`=$newid";
			$result2 = mysqli_query($link, $query2);
			while($row2=mysqli_fetch_assoc($result2))
			{
				echo $row2['account'].":".$row['content']."<br/>";
			}
		}	
	}
}
else{		
		$query = "SELECT content, uid FROM comment WHERE pid = $pid ORDER BY time";
		$result = mysqli_query($link, $query);
		while($row=mysqli_fetch_assoc($result))
		{
			$newid=$row['uid'];
			$query2 = "SELECT account FROM user WHERE uid =$newid";
			$result2 = mysqli_query($link, $query2);
			while($row2=mysqli_fetch_assoc($result2))
			{
				echo $row2['account']."：".$row['content']."<br/>";
			}
		}		
}
?>
</body>
<html>