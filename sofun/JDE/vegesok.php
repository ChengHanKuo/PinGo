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
$cNo=$_SESSION["NAME"];

date_default_timezone_set('Asia/Taipei');
header('Content-Type:text/html; charset-big5'); 
$dbname="justdoeat";
$link=@mysqli_connect('localhost','justdoeat','justdoeat',$dbname);
mysqli_query($link,'SET CHARACTER SET big5');
mysqli_query($link,"'SET collation_connection ='big5_chinese_ci'");

$sql="SELECT * FROM menu WHERE type='蔬菜'";
$result=mysqli_query($link,$sql);

while($row=mysqli_fetch_assoc($result))
{
$fNo=$row['fNo'];
$fName=$row['fName'];
$a=$_POST[$fNo];
if($a!=0)
{
echo "你點了".$fName.$a."份</br>";
$sql2="INSERT INTO `order` (`cNo`,`time`,`fName`,`fa`) VALUES ($cNo,date('Y-m-j H:i:s'),'$fName',$a);";
$result2=mysqli_query($link,$sql2); 
}
}
if(!($result2))
  echo "失敗".mysqli_error($link);
else
  echo "點菜完成<a href='meat.php'>回菜單</a>";
mysqli_close($link);
?>