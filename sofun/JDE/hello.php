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
header('Content-Type:text/html; charset-big5');
$dbname="justdoeat";
$link=@mysqli_connect('localhost','justdoeat','justdoeat',$dbname);
mysqli_query($link,'SET CHARACTER SET big5');
mysqli_query($link,"'SET collation_connection ='big5_chinese_ci'");
if(isset($_POST["no"]))
{
$no=$_POST["no"];


  $sql1="INSERT INTO `info` (time,tNo) VALUES(date('Y-m-j H:i:s'),'$no');";
  $result1=mysqli_query($link,$sql1);
  if(!$result1)
    {
      echo "失敗".mysqli_error($link);
    }
  else
    {
      $sql2="SELECT MAX(`cNo`) FROM `info`";
      $result2=mysqli_query($link,$sql2);
      $row=mysqli_fetch_assoc($result2);
      $_SESSION["NAME"]=$row["MAX(`cNo`)"]; 
      echo "親愛的顧客您好</br>您的顧客號碼是".$row["MAX(`cNo`)"]."</br>您的桌號是".$no."</br>";
      echo "<a href='meat.php'>菜單</a></br>
    <a href='search.php'>點菜查詢</a></br>
    <a href='customer.php'>填寫回饋單</a></br>"; 
    }
   
}
mysqli_close($link);
?>
