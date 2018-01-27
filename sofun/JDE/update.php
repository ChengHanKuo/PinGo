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

$number=$_POST['no2'];
$dbname="justdoeat";
$link=@mysqli_connect('localhost','justdoeat','justdoeat',$dbname);
mysqli_query($link,'SET CHARACTER SET big5');
mysqli_query($link,"'SET collation_connection ='big5_chinese_ci'");

$sql="SELECT * FROM `menu` WHERE `fNo`='$number'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);

$fNo=$row['fNo'];
$fName=$row['fName'];
$type=$row['type'];
$cook=$row['cook'];

echo "<form action='upconfirm.php' method='post'>";
echo "食品編號:".$fNo."</br>";
echo "<input type='hidden' value='$fNo' name='fNo'>";
echo "食品類別:".$type."</br>";
echo "食品名稱:<input type='text' value='$fName' name='fName'></br>";
echo "食用方法:<input type='text' value='$cook' name='cook'></br>";
echo "</br><input type='submit' value='確認更新'>";
echo "<a href='dmeat.php'>取消更新回管理頁</a>";
echo "</form>";
mysqli_close($link);
}
?>
