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
$number=$_POST['no'];
$dbname="justdoeat";
$link=@mysqli_connect('localhost','justdoeat','justdoeat',$dbname);
mysqli_query($link,'SET CHARACTER SET big5');
mysqli_query($link,"'SET collation_connection ='big5_chinese_ci'");

$sql1="DELETE FROM `menu` WHERE `fNo`='$number'";
$result1=mysqli_query($link,$sql1);

if(!$result1)
{
  echo "失敗".mysqli_error($link);
}
else
{
  echo "已刪除<a href='dmeat.php'>回管理頁</a>";
}
mysqli_close($link);
}
?>
