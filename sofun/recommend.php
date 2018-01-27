<?php
session_start();
$uid = $_SESSION['uid'];

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");

$query_account="SELECT account FROM user WHERE uid = $uid";
$result_account = mysqli_query($link, $query_account);
while($row_account=mysqli_fetch_assoc($result_account))
	$account_bar=$row_account['account'];
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

	<link rel="stylesheet" type="text/css" href="css/default (2).css" />
	<link rel="stylesheet" type="text/css" href="css/component (2).css"/>
	<link rel="stylesheet" type="text/css" href="css/menu.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/style_notice.css" />
	<script src="js/modernizr.custom.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/PageTransitions/default.css" />
	<link rel="stylesheet" type="text/css" href="css/PageTransitions/component.css" />
	<link rel="stylesheet" type="text/css" href="css/PageTransitions/animations.css" />
	<script src="js/PageTransitions/modernizr.custom.js"></script>
<style type="text/css">
#div1{
	position:absolute;
	background:red;
	left:19.3%;
	top:31%;
	width:180;
	height:180;
	z-index:1000;
}
#div2{
	position:absolute;
	background:red;
	left:43.5%;
	top:31%;
	width:180;
	height:180;
	z-index:1000;
}
#div3{
	position:absolute;
	background:red;
	left:67.6%;
	top:31%;
	width:180;
	height:180;
	z-index:1000;
}
#div4{
	position:absolute;
	left:25%;
	top:72%;
	width:840;
	height:180;
	z-index:1000;
	visibility:hidden;
}
#div5{
	position:absolute;
	left:25%;
	top:72%;
	width:840;
	height:180;
	z-index:1000;
	visibility:hidden;
}
#div6{
	position:absolute;
	left:25%;
	top:72%;
	width:840;
	height:180;
	z-index:1000;
	visibility:hidden;
}
</style>
<script type="text/javascript">
function over1(){
	var divV1 = document.getElementById("div4");
	var divV2 = document.getElementById("div5");
	var divV3 = document.getElementById("div6");
	divV1.style.visibility = "visible";
	divV2.style.visibility = "hidden";
	divV3.style.visibility = "hidden";
}
function over2(){
	var divV1 = document.getElementById("div4");
	var divV2 = document.getElementById("div5");
	var divV3 = document.getElementById("div6");
	divV1.style.visibility = "hidden";
	divV2.style.visibility = "visible";
	divV3.style.visibility = "hidden";
}
function over3(){
	var divV1 = document.getElementById("div4");
	var divV2 = document.getElementById("div5");
	var divV3 = document.getElementById("div6");
	divV1.style.visibility = "hidden";
	divV2.style.visibility = "hidden";
	divV3.style.visibility = "visible";
}
</script>
	</head>
<body>
<div id='cssmenu' style="top:0">
<ul>
	<li class='has-sub'><a href="main_new.php">首頁</a>
   <li class='has-sub'><a href="function.php">功能</a>
   <li class='has-sub'><a href='#'><span>通知</span></a>
      <ul>
	  <?php
		$query_n="SELECT uid1, n_content, pid FROM notice WHERE uid2 = $uid ORDER BY nid DESC";
		$result_n = mysqli_query($link, $query_n);
		while($row_n=mysqli_fetch_assoc($result_n))
		{
			$uid_n=$row_n['uid1'];
			$pid_n[]=$row_n['pid'];
			$n_content[]=$row_n['n_content'];
			$query_a="SELECT account FROM user WHERE uid = $uid_n";
			$result_a = mysqli_query($link, $query_a);
			while($row_a=mysqli_fetch_assoc($result_a))
				$account_n[]=$row_a['account'];
		}
		for($n=0;$n<count($account_n);$n++)
		{
			if($n==count($account_n)-1)
			{
				if($pid_n[$n]==0)
					echo "<li class='last'><a href='personal.php?account=$account_n[$n]'><span>$account_n[$n]$n_content[$n]</span></a></li>";
				else
					echo "<li class='last'><a href='photo.php?pid=$pid_n[$n]'><span>$account_n[$n]$n_content[$n]</span></a></li>";
			}
			else
			{
				if($pid_n[$n]==0)
					echo "<li><a href='personal.php?account=$account_n[$n]'><span>$account_n[$n]$n_content[$n]</span></a></li>";
				else
					echo "<li><a href='photo.php?pid=$pid_n[$n]'><span>$account_n[$n]$n_content[$n]</span></a></li>";
			}
		}	
	  ?>
      </ul>
	  	  <?php echo "<li class='has-sub'><a href='personal.php?account=$account_bar'><span>$account_bar</span></a>";?>

   </li>
</ul>
</div>

<div id="pt-main" class="pt-perspective">
	<div class="pt-page pt-page-1" style="background-image:url(image/recommend/p-recommendu.jpg);background-repeat: no-repeat;position:absolute;left:50%;margin-left:-683">
		<?php
			$query_user="SELECT uid , count(*) FROM ratings WHERE uid!= $uid AND pid IN (SELECT pid FROM ratings WHERE uid = $uid) group by uid ORDER BY count(*) DESC LIMIT 3";
			$result_user= mysqli_query($link, $query_user);
			$j=0;$q=0;$i=0;
			while($row_user=mysqli_fetch_assoc($result_user))
			{
				$uid_user[$i]=$row_user['uid'];
				$query_user3="SELECT account FROM user WHERE uid = $uid_user[$i]";
				$result_user3= mysqli_query($link, $query_user3);
				while($row_user3=mysqli_fetch_assoc($result_user3))
				{
		 	   		$account[]=$row_user3['account'];
					//echo $account;
				}
				
				$query_user2="SELECT pid FROM ratings WHERE uid = $uid_user[$i] AND pid IN (SELECT pid FROM ratings WHERE uid = $uid) LIMIT  4";
				$result_user2= mysqli_query($link, $query_user2);
				while($row_user2=mysqli_fetch_assoc($result_user2))
				{
					$pid[$j]=$row_user2['pid'];
					$j=$j+1;
				}
				$num[]=$j;
				$q+=1;
				$i=$i+1;
			}
			for($a=0;$a<count($account);$a++)
			{
				$d=$a+1;
				$d2=$a+4;
				if(isset($uid_user[$a]));
				{
					$file = "http://localhost/head/{$uid_user[$a]}.jpg";
					$file_headers = @get_headers($file);
					if($file_headers[0] == 'HTTP/1.1 404 Not Found')
						echo "<div id='div{$d}' ><a href='personal.php?account=$account[$a]' onMouseOver='over{$d}()'><img src='head/default.jpg' width=180 height=180/></a><br/><br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$account[$a]</div>";
					else 	
						echo "<div id='div{$d}'><a href='personal.php?account=$account[$a]' onMouseOver='over{$d}()'><img src='head/{$uid_user[$a]}.jpg' width=180 height=180/></a><br/><br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$account[$a]</div>";
				}
				if($a==0)
				{
					echo "<div id='div{$d2}'>";
					for($b=0;$b<$num[$a];$b++)
					{
						echo "<img src='upload_photo/$pid[$b].jpg' width=150 height=150/>";
						echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
					}
					echo "</div>";
				}
				else
				{
					echo "<div id='div{$d2}'>";
					for($b=$num[$a-1];$b<$num[$a];$b++)
					{
						echo "<img src='upload_photo/$pid[$b].jpg' width=150 height=150/>";
						echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
					}
					echo "</div>";
				}
			}
			
		?>
	</div>
	<div id=div4></div>
	<?php
	$query_pho="SELECT pid FROM photo WHERE type = '0' ORDER BY RAND() LIMIT 4";
	$result_pho= mysqli_query($link, $query_pho);
	while($row_pho=mysqli_fetch_assoc($result_pho))
	{
		$pid_pho=$row_pho['pid'];
	}
	if(isset($account[0]))
	{
		echo "<div style='position:absolute;width:250;height:250'><img src='head'>";
	}
	else if(isset($account[1]))
	{
	}
	else if(isset($account[2]))
	?>
	</div>
</div>
		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/PageTransitions/jquery.dlmenu.js"></script>
		<script src="js/PageTransitions/pagetransitions.js"></script>
</body>
</html>