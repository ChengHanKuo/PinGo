<?php
require_once('Connections/test.php');
mysql_select_db($database_test, $test);
if($_GET['q'] && $_GET['id']!=NULL){
 $q=$_GET["q"];
 $id=$_GET['id'];
 
 $sql="SELECT pic,color FROM productpic WHERE productID='".$id."' and color='".$q."' ORDER BY id";
 
 $result = mysql_query($sql, $test) or die(mysql_error());
 $row = mysql_fetch_assoc($result);
 
 echo "<img src='upload/product/".$row['pic'] . "' width='100'>";
}   
?>