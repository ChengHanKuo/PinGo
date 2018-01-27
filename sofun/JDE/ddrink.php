<head>
<title></title>
<style type="text/css">
<!--
.cc {
	font-family: "微軟正黑體";
	color: #603;
}
-->
</style>
</head>
<body bgcolor="#FFFFFF">
<span style="text-align: center"><a href="dmeat.php" target="_self"><img src="dorder.jpg" alt="order" width="300" height="100" border="0" /></a><a href="dsearch.php" target="_self"><img src="dsearch.jpg" width="300" height="100" border="0"/></a><a href="dcustomer.php" target="_self"><img src="dfeedback.jpg" width="300" height="100" border="0" /></a></span>
<p><font size="10" class="cc" ><b>菜單管理</b></font><br/>
  <a href="dmeat.php" target="_self"><img src="meat.gif" width="117" height="60" border="0" /></a><a href="dseafood.php" target="_self"><img src="seafood.gif" width="117" height="60" border="0" /></a><a href="dveges.php" target="_self"><img src="grass.gif" width="117" height="60" border="0" /></a><a href="ddessert.php" target="_self"><img src="dessert.gif" width="117" height="60" border="0" /></a><a href="ddrink.php" target="_self"><img src="drink-2.gif" width="117" height="60" border="0" /></a><a href="dother.php" target="_self"><img src="other.gif" width="117" height="60" border="0" /></a>

<?php
session_start();
if($_SESSION["NAME"]=="Admin")
{
header('Content-Type:text/html; charset-big5');
$dbname="justdoeat";
$link=@mysqli_connect('localhost','justdoeat','justdoeat',$dbname);
mysqli_query($link,'SET CHARACTER SET big5');
mysqli_query($link,"'SET collation_connection ='big5_chinese_ci'");


$sql="SELECT * FROM menu WHERE type='飲料'";
$result=mysqli_query($link,$sql);
echo "<table border='1'>";
echo "<tr><td>食品編號</td><td>食品名稱</td><td>食用方法</td></tr>";
while($row=mysqli_fetch_assoc($result))
{
  echo "<tr>";
  echo "<td>".$row["fNo"]."</td><td>".$row["fName"]."</td><td>".$row["cook"]."</td>";
  echo "<td><form action='del.php' method='post'>";
  echo "<input type='hidden' value='",$row['fNo']."' name='no'>";
  echo "<input type='submit' value='刪除'></form></td>";
  echo "<td><form action='update.php' method='post'>";
  echo "<input type='hidden' value='",$row['fNo']."' name='no2'>";
  echo "<input type='submit' value='更新'></form></td>";
  echo "</tr>";
}
echo "</table>";
echo "<form action='add.php' method='post'><input type='submit' value='新增'></form>";
mysqli_close($link);
} 
?>
</body>
