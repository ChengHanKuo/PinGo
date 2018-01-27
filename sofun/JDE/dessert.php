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
<span style="text-align: center"><a href="meat.html" target="_self"><img src="order.jpg" alt="order" width="300" height="100" border="0" /></a><a href="search.php" target="_self"><img src="search.jpg" width="300" height="100" border="0"/></a><a href="customer.html" target="_self"><img src="feedback.jpg" width="300" height="100" border="0" /></a></span>
<p><font size="10" class="cc" ><b>我要點餐</b></font><br/>
  <a href="meat.php" target="_self"><img src="meat.gif" width="117" height="60" border="0" /></a><a href="seafood.php" target="_self"><img src="seafood.gif" width="117" height="60" border="0" /></a><a href="veges.php" target="_self"><img src="grass.gif" width="117" height="60" border="0" /></a><a href="dessert.php" target="_self"><img src="dessert-2.gif" width="117" height="60" border="0" /></a><a href="drink.php" target="_self"><img src="drink.gif" width="117" height="60" border="0" /></a><a href="other.php" target="_self"><img src="other.gif" width="117" height="60" border="0" /></a><br/><br/>

</body>
<?php
session_start();
$cNo=$_SESSION["NAME"];
header('Content-Type:text/html; charset-big5');
$dbname="justdoeat";
$link=@mysqli_connect('localhost','justdoeat','justdoeat',$dbname);
mysqli_query($link,'SET CHARACTER SET big5');
mysqli_query($link,"'SET collation_connection ='big5_chinese_ci'");


$sql="SELECT * FROM menu WHERE type='甜點'";
$result=mysqli_query($link,$sql);
echo "<form action='dessertok.php' method='post'>";
echo "<table border='1'>";
echo "<tr><td>名稱</td><td>類別</td><td>份數</td></tr>";
while($row=mysqli_fetch_assoc($result))
{
  echo "<tr>";
  echo "<td>".$row["fName"]."</td><td>".$row["cook"]."</td><td><select name='".$row['fNo']."'>
       <option value='0' selected='True'>0</option>
       <option value='1'>1</option>
       <option value='2'>2</option>
       <option value='3'>3</option>
</select></td>";
  echo "</tr>";
}
echo "</table>";
echo "<input type='submit' value='送出'>
 <input type='reset' value='清除'></form>";
 mysqli_close($link);
?>
