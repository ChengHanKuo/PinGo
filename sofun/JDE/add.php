<style type="text/css">
body {
	background-color: #FFF;
}
.ff {
	font-family: "�L�n������";
	font-size: 16px;
}
</style>

<form action='' method='post'>
���~�s��:<input type='text' name='fNo'></br>
���~���O: <input type=radio name="type" value="����"><label>����</label>        
          <input type=radio name="type" value="���A"><label>���A</label>      
          <input type=radio name="type" value="����"><label>����</label>
          <input type=radio name="type" value="��L"><label>��L</label>
          <input type=radio name="type" value="����"><label>����</label>
          <input type=radio name="type" value="���I"><label>���I</label></br>
���~�W��:<input type='text' name='fName'></br>
���Τ�k:<input type='text' name='cook'></br>
<input type='submit' value='�T�{�s�W'></br>

</form>

<?php

header('Content-Type:text/html; charset-big5');

$dbname="justdoeat";
$link=@mysqli_connect('localhost','justdoeat','justdoeat',$dbname);
mysqli_query($link,'SET CHARACTER SET big5');
mysqli_query($link,"'SET collation_connection ='big5_chinese_ci'");
if(isset($_POST["fNo"]))
{
$fNo=$_POST["fNo"];
$fName=$_POST["fName"];
$type=$_POST["type"];
$cook=$_POST["cook"];

$sql="INSERT INTO `menu`(`fNo`, `fName`, `type`, `cook`) VALUES ('$fNo','$fName','$type','$cook');";
$result=mysqli_query($link,$sql);

if(!$result)
{
  echo "����".mysqli_error($link);
}
else
  echo "�w�s�W<a href='dmeat.php'>�^�޲z��</a>";
}
mysqli_close($link);

?>