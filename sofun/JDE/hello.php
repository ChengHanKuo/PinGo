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
      echo "����".mysqli_error($link);
    }
  else
    {
      $sql2="SELECT MAX(`cNo`) FROM `info`";
      $result2=mysqli_query($link,$sql2);
      $row=mysqli_fetch_assoc($result2);
      $_SESSION["NAME"]=$row["MAX(`cNo`)"]; 
      echo "�˷R���U�ȱz�n</br>�z���U�ȸ��X�O".$row["MAX(`cNo`)"]."</br>�z���ู�O".$no."</br>";
      echo "<a href='meat.php'>���</a></br>
    <a href='search.php'>�I��d��</a></br>
    <a href='customer.php'>��g�^�X��</a></br>"; 
    }
   
}
mysqli_close($link);
?>
