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
$cNo=$_SESSION["NAME"];

date_default_timezone_set('Asia/Taipei');
header('Content-Type:text/html; charset-big5'); 
$dbname="justdoeat";
$link=@mysqli_connect('localhost','justdoeat','justdoeat',$dbname);
mysqli_query($link,'SET CHARACTER SET big5');
mysqli_query($link,"'SET collation_connection ='big5_chinese_ci'");

$sql="SELECT * FROM menu WHERE type='����'";
$result=mysqli_query($link,$sql);

while($row=mysqli_fetch_assoc($result))
{
$fNo=$row['fNo'];
$fName=$row['fName'];
$a=$_POST[$fNo];
if($a!=0)
{
echo "�A�I�F".$fName.$a."��</br>";
$sql2="INSERT INTO `order` (`cNo`,`time`,`fName`,`fa`) VALUES ($cNo,date('Y-m-j H:i:s'),'$fName',$a);";
$result2=mysqli_query($link,$sql2); 
}
}
if(!($result2))
  echo "����".mysqli_error($link);
else
  echo "�I�槹��<a href='meat.php'>�^���</a>";
mysqli_close($link);
?>