<style type="text/css">
body {
	background-color: #FFF;
}
.ff {
	font-family: "微軟正黑體";
	font-size: 16px;
}
</style>

<?php
session_start();
if($_SESSION["NAME"]=="Admin")
{
header('Content-Type:text/html; charset-big5');
$fNo=$_POST['fNo'];
$fName=$_POST['fName'];
$cook=$_POST['cook'];

$dbname="justdoeat";
$link=@mysqli_connect('localhost','justdoeat','justdoeat',$dbname);
mysqli_query($link,'SET CHARACTER SET big5');
mysqli_query($link,"'SET collation_connection ='big5_chinese_ci'");

$sql="UPDATE `menu` SET `fName`='$fName', `cook`='$cook' WHERE `fNo`='$fNo'";
$result=mysqli_query($link,$sql);

if(!$result)
{
  echo "失敗".mysqli_error($link);
}

echo "已更新<a href='dmeat.php'>回管理頁</a>";



mysqli_close($link);
}
?>
