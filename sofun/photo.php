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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="css/style_notice.css" />
        <link rel="stylesheet" type="text/css" href="css/menu.css" media="screen">
<script type="text/javascript">

</script>
<link rel="stylesheet" type="text/css" href="css/default (2).css" />
		<link rel="stylesheet" type="text/css" href="css/component (2).css" />
</head>
<body background="image/p-onlypic.jpg" style="overflow-y: hidden; overflow-x: hidden;">
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
<div><iframe src="collect_action.php" name="collect" width="500" height="500" style="display:none"></iframe></div>
<div><iframe src="share.php" name="share" width="500" height="500" style="display:none"></iframe></div>
<?php
if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];
	$query="SELECT * FROM photo WHERE pid = $pid";
	$result = mysqli_query($link, $query);
	while($row=mysqli_fetch_assoc($result))
	{
		$uid1=$row['uid'];
		$lon=$row['altitude'];
		$lat=$row['latitude'];
		$time= $row['time'];
		$description= $row['description'];
		$type=$row['type'];
		$query_a="SELECT account FROM user WHERE uid = $uid1";
			$result_a = mysqli_query($link, $query_a);
			while($row_a=mysqli_fetch_assoc($result_a))
				$account=$row_a['account'];
	}
	$mod=$type+1;
	$n="";
	echo "<br><div id='ratings0' style='margin-left:25%;margin-top:70;'></div>	
			<div style='position:absolute;margin-left:25%;margin-top:5%;'><img src='image/mood/{$mod}b.png'/></div>";
	echo "<div style='position:absolute;left:50%;top:45% ;margin-left:-210;margin-top:-200;'><img src='upload_photo/{$pid}.jpg' width=400 height=300></div>";
	echo "<div><button class='md-trigger' data-modal='b0' style='background-image:url(image/collect/b-car.png);width:59px;height:59px;position:absolute;top:48%;left:900';></button></div>
		<div style='position:absolute;left:900;top:35%'><a href='collect_action.php?pid=$pid' target='collect'><img src='image/win/b-book.png' width=59 height=59></a></div>
		<div style='position:absolute;left:900;top:21%'><a href='share.php?pid=$pid' target='share'><img src='image/win/b-share.png' width=59 height=59></a></div></div>
		<div style='position:absolute;left:750;top:60%'><font size=1 color=white face='微軟正黑體'>{$time} </font></div>
		<div style='position:absolute;left:500;top:65%'><font size=4 color=white face='微軟正黑體'>{$account} </font></div>
		<div style='position:absolute;left:600;top:65%; width:250'><font size=4 color=white face='微軟正黑體'>$description </font></div>
		<div style='position:absolute;left:500;top:75%;width:380;height:100;background:;'>
			<iframe src='comment.php?pid=$pid' width='100%' height='100%' name='comment' frameborder='0' style='border-top-right-radius: 7px;border-top-left-radius: 7px;border-bottom-right-radius: 7px;border-bottom-left-radius: 7px;'></iframe>
		</div>
		<div style='position:absolute;left:500;top:90%;'><form  method='post' action='comment.php?pid=$pid' target='comment'>
			<input type='textarea' id='content' name='content' onclick='javascript: this.value=$n' size='52'/>
			<input type='submit' name='button' value='留言'/>
		</form></div>";
	
	echo 		"<div class='md-modal2 md-effect-1' id='b0'>
						<div class='md-content'>
						<h3>帶我去玩</h3>
						<div>
						<iframe src='SetFrom.php?destination={$lat},{$lon}' width='720' height='400' name='map' style='position:left:100' scrolling='NO' frameborder='0'></iframe>
						<button class='md-close'>Close me!</button>
						</div>
						</div>
						</div>";
}
?>
<div class="md-overlay"></div><!-- the overlay element -->

		<!-- classie.js by @desandro: https://github.com/desandro/classie -->
		<script src="js/classie.js"></script>
		<script src="js/modalEffects.js"></script>

		<!-- for the blur effect -->
		<!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>
		<script src="js/cssParser.js"></script>
		<script src="js/css-filters-polyfill.js"></script>
</body>
</html>