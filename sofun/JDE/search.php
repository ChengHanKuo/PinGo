<head>
<title></title>
<style type="text/css">
<!--
body {
	background-color: #FFF;
	font-family: "微軟正黑體";
	color: #603;
}
-->
</style></head>

<body>
<span style="text-align: center"><a href="meat.php" target="_self"><img src="order.jpg" alt="order" width="300" height="100" border="0" /></a><a href="search.php" target="_self"><img src="search.jpg" width="300" height="100" border="0"/></a><a href="customer.php" target="_self"><img src="feedback.jpg" width="300" height="100" border="0" /></a></span>
<p><font size="10" class="cc" ><b>查詢點餐</b></font>
<p><br />


<?php
session_start();
$cNo=$_SESSION["NAME"];
header('Content-Type:text/html; charset-big5');
$dbname="justdoeat";
$link=@mysqli_connect('localhost','justdoeat','justdoeat',$dbname);
mysqli_query($link,'SET CHARACTER SET big5');
mysqli_query($link,"'SET collation_connection ='big5_chinese_ci'");


$sql="SELECT * FROM `order` WHERE `cNo`=$cNo";
$result=mysqli_query($link,$sql);
echo "<form action='' method='post'>";
echo "<table border='1'>";
echo "<tr><td>時間</td><td>食物</td><td>份數</td><td>出菜</td></tr>";
while($row=mysqli_fetch_assoc($result))
{
  if($row["done"]==1)
  {
    echo "<tr>";
    echo "<td>".$row["time"]."</td><td>".$row["fName"]."</td><td>".$row["fa"]."</td><td>已出菜</td>";
    echo "</tr>";
  }
  else
  {
      echo "<tr>";
      echo "<td>".$row["time"]."</td><td>".$row["fName"]."</td><td>".$row["fa"]."</td><td>準備中</td>";
      echo "</tr>";
  } 
}
echo "</table>";
echo "</form>";
 
?><p><br/>
  
</body>
