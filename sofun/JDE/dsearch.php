<head>
<title>�X��޲z</title>
<style type="text/css">
<!--
body {
	background-color: #FFF;
	font-family: "�L�n������";
	color: #603;
}

.ff {
	font-family: "�L�n������";
	font-size: 16px;
}
-->
</style></head>

<body>
<span style="text-align: center"><a href="dmeat.php" target="_self"><img src="dorder.jpg" alt="order" width="300" height="100" border="0" /></a><a href="dsearch.php" target="_self"><img src="dsearch.jpg" width="300" height="100" border="0"/></a><a href="dcustomer.php" target="_self"><img src="dfeedback.jpg" width="300" height="100" border="0" /></a></span>
<p><font size="10" class="cc" ><b>�X��޲z</b></font>
<p><br />
</body>
<?php
session_start();
if($_SESSION["NAME"]=="Admin")
{
header('Content-Type:text/html; charset-big5');
$dbname="justdoeat";
$link=@mysqli_connect('localhost','justdoeat','justdoeat',$dbname);
mysqli_query($link,'SET CHARACTER SET big5');
mysqli_query($link,"'SET collation_connection ='big5_chinese_ci'");

echo "<form action='' method='post'>
�п�J�ู:<input type='text' name='tNo'></br>
<input type='submit'>
</form>";
if(isset($_POST['tNo']))
  $_SESSION['tNo']=$_POST['tNo'];
if(isset($_SESSION['tNo']))
{
$tNo=$_SESSION['tNo'];
if($tNo=='*')
{
  $sql="SELECT * FROM `order` LEFT JOIN `info` ON `order`.`cNo`=`info`.`cNo`";
$result=mysqli_query($link,$sql);
echo "<form action='' method='post'>";
echo "<table border='1'>";
echo "<tr><td>�ู</td><td>�ɶ�</td><td>����</td><td>����</td><td>�X��</td></tr>";
while($row=mysqli_fetch_assoc($result))
{
  if($row["done"]==1)
  {
    echo "<tr>";
    echo "<td>".$row["tNo"]."</td><td>".$row["time"]."</td><td>".$row["fName"]."</td><td>".$row["fa"]."</td><td>�w�X��</td>";
    echo "</tr>";
  }
  else
  {
      echo "<tr>";
      echo "<td>".$row["tNo"]."</td><td>".$row["time"]."</td><td>".$row["fName"]."</td><td>".$row["fa"]."</td><td>�ǳƤ�</td>
            <td><form action'' method='post'>
            <input type='hidden' value='",$row['oNo']."' name='no'>
            <input type='submit'></form></td></tr>";                                               
  }
}
}
else
{
  $sql="SELECT * FROM `order` WHERE `cNo` IN (SELECT MAX(`cNo`) FROM `info` WHERE `tNo`=$tNo) ORDER BY `time`";
$result=mysqli_query($link,$sql);
echo "<form action='' method='post'>";
echo "<table border='1'>";
echo "<tr><td>�ู</td><td>�ɶ�</td><td>����</td><td>����</td><td>�X��</td></tr>";
while($row=mysqli_fetch_assoc($result))
{
  if($row["done"]==1)
  {
    echo "<tr>";
    echo "<td>".$tNo."</td><td>".$row["time"]."</td><td>".$row["fName"]."</td><td>".$row["fa"]."</td><td>�w�X��</td>";
    echo "</tr>";
  }
  else
  {
      echo "<tr>";
      echo "<td>".$tNo."</td><td>".$row["time"]."</td><td>".$row["fName"]."</td><td>".$row["fa"]."</td><td>�ǳƤ�</td>
            <td>
            <input type='hidden' value='",$row['oNo']."' name='no'>
            <input type='submit' value='�X��'></td></tr>";                                               
  }
}
}
echo "</table>";
echo "</form>";

if(isset($_POST['no']))
{
$no=$_POST["no"];

$sql="UPDATE `order` SET `done`='1' WHERE `oNo`='$no'";
$result=mysqli_query($link,$sql);

if(!$result)
  echo "����".mysqli_error($link);
else
  header("refresh: 0;url='dsearch.php'");
}

if(isset($_POST['tNo']))
{  $_SESSION['tNo']=$_POST['tNo'];
  header("refresh: 0;url='dsearch.php'");} 
}

}
?>
