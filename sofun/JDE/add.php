<style type="text/css">
body {
	background-color: #FFF;
}
.ff {
	font-family: "微軟正黑體";
	font-size: 16px;
}
</style>

<form action='' method='post'>
食品編號:<input type='text' name='fNo'></br>
食品類別: <input type=radio name="type" value="肉類"><label>肉類</label>        
          <input type=radio name="type" value="海鮮"><label>海鮮</label>      
          <input type=radio name="type" value="蔬菜"><label>蔬菜</label>
          <input type=radio name="type" value="其他"><label>其他</label>
          <input type=radio name="type" value="飲料"><label>飲料</label>
          <input type=radio name="type" value="甜點"><label>甜點</label></br>
食品名稱:<input type='text' name='fName'></br>
食用方法:<input type='text' name='cook'></br>
<input type='submit' value='確認新增'></br>

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
  echo "失敗".mysqli_error($link);
}
else
  echo "已新增<a href='dmeat.php'>回管理頁</a>";
}
mysqli_close($link);

?>