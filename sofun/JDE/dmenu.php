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
if($_SESSION["NAME"]=="Admin")
{
echo "�п�ܭn�ק諸���</br>";
echo "<a href='dmeat.php'>����</a></br>
      <a href='dseafood.php'>���A</a></br>
      <a href='dveges.php'>����</a></br>
      <a href='dother.php'>��L</a></br>
      <a href='ddrink.php'>����</a></br>
      <a href='ddessert.php'>���I</a></br>";  
}
else
  echo "�A���O�޲z�̮@!!�T�T~";

?>
