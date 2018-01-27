<?php
//session_start();
//$uid=$_SESSION['uid'];

$dbname="sofun";
$link=@mysqli_connect('localhost','root','root',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"SET collation_connection ='utf8_bin'");

$c = mysql_connect("localhost", "root", "tw123456");
$db = mysql_select_db("sofun", $c);

$ratings = 'ratings';
$ratings1='ratings';

$query_account="SELECT account FROM user WHERE uid = $uid";
$result_account = mysqli_query($link, $query_account);
while($row_account=mysqli_fetch_assoc($result_account))
	$account_bar=$row_account['account'];
?>
<html>
	<head>
		<meta charset="UTF-8" />
		
		<link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/CreativeCSS3AnimationMenus/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/CreativeCSS3AnimationMenus/style10.css" />
        <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
		 <link rel="stylesheet" type="text/css" href="css/menu.css" media="screen">
		 <link rel="stylesheet" type="text/css" href="css/style_notice.css" />

	</head>
	<body>
	<div id='cssmenu'>
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
		<ul class="ca-menu" style="position:absolute;top:50%;left:50%;margin-left:-420;margin-top:-125;">
                    <li>
                        <a href="upload.php">
                            <span class="ca-icon">I</span>
                            <div class="ca-content">
                                <h2 class="ca-main">上傳<br/>Upload</h2>
                                <h3 class="ca-sub">Upload your photo!</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="search.php">
                            <span class="ca-icon">L</span>
                            <div class="ca-content">
                                <h2 class="ca-main">搜尋<br/>Search</h2>
                                <h3 class="ca-sub">Upload your photo!</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="collect.php">
                            <span class="ca-icon" id="heart">R</span>
                            <div class="ca-content">
                                <h2 class="ca-main">收藏<br/>Collect</h2>
                                <h3 class="ca-sub">Understanding visually</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="recommend.php">
                            <span class="ca-icon">K</span>
                            <div class="ca-content">
                                <h2 class="ca-main">推薦<br/>Recommend</h2>
                                <h3 class="ca-sub">Professionals in action</h3>
                            </div>
                        </a>
                    </li>
				</ul>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

		</div><!-- /container -->
	</body>
</html>