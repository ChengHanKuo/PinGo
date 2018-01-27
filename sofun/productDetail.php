<?
require_once('Connections/test.php');
mysql_select_db($database_test, $test);
$query_productpic2 ="SELECT pic FROM productpic WHERE productID=15 ORDER BY id ASC LIMIT 0 , 1";
$result_productpic2 = mysql_query($query_productpic2, $test) or die(mysql_error());
$row_productpic2 = mysql_fetch_assoc($result_productpic2);
$query_productpic ="SELECT color FROM productpic WHERE productID=15 ORDER BY id";
$result_productpic = mysql_query($query_productpic, $test) or die(mysql_error());
$row_productpic = mysql_fetch_assoc($result_productpic);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<title>產品展示</title>
<script type="text/javascript">
<!--
var xmlHttp
function showCustomer(str)
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("您的瀏覽器不支援AJAX！");
  return;
  }
var url="getcustomer.php";
url=url+"?q="+str;
url=url+"&id=15";
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}
function stateChanged()
{
if (xmlHttp.readyState==4)
{
document.getElementById("txtHint").innerHTML=xmlHttp.responseText;
}
}
function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}
//-->
</script>
</head>
<body>
<table align="center"><tr><td><p>
       <div id="txtHint">
        <?php if(isset($row_productpic2['pic'])){?>
         <img src="upload/product/<?php echo $row_productpic2['pic']; ?>" alt="" width="100" />
        <?php }else{?>
         <img src="images/JPEG_Image.png" alt=""  width="100" />
        <?php }?>
       </div>
       </p>
      <?php do{
       ?>
                     <label for="textfield"></label>
                      <input name="textfield" type="text" id="textfield"  style="background-color:<?php echo $row_productpic['color'];?>" onclick="showCustomer('<?php echo $row_productpic['color'];?>')" size=1 maxlength="0" />
                        <?php
       }while($row_productpic = mysql_fetch_assoc($result_productpic));?>
</td></tr></table>
 