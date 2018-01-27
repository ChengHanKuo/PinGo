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
	
	<link rel="stylesheet" type="text/css" href="css/PageTransitions/component.css" />
	<link rel="stylesheet" type="text/css" href="css/PageTransitions/animations.css" />
	<script src="js/PageTransitions/modernizr.custom.js"></script>
	
		<link rel="stylesheet" type="text/css" href="css/menu.css" media="screen"/	>
	<link rel="stylesheet" type="text/css" href="css/style_notice.css" />
</head>
<body style="overflow-y: hidden; overflow-x: hidden;" >
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
<div class="pt-triggers">
		<div id="dl-menu" class="dl-menuwrapper">	
				<ul class="dl-menu" style="list-style-type: none;">
							<li data-animation="1" style="list-style-type: none;" ><a href="#" style='text-decoration:none;color:white;'>搜尋照片/使用者</a></li>
				</ul>
			</div><!-- /dl-menu-wrapper-->
</div>
<div id="pt-main" class="pt-perspective">
	<div class="pt-page pt-page-1" style="background-image:url(image/search/p-search_photo.jpg);background-repeat: no-repeat;position:absolute;left:50%;margin-left:-683">
		<iframe src="search_if.php" style="position:absolute;width:100%;height:100%;top:100;border:none;" id="i_photo"></iframe>
		<div style="position:absolute;left:50;top:27%"><form name='form1' method='post' action='/search_if.php' target="i_photo">
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			關鍵字：  <input name='des' type='text' id='des'/><input type='submit' value='搜尋' /><br/><br/>
			<table width='112'>
			<label>
					<input type='radio' name='type' value='0' />
					<img src="image/mood/1b.png" width=70 height=70></label>
					<label>
					<input type='radio' name='type' value='1' />
					<img src="image/mood/2b.png" width=70 height=70></label>
					<label>
					<input type='radio' name='type' value='2' />
					<img src="image/mood/3b.png" width=70 height=70></label>
					<label>
					<input type='radio' name='type' value='3' />
					<img src="image/mood/4b.png" width=70 height=70></label>
					<label>
					<input type='radio' name='type' value='4' />
					<img src="image/mood/5b.png" width=70 height=70></label>
					<label>
					<input type='radio' name='type' value='5' />
					<img src="image/mood/6b.png" width=70 height=70></label>
					<label>
					<input type='radio' name='type' value='6' />
					<img src="image/mood/7b.png" width=70 height=70></label>
					<label>
					<input type='radio' name='type' value='7' />
					<img src="image/mood/8b.png" width=70 height=70></label>
					<label>
					<input type='radio' name='type' value='8' />
					<img src="image/mood/9b.png" width=70 height=70></label>
					<label>
					<input type='radio' name='type' value='9' />
					<img src="image/mood/10b.png" width=70 height=70></label>
					<label>
					<input type='radio' name='type' value='10' />
					<img src="image/mood/11b.png" width=70 height=70></label>
					<input type='radio' name='type' value='11' />
					<img src="image/mood/12b.png" width=70 height=70></label>
					<input type='radio' name='type' value='12' />
					<img src="image/mood/13b.png" width=70 height=70></label>
					<input type='radio' name='type' value='13' />
					<img src="image/mood/14b.png" width=70 height=70></label>
					
					</table>
			<input name='search' id='search' type='hidden' value='photo' />
		</form></div>
	</div>
	<div class="pt-page pt-page-2" style="background-image:url(image/search/p-search_user.jpg);background-repeat: no-repeat;position:absolute;left:50%;margin-left:-683">
		<iframe src="search_if.php" style="position:absolute;width:100%;height:100%;top:200;border:none;" id="i_search"></iframe>
		<div style="position:absolute;left:40%;top:27%"><form name='form2' method='post' action='/search_if.php' target="i_search">
			<input name='user' type='text' id='user'/>
			<input type='submit' value='搜尋' />
			<input name='search' id='search' type='hidden' value='user' />
		</form></div>
	</div>
</div>
<div class="md-overlay"></div>

		<script src="js/classie.js"></script>
		<script src="js/modalEffects.js"></script>
		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/PageTransitions/jquery.dlmenu.js"></script>
		<script src="js/PageTransitions/pagetransitions.js"></script>
</body>
</html>