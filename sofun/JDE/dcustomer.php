<head>
<title>�d�ߦ^�X</title>
<style type="text/css">
<!--
body {
	background-color: #FFF;
	font-family: "�L�n������";
	color: #603;
}

.ff {
	font-family: "�L�n������";
	font-size: 16px;
}
-->
</style></head>
<body>
<span style="text-align: center"><a href="dmeat.php" target="_self"><img src="dorder.jpg" alt="order" width="300" height="100" border="0" /></a><a href="dsearch.php" target="_self"><img src="dsearch.jpg" width="300" height="100" border="0"/></a><a href="dcustomer.php" target="_self"><img src="dfeedback.jpg" width="300" height="100" border="0" /></a></span>
<p><font size="10" class="cc" ><b>�d�ߦ^�X</b></font>
<p><br />
<?php
session_start(); 
if($_SESSION['NAME']=='Admin')
{
echo "<p class='ff'><form action='' method='post'>
�Ĥ@�����\:<select name='first'>
       <option value='ALL'>��</option>
       <option value='�_'>�_</option>
       <option value='�O'>�O</option>
       </select></br>
��T�ӷ�:<select name='info'>
       <option value='ALL'>��</option>
       <option value='����'>����</option>
       <option value='�H�e�ӹL'>�H�e�ӹL</option>
       <option value='�Ŷǳ�'>�Ŷǳ�</option>
       <option value='�B�ͤ���'>�B�ͤ���</option>
       <option value='���L'>���L</option>
       <option value='�䥦'>�䥦</option>              
       </select></br>
���\�ت�:<select name='what'>
        <option value='ALL'>��</option>
        <option value='�y��'>�y��</option>     
        <option value='�B�ͻE�|'>�B�ͻE�|</option>       
        <option value='������'>������</option> 
        <option value='�a�H�E�\'>�a�H�E�\</option> 
        <option value='date'>���|</option> 
        <option value='�ӰȻE�\'>�ӰȻE�\</option> 
        <option value='�䥦'>�䥦</option>       
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
    echo "�D�H�A�n�A�諸�O:</br>";
    if($first=='ALL')
    {
      echo "�Ĥ@���Ӧ����\:����</br>";
      if($info=='ALL')
      {
        echo "��T�ӷ�:����</br>";
        if($what=='ALL')
        {
          echo "���\�ت�:����";
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
          echo "���\�ت�:".$what;
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
        echo "��T�ӷ�:".$info."</br>";
        if($what=='ALL')
        {
          echo "���\�ت�:����";
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
          echo "���\�ت�:".$what;
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
      echo "�Ĥ@���Ӧ����\:".$first."</br>";
      if($info=='ALL')
      {
        echo "��T�ӷ�:����</br>";
        if($what=='ALL')
        {
          echo "���\�ت�:����";
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
          echo "���\�ت�:".$what;
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
        echo "��T�ӷ�:".$info."</br>";
        if($what=='ALL')
        {
          echo "���\�ت�:����";
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
          echo "���\�ت�:".$what;
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
    echo "</br>�������N�{��(����5)�G".$row1['AVG(sMeat)'];
    echo "</br>���A�����N�{��(����5)�G".$row2['AVG(sSeafood)'];
    echo "</br>���������N�{��(����5)�G".$row3['AVG(sVege)'];
    echo "</br>���I�����N�{��(����5)�G".$row4['AVG(sDessert)'];
    echo "</br>���������N�{��(����5)�G".$row5['AVG(sDrink)'];
    echo "</br>��L�����N�{��(����5)�G".$row6['AVG(sOther)'];
    echo "</br>�A�Ⱥ��N�{��(����5)�G".$row7['AVG(sService)'];   
  }
  echo "<form action='' method='post'>
  <input type='hidden' name='list'>
  <input type='submit' value='�C�X�Ҧ��N��'></form>";

  
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
  <input type='submit' value='�u�C�X���N�{�קC��2���N��'></form>";
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
  echo "�A���O�޲z�̭�</p>";
} 
?> 
  
  
</body>
