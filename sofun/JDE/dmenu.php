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
if($_SESSION["NAME"]=="Admin")
{
echo "請選擇要修改的菜單</br>";
echo "<a href='dmeat.php'>肉類</a></br>
      <a href='dseafood.php'>海鮮</a></br>
      <a href='dveges.php'>蔬菜</a></br>
      <a href='dother.php'>其他</a></br>
      <a href='ddrink.php'>飲料</a></br>
      <a href='ddessert.php'>甜點</a></br>";  
}
else
  echo "你不是管理者哦!!掰掰~";

?>
