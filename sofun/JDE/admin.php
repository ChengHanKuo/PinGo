<style type="text/css">
body {
	background-color: #FFF;
}
.ff {
	font-family: "�L�n������";
	font-size: 16px;
}
</style>

<form action="" method="post">

<p class="ff">�п�J�K�X:<input type="text" name="pwd"></br>
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
    echo "�D�H�A�n</br>";
    echo "<a href='dmeat.php'>���޲z</a></br>
    <a href='dsearch.php'>�X��޲z</a></br>
    <a href='dcustomer.php'>�d�ݦ^�X</a></br></p>";  
  }
  else
    echo "�K�X���~��~</p>";
}

?>