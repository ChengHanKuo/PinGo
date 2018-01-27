<html>
<head>
<style type="text/css">
<!--

body {
	background-color: #FFF;
}

.cc {
	font-family: "微軟正黑體";
}
.cc font b {
}
.cc font b {
	text-align: center;
}
-->
</style>
</head>
<body>

<span class="cc"><font size="10" ><b>非常感謝您的光臨</b></font><br/><br/>
<font size="10" ><b>歡迎下次再來唷:D</b></font></span><br/><br/>   

</body>
</html>

<?php
  session_start();
  $cNo=$_SESSION['NAME']; 
  

   if(isset($_POST['first'])){
   $a=$_POST["first"];
   $b=$_POST["info"];
   $c=$_POST["what"];
   $d=$_POST["sati"];
   $e=$_POST["sati1"];
   $f=$_POST["sati2"];
   $g=$_POST["sati3"];
   $h=$_POST["sati4"];
   $i=$_POST["sati5"];
   $j=$_POST["sati6"];
   $k=nl2br($_POST["Comment"]);
   
   header('Content-Type:text/html; charset=big5');

$dbname="justdoeat";
$link=@mysqli_connect('localhost','justdoeat','justdoeat',$dbname);
mysqli_query($link, 'SET CHARACTER SET big5');
mysqli_query($link, "SET collation_connection = 'big5_chinese_ci'");


$sql1="INSERT INTO satisfaction(cNo,first,info,what,sMeat,sSeafood,sVege,sDessert,sDrink,sOther,sService,comments) 
VALUES('$cNo','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k')";
$result1=mysqli_query($link,$sql1);

if (!$result1){
  echo "失敗".mysqli_error($link);
}
}

$sql="SELECT * FROM satisfaction";
$result=mysqli_query($link,$sql);
echo "<table border='1'>";
session_destroy();
mysqli_close($link);    

?>

