<style type="text/css">
body {
	background-color: #FFF;
}
.ff {
	font-family: "�L�n������";
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
echo "���~�s��:".$fNo."</br>";
echo "<input type='hidden' value='$fNo' name='fNo'>";
echo "���~���O:".$type."</br>";
echo "���~�W��:<input type='text' value='$fName' name='fName'></br>";
echo "���Τ�k:<input type='text' value='$cook' name='cook'></br>";
echo "</br><input type='submit' value='�T�{��s'>";
echo "<a href='dmeat.php'>������s�^�޲z��</a>";
echo "</form>";
mysqli_close($link);
}
?>
