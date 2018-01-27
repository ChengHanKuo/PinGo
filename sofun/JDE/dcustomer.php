<head>
<title>查詢回饋</title>
<style type="text/css">
<!--
body {
	background-color: #FFF;
	font-family: "微軟正黑體";
	color: #603;
}

.ff {
	font-family: "微軟正黑體";
	font-size: 16px;
}
-->
</style></head>
<body>
<span style="text-align: center"><a href="dmeat.php" target="_self"><img src="dorder.jpg" alt="order" width="300" height="100" border="0" /></a><a href="dsearch.php" target="_self"><img src="dsearch.jpg" width="300" height="100" border="0"/></a><a href="dcustomer.php" target="_self"><img src="dfeedback.jpg" width="300" height="100" border="0" /></a></span>
<p><font size="10" class="cc" ><b>查詢回饋</b></font>
<p><br />
<?php
session_start(); 
if($_SESSION['NAME']=='Admin')
{
echo "<p class='ff'><form action='' method='post'>
第一次用餐:<select name='first'>
       <option value='ALL'>全</option>
       <option value='否'>否</option>
       <option value='是'>是</option>
       </select></br>
資訊來源:<select name='info'>
       <option value='ALL'>全</option>
       <option value='網路'>網路</option>
       <option value='以前來過'>以前來過</option>
       <option value='宣傳單'>宣傳單</option>
       <option value='朋友介紹'>朋友介紹</option>
       <option value='路過'>路過</option>
       <option value='其它'>其它</option>              
       </select></br>
用餐目的:<select name='what'>
        <option value='ALL'>全</option>
        <option value='慶生'>慶生</option>     
        <option value='朋友聚會'>朋友聚會</option>       
        <option value='紀念日'>紀念日</option> 
        <option value='家人聚餐'>家人聚餐</option> 
        <option value='date'>約會</option> 
        <option value='商務聚餐'>商務聚餐</option> 
        <option value='其它'>其它</option>       
        </select></br>
        <input type='submit'></form>";
    
header('Content-Type:text/html; charset-big5');
$dbname="justdoeat";
$link=@mysqli_connect('localhost','justdoeat','justdoeat',$dbname);
mysqli_query($link,'SET CHARACTER SET big5');
mysqli_query($link,"'SET collation_connection ='big5_chinese_ci'");

  if(isset($_POST['first']))
  {
    $first=$_POST['first'];
    $info=$_POST['info'];
    $what=$_POST['what'];
    echo "主人你好你選的是:</br>";
    if($first=='ALL')
    {
      echo "第一次來此用餐:全選</br>";
      if($info=='ALL')
      {
        echo "資訊來源:全選</br>";
        if($what=='ALL')
        {
          echo "用餐目的:全選";
          $sql1="SELECT AVG(sMeat) FROM `satisfaction`";
          $sql2="SELECT AVG(sSeafood) FROM `satisfaction`";
          $sql3="SELECT AVG(sVege) FROM `satisfaction`";
          $sql4="SELECT AVG(sDessert) FROM `satisfaction`";
          $sql5="SELECT AVG(sDrink) FROM `satisfaction`";
          $sql6="SELECT AVG(sOther) FROM `satisfaction`";
          $sql7="SELECT AVG(sService) FROM `satisfaction`";
        }
        else
        {
          echo "用餐目的:".$what;
          $sql1="SELECT AVG(sMeat) FROM `satisfaction` WHERE `what`='$what'";
          $sql2="SELECT AVG(sSeafood) FROM `satisfaction` WHERE `what`='$what'";
          $sql3="SELECT AVG(sVege) FROM `satisfaction` WHERE `what`='$what'";
          $sql4="SELECT AVG(sDessert) FROM `satisfaction` WHERE `what`='$what'";
          $sql5="SELECT AVG(sDrink) FROM `satisfaction` WHERE `what`='$what'";
          $sql6="SELECT AVG(sOther) FROM `satisfaction` WHERE `what`='$what'";
          $sql7="SELECT AVG(sService) FROM `satisfaction` WHERE `what`='$what'";
        }
      }
      else
      {  
        echo "資訊來源:".$info."</br>";
        if($what=='ALL')
        {
          echo "用餐目的:全選";
          $sql1="SELECT AVG(sMeat) FROM `satisfaction` WHERE `info`='$info'";
          $sql2="SELECT AVG(sSeafood) FROM `satisfaction` WHERE `info`='$info'";
          $sql3="SELECT AVG(sVege) FROM `satisfaction` WHERE `info`='$info'";
          $sql4="SELECT AVG(sDessert) FROM `satisfaction` WHERE `info`='$info'";
          $sql5="SELECT AVG(sDrink) FROM `satisfaction` WHERE `info`='$info'";
          $sql6="SELECT AVG(sOther) FROM `satisfaction` WHERE `info`='$info'";
          $sql7="SELECT AVG(sService) FROM `satisfaction` WHERE `info`='$info'";
        }
        else
        {
          echo "用餐目的:".$what;
          $sql1="SELECT AVG(sMeat) FROM `satisfaction` WHERE `info`='$info' AND `what`='$what'";
          $sql2="SELECT AVG(sSeafood) FROM `satisfaction` WHERE `info`='$info' AND `what`='$what'";
          $sql3="SELECT AVG(sVege) FROM `satisfaction` WHERE `info`='$info' AND `what`='$what'";
          $sql4="SELECT AVG(sDessert) FROM `satisfaction` WHERE `info`='$info' AND `what`='$what'";
          $sql5="SELECT AVG(sDrink) FROM `satisfaction` WHERE `info`='$info' AND `what`='$what'";
          $sql6="SELECT AVG(sOther) FROM `satisfaction` WHERE `info`='$info' AND `what`='$what'";
          $sql7="SELECT AVG(sService) FROM `satisfaction` WHERE `info`='$info' AND `what`='$what'";
        }        
      }   
    }
    else 
    {
      echo "第一次來此用餐:".$first."</br>";
      if($info=='ALL')
      {
        echo "資訊來源:全選</br>";
        if($what=='ALL')
        {
          echo "用餐目的:全選";
          $sql1="SELECT AVG(sMeat) FROM `satisfaction` WHERE `first`='$first'";
          $sql2="SELECT AVG(sSeafood) FROM `satisfaction` WHERE `first`='$first'";
          $sql3="SELECT AVG(sVege) FROM `satisfaction` WHERE `first`='$first'";
          $sql4="SELECT AVG(sDessert) FROM `satisfaction` WHERE `first`='$first'";
          $sql5="SELECT AVG(sDrink) FROM `satisfaction` WHERE `first`='$first'";
          $sql6="SELECT AVG(sOther) FROM `satisfaction` WHERE `first`='$first'";
          $sql7="SELECT AVG(sService) FROM `satisfaction` WHERE `first`='$first'";
        }
        else
        {
          echo "用餐目的:".$what;
          $sql1="SELECT AVG(sMeat) FROM `satisfaction`  WHERE `first`='$first' AND `what`='$what'";
          $sql2="SELECT AVG(sSeafood) FROM `satisfaction`  WHERE `first`='$first' AND `what`='$what'";
          $sql3="SELECT AVG(sVege) FROM `satisfaction`  WHERE `first`='$first' AND `what`='$what'";
          $sql4="SELECT AVG(sDessert) FROM `satisfaction`  WHERE `first`='$first' AND `what`='$what'";
          $sql5="SELECT AVG(sDrink) FROM `satisfaction`  WHERE `first`='$first' AND `what`='$what'";
          $sql6="SELECT AVG(sOther) FROM `satisfaction`  WHERE `first`='$first' AND `what`='$what'";
          $sql7="SELECT AVG(sService) FROM `satisfaction`  WHERE `first`='$first' AND `what`='$what'";
        }
      }
      else
      {  
        echo "資訊來源:".$info."</br>";
        if($what=='ALL')
        {
          echo "用餐目的:全選";
          $sql1="SELECT AVG(sMeat) FROM `satisfaction` WHERE `first`='$first' AND `info`='$info'";
          $sql2="SELECT AVG(sSeafood) FROM `satisfaction` WHERE `first`='$first' AND `info`='$info'";
          $sql3="SELECT AVG(sVege) FROM `satisfaction` WHERE `first`='$first' AND `info`='$info'";
          $sql4="SELECT AVG(sDessert) FROM `satisfaction` WHERE `first`='$first' AND `info`='$info'";
          $sql5="SELECT AVG(sDrink) FROM `satisfaction` WHERE `first`='$first' AND `info`='$info'";
          $sql6="SELECT AVG(sOther) FROM `satisfaction` WHERE `first`='$first' AND `info`='$info'";
          $sql7="SELECT AVG(sService) FROM `satisfaction` WHERE `first`='$first' AND `info`='$info'";
        }
        else
        {
          echo "用餐目的:".$what;
          $sql1="SELECT AVG(sMeat) FROM `satisfaction` WHERE `first`='$first' AND `info`='$info' AND `what`='$what'";
          $sql2="SELECT AVG(sSeafood) FROM `satisfaction` WHERE `first`='$first' AND `info`='$info' AND `what`='$what'";
          $sql3="SELECT AVG(sVege) FROM `satisfaction` WHERE `first`='$first' AND `info`='$info' AND `what`='$what'";
          $sql4="SELECT AVG(sDessert) FROM `satisfaction` WHERE `first`='$first' AND `info`='$info' AND `what`='$what'";
          $sql5="SELECT AVG(sDrink) FROM `satisfaction` WHERE `first`='$first' AND `info`='$info' AND `what`='$what'";
          $sql6="SELECT AVG(sOther) FROM `satisfaction` WHERE `first`='$first' AND `info`='$info' AND `what`='$what'";
          $sql7="SELECT AVG(sService) FROM `satisfaction` WHERE `first`='$first' AND `info`='$info' AND `what`='$what'";
        }        
      }  
    }

    $result1=mysqli_query($link,$sql1);
    $row1=mysqli_fetch_assoc($result1); 
    $result2=mysqli_query($link,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $result3=mysqli_query($link,$sql3);
    $row3=mysqli_fetch_assoc($result3);   
    $result4=mysqli_query($link,$sql4);
    $row4=mysqli_fetch_assoc($result4);   
    $result5=mysqli_query($link,$sql5);
    $row5=mysqli_fetch_assoc($result5);  
    $result6=mysqli_query($link,$sql6);
    $row6=mysqli_fetch_assoc($result6); 
    $result7=mysqli_query($link,$sql7);
    $row7=mysqli_fetch_assoc($result7); 
    echo "</br>肉類滿意程度(滿分5)：".$row1['AVG(sMeat)'];
    echo "</br>海鮮類滿意程度(滿分5)：".$row2['AVG(sSeafood)'];
    echo "</br>蔬菜類滿意程度(滿分5)：".$row3['AVG(sVege)'];
    echo "</br>甜點類滿意程度(滿分5)：".$row4['AVG(sDessert)'];
    echo "</br>飲料類滿意程度(滿分5)：".$row5['AVG(sDrink)'];
    echo "</br>其他類滿意程度(滿分5)：".$row6['AVG(sOther)'];
    echo "</br>服務滿意程度(滿分5)：".$row7['AVG(sService)'];   
  }
  echo "<form action='' method='post'>
  <input type='hidden' name='list'>
  <input type='submit' value='列出所有意見'></form>";

  
  if(isset($_POST['list']))
  {
      $sqllist="SELECT `comments` FROM `satisfaction`";     
      $resultlist=mysqli_query($link,$sqllist);
      while($rowlist=mysqli_fetch_assoc($resultlist))
      {
        if($rowlist['comments']!=NULL)
		echo $rowlist['comments']."</br>";
      } 
      
  }
  echo "<form action='' method='post'>
  <input type='hidden' name='list2'>
  <input type='submit' value='只列出滿意程度低於2的意見'></form>";
  if(isset($_POST['list2']))
  {
      $sqllist2="SELECT `comments` FROM `satisfaction` WHERE `sMeat`<2 OR `sSeafood`<2 OR `sVege`<2 OR `sDessert`<2 OR `sDrink`<2 OR `sOther`<2 OR `sService`<2";
      $resultlist2=mysqli_query($link,$sqllist2);
      while($rowlist2=mysqli_fetch_assoc($resultlist2))
      {
        if($rowlist2['comments']!=NULL)
        	echo $rowlist2['comments']."</br>";
      } 
  }
}
else
{
  echo "你不是管理者唷</p>";
} 
?> 
  
  
</body>
