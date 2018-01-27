<style type="text/css">
body {
	background-color: #FFF;
}
.ff {
	font-family: "微軟正黑體";
	font-size: 16px;
}
</style>

<form action="" method="post">

<p class="ff">請輸入密碼:<input type="text" name="pwd"></br>
<input type="submit">

</form>
<?php
session_start();
if(isset($_POST["pwd"]))
{
  $pwd=$_POST["pwd"];
  if($pwd=="12345")
  {
    $_SESSION["NAME"]="Admin";
    echo "主人你好</br>";
    echo "<a href='dmeat.php'>菜單管理</a></br>
    <a href='dsearch.php'>出菜管理</a></br>
    <a href='dcustomer.php'>查看回饋</a></br></p>";  
  }
  else
    echo "密碼錯誤唷~</p>";
}

?>