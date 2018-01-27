<?php
session_start();
$uid = $_SESSION['uid'];
$account = $_GET['account'];
$rela = $_GET['rela'];

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,'SET CHARACTER SET utf8');
mysqli_query($link,"'SET collation_connection ='utf8_general_ci'");
header("Content-Type:text/html; charset = utf8");

//NULL=no relation; 0=follow; 1=ask to be friend 2=friend
$query2 = "SELECT relation FROM friend WHERE uid1 = $uid AND uid2 IN (SELECT uid FROM user WHERE account = '$account')";
$result2 = mysqli_query($link, $query2);
if($row2=mysqli_fetch_assoc($result2))
	$relation =$row2['relation'];
else
	$relation = $row2['relation'];
$query3 = "SELECT uid FROM user WHERE account = '$account'";
$result3 = mysqli_query($link, $query3);
while($row3=mysqli_fetch_assoc($result3))
	$uid2 = $row3['uid'];
	
switch ($relation)
{
	case "":
	{
		if($rela==0)
		{
			$query = "INSERT INTO friend (`uid1`, `uid2`, `relation`) VALUES ('$uid', '$uid2', '1')";
			$result = mysqli_query($link, $query);
			$abc="邀請你成為好友";
			$a=iconv("big5","utf-8",$abc);
			$query_n="INSERT INTO notice (`uid1`, `uid2`, `n_content`) VALUES ('$uid', '$uid2', '邀請你成為好友')";
			$result_n = mysqli_query($link, $query_n);	
			if($result_n)			
				echo "<script>history.go(-1);</script>";
			//if($result)
				//header('personal.php');
		}
		if($rela=='3')
		{
			$query = "INSERT INTO friend (`uid1`, `uid2`, `relation`) VALUES ('$uid', '$uid2', '0')";
			$result = mysqli_query($link, $query);
			$abc="開始追蹤你";
			$a=iconv("big5","utf-8",$abc);
			$query_n="INSERT INTO notice (`uid1`, `uid2`, `n_content`) VALUES ('$uid', '$uid2', '開始追蹤你')";
			$result_n = mysqli_query($link, $query_n);	
			if($result_n)
				echo "<script>history.go(-1);</script>";
			//if($result)
				//header('personal.php');
		}
		if($rela=='5')
		{
			$query1 = "INSERT INTO friend (`uid1`, `uid2`, `relation`) VALUES ('$uid', '$uid2', '2')";
			$result1 = mysqli_query($link, $query1);
			$query2 = "UPDATE friend SET relation =  '2' WHERE  `friend`.`uid1` ='$uid2' AND  `friend`.`uid2` ='$uid'";
			$result2 = mysqli_query($link, $query2);
			$abc="已接受你的交友邀請";
			$a=iconv("big5","utf-8",$abc);
			$query_n="INSERT INTO notice (`uid1`, `uid2`, `n_content`) VALUES ('$uid', '$uid2', '已接受你的交友邀請')";
			$result_n = mysqli_query($link, $query_n);
			if($result_n)
				echo "<script>history.go(-1);</script>";
			//if($result)
				//header('personal.php');
		}
		break;
	}
	
	case "0":
	{
		if($rela=='0')
		{
			$query = "UPDATE friend SET relation =  '1' WHERE  `friend`.`uid1` ='$uid' AND  `friend`.`uid2` ='$uid2'";
			$result = mysqli_query($link, $query);
			$abc="邀請你成為好友";
			$a=iconv("big5","utf-8",$abc);
			$query_n="INSERT INTO notice (`uid1`, `uid2`, `n_content`) VALUES ('$uid', '$uid2', '邀請你成為好友')";
			$result_n = mysqli_query($link, $query_n);	
			if($result_n)
				echo "<script>history.go(-1);</script>";
			//if($result)
				//header('personal.php');
		}
		if($rela=='4')
		{
			$query = "DELETE FROM friend WHERE `friend`.`uid1` = '$uid' AND `friend`.`uid2` = '$uid2'";
			$result = mysqli_query($link, $query);
			echo "<script>history.go(-1);</script>";
			//if($result)
				//header('personal.php');
		}
		if($rela=='5')
		{
			$query1 = "UPDATE friend SET relation =  '2' WHERE  `friend`.`uid1` ='$uid' AND  `friend`.`uid2` ='$uid2'";
			$result1 = mysqli_query($link, $query1);
			$query2 = "UPDATE friend SET relation =  '2' WHERE  `friend`.`uid1` ='$uid2' AND  `friend`.`uid2` ='$uid'";
			$result2 = mysqli_query($link, $query2);
			$abc="已接受你的交友邀請";
			$a=iconv("big5","utf-8",$abc);
			$query_n="INSERT INTO notice (`uid1`, `uid2`, `n_content`) VALUES ('$uid', '$uid2', '已接受你的交友邀請')";
			$result_n = mysqli_query($link, $query_n);
			if($result_n)
				echo "<script>history.go(-1);</script>";
			//if($result)
				//header('personal.php');
		}
		break;
	}
	
	case "1":
	{
		if($rela=='1')
		{
			$query = "UPDATE friend SET relation =  '0' WHERE  `friend`.`uid1` ='$uid' AND  `friend`.`uid2` ='$uid2'";
			$result = mysqli_query($link, $query);
			echo "<script>history.go(-1);</script>";
			//if($result)
				//header('personal.php');
		}
		break;
	}
		
	case "2":
	{
		if($rela=='2')
		{
			$query1 = "DELETE FROM friend WHERE `friend`.`uid1` = '$uid' AND `friend`.`uid2` = '$uid2'";
			$result1 = mysqli_query($link, $query1);
			$query2 = "DELETE FROM friend WHERE `friend`.`uid1` = '$uid2' AND `friend`.`uid2` = '$uid'";
			$result2 = mysqli_query($link, $query2);
			echo "<script>history.go(-1);</script>";
			//echo "<a href='javascript:history.back()'/>";
			//if($result)
				//header('personal.php');
		}
		break;
	}	
}

		
?>