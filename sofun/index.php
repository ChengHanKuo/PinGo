<?php
session_start();
header("Content-Type:text/html; charset = utf-8");


$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");



if(isset($_POST['account'])&&isset($_POST['password']))
{

  $account = $_POST['account'];
  $password = $_POST['password'];


  $query = "SELECT uid,account,password FROM user WHERE account='$account' AND password='$password'";
  $result=mysqli_query($link,$query) or die(mysql_error());
  $count=mysqli_num_rows($result);
  if ($count == 1)
  {
	//$query2 = "SELECT uid FROM user WHERE account = '$account'";
	//$result2 = mysqli_query($link, $query2);
	while($row=mysqli_fetch_assoc($result))
		$uid =$row['uid'];
	$_SESSION['uid'] = $uid;
    header('Location:main_new.php');
  }
  else
	echo "登入失敗!";
}

mysqli_close($link);
?>

<html>
<head>
<style type="text/css">
#apDiv1 {
	position:absolute;
	width:398px;
	height:167px;
	z-index:1;
	left:50%;
	top:385px;
	margin-left:-115px;
	margin-top:-80px;
}
body {
	background-image: url(image/p-login.jpg);
	background-repeat: no-repeat;
	background-position:top;
	background-attachment:fixed;
}
</style>

<link rel=stylesheet type="text/css" href="center.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<div id="container">
<div id="apDiv1">	
    
<form name="form" method="post" action="">
  <p>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
   <input type="text" name="account" size="15" style="border:0px;background-color:cornsilk;font-size:18"/> 
    <br><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="password" name="password" size="15" style="border:0px;background-color:cornsilk;font-size:18"/> 
  </p>	
  <p><br>
    <a href="new.php">
    <img src="image\b-new.png"></a>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="image" onClick="document.formname.submit();" src="image\b-sign.png">
  </p>
</form>
</div>
</div>
</body></html>
 