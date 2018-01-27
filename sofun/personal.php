<?php
session_start();
header("Content-Type:text/html; charset = utf8");
$uid = $_SESSION['uid'];

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");

$c = mysql_connect("localhost", "root", "tw123456");
$db = mysql_select_db("sofun", $c);

$ratings = 'ratings';
$ratings1='ratings';

$query_account="SELECT account FROM user WHERE uid = $uid";
$result_account = mysqli_query($link, $query_account);
while($row_account=mysqli_fetch_assoc($result_account))
	$account_bar=$row_account['account'];
?>
<html class ="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default (2).css" />
		<link rel="stylesheet" type="text/css" href="css/component (2).css" />
		<link rel="stylesheet" type="text/css" href="css/style_notice.css" />
        <link rel="stylesheet" type="text/css" href="css/menu.css" media="screen">
        <script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
		<script src="js/modernizr.custom.js"></script>
<style type="text/css">
#iframe{
	position:absolute;
	left:50%;
	top:200px;
	z-index:1;
	margin-left:-565px;
	margin-top:-170px;
}
#apDiv1 {
	position:absolute;
	left:50%;
	top:60px;
	width:269.2px;
	height:202.2px;
	z-index:1;
	margin-left:140.1px;
}
#apDiv2 {
	position:absolute;
	left:50%;
	top:60px;
	width:270.2px;
	height:202.2px;
	z-index:1;
	margin-left:414.3px;
}
#apDiv3 {
	position:absolute;
	left:50%;
	top:60px;
	width:269.2px;
	height:202.2px;
	z-index:1;
	margin-left:-135.1px;
}
#apDiv4 {
	position:absolute;
	left:50%;
	top:60px;
	width:269.2px;
	height:202.2px;
	z-index:1;
	margin-left:-409.3px;
}
#apDiv13 {
	background:pink;
	position:absolute;
	left:50%;
	top:60px;
	width:269.2px;
	height:202.2px;
	z-index:1;
	margin-left:-683px;
	margin-top:0px;
}
#apDiv5 {
	position:absolute;
	left:50%;
	top:60px;
	width:269.2px;
	height:202.2px;
	z-index:1;
	margin-left:140.1px;
	margin-top:504.4px;
}
#apDiv6 {
	position:absolute;
	left:50%;
	top:60px;
	width:270.2px;
	height:202.2px;
	z-index:1;
	margin-left:414.3px;
	margin-top:504.4px;

}
#apDiv7{
	position:absolute;
	left:50%;
	top:60px;
	width:269.2px;
	height:202.2px;
	z-index:1;
	margin-left:-135.1px;
	margin-top:503.4px;

}
#apDiv8 {
	position:absolute;
	left:50%;
	top:60px;
	width:269.2px;
	height:202.2px;
	z-index:1;
	margin-left:-409.3px;
	margin-top:503.4px;

}
#apDiv9 {
	position:absolute;
	left:50%;
	top:60px;
	width:276.2px;
	height:204.2px;
	z-index:1;
	margin-left:-683px;
	margin-top:503.4px;
	overflow:hidden;
}
#apDiv14 {
	background:darksalmon;
	position:absolute;
	left:50%;
	top:60px;
	width:175.2px;
	height:288.2px;
	z-index:1;
	margin-left:-550.5px;
	margin-top:209px;
	overflow:hidden;
}
#apDiv15 {
	background:paleturquoise;
	position:absolute;
	left:50%;
	top:60px;
	width:123.2px;
	height:141.1px;
	z-index:1;
	margin-left:-678.5px;
	margin-top:209px;
	overflow:hidden;
}
#apDiv16 {
	background:khaki;
	position:absolute;
	left:50%;
	top:60px;
	width:123.2px;
	height:141.1px;
	z-index:1;
	margin-left:-678.5px;
	margin-top:356px;
	overflow:hidden;
}
#apDiv10 {
	position:absolute;
	left:50%;
	top:60px;
	width:297.2px;
	height:173.2px;
	z-index:1;
	margin-left:388.8px;
	margin-top:207px;
	overflow:hidden;
}
#apDiv11 {
	position:absolute;
	left:50%;
	top:60px;
	width:150.1px;
	height:115.2px;
	z-index:1;
	margin-left:388.8px;
	margin-top:385px;
	overflow:hidden;
}
#apDiv12 {
	position:absolute;
	left:50%;
	top:60px;
	width:150.1px;
	height:115.2px;
	z-index:1;
	margin-left:535.8px;
	margin-top:385px;
	overflow:hidden;
}

#cssmenu{
	position:absolute;
	top:-14px;
	left:0;
}
</style>
<script type="text/javascript">

function reply_click0(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings0").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click1(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings1").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click2(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings2").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click3(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings3").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click4(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings4").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click5(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings5").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click6(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings6").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click7(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings7").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click8(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings8").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click9(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings9").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click10(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings10").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click11(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings11").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click12(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings12").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click13(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings13").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click14(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';
$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings14").html(e); //REPLACES THE TEXT OF view.php
}
});

}
function reply_click15(clicked_id)
{
var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value+'&uid=<?php echo $uid; ?>';

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings15").html(e); //REPLACES THE TEXT OF view.php
}
});

}
</script>
</head>
<body bgcolor="" style="overflow-y: hidden; overflow-x: hidden;">
<!--<button onclick='fun();this.disabled=true'><img src='image/car.gif' width=60 height=40></button>-->
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
</div><div><iframe src="collect_action.php" name="collect" width="500" height="500" style="display:none"></iframe></div>
<?php
$account=$_GET['account'];
$query = "SELECT * FROM photo WHERE uid IN (SELECT uid FROM user WHERE account = '$account') ORDER BY RAND() LIMIT 12";
$result = mysqli_query($link, $query);
$c='0';
while($row=mysqli_fetch_array($result))
{
		$array[$c]=$row['pid'];
		$location[$c]=$row['location'];
		$lon[$c]=$row['altitude'];
		$lat[$c]=$row['latitude'];
		$time[$c]= $row['time'];
		$description[$c]= $row['description'];
		$type[$c]=$row['type'];
		$uid1=$row['uid'];
	
		$c = $c + '1';
}
$query_user="SELECT * FROM user_profile WHERE uid = $uid1";
$result_user = mysqli_query($link, $query_user);
while($row_user=mysqli_fetch_array($result_user))
{
	$name=$row_user['name'];
	$sex=$row_user['sex'];
	$birthday=$row_user['birthday'];
	$email=$row_user['email'];
}
//echo "<div id='apDiv1'><img src='upload_photo/{$array[0]}.jpg' width='269.2' height='202.2'/></div>";

		$href='"collect_action.php"';
	//	$size = count($pid);
		for($a=0;$a<$c;$a++)
	{
		$mod=$type[$a]+1;
		echo "<div class='md-modal md-effect-1' id='a{$a}'><div class='md-content'>
		<h3><a href='personal.php?account={$account}' style='text-decoration:none;color:white;'>{$account}</a></h3>
		<div>
					<div style='position:absolute;margin-left:78'><p><img src=upload_photo/{$array[$a]}.jpg width=240 height=180/></p></div>
				<ul>";
				$pid = $array[0];
		echo "<br><div id='ratings{$a}' style='margin-left:-20;margin-top:70;'></div>	
			<div style='position:absolute;margin-left:-40;margin-top:-150;'><img src='image/mood/{$mod}b.png'/></div>";

		
		echo		"</br></br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<font size=1>{$time[$a]} </font></br></br>
						{$account}</br>
						<div style='position:absolute;left:140;top:333;width:300;height:30;'>{$description[$a]}</div>
						<div style='position:absolute;left:53;top:65%;width:380;height:100;background:;'>
							<iframe src='comment.php?pid=$array[$a]' width='100%' height='100%' name='comment{$a}' frameborder='0' style='border-top-right-radius: 7px;border-top-left-radius: 7px;border-bottom-right-radius: 7px;border-bottom-left-radius: 7px;'></iframe>
						</div>
						<br/><br/><br/><br/><br/><br/><br/><br/>
						<form  method='post' action='comment.php?pid=$array[$a]' target='comment{$a}'>
								<input type='textarea' id='content' name='content' onclick='javascript: this.value=$n'/>
								<input type='submit' name='button' value='留言'/>
						</form>
						</ul>	
						<button class='md-close'>Close me!</button>
						<!--<div><button class='md-trigger' data-modal='b{$a}' style='background-image:url(image/collect/b-car.png);width:59px;height:59px;position:absolute;top:220;left:360';></button></div>-->
						<div style='position:absolute;top:220;left:360';><a href='SetFrom.php?destination={$lat[$a]},{$lon[$a]}'><img src='image/collect/b-car.png' width='59' height='59' border='0'></a></div>
						<div style='position:absolute;left:360;top:160'><a href='collect_action.php?pid=$array[$a]' target='collect'><img src='image/win/b-book.png' width=59 height=59></a></div>
						<div style='position:absolute;left:360;top:100'><a href='share.php?pid=$array[$a]' target='share'><img src='image/win/b-share.png' width=59 height=59></a></div>
						<!--<a href='add_friend.php'><img src='image/b-addc1-1.png' width='39' height='39' border='0'></a>-->
						</div>
						</div>
						</div>";
			echo 		"<div class='md-modal2 md-effect-1' id='b{$a}'>
						<div class='md-content'>
						<h3>帶我去玩!!</h3>
						<div>
						<iframe src='SetFrom.php?destination={$lat[$a]},{$lon[$a]}' width='720' height='400' name='map' style='position:left:100' scrolling='NO' frameborder='0'></iframe>
						<button class='md-close'>Close me!</button>
						</div>
						</div>
						</div>";
		
	}
						
for($i=0;$i<$c;$i++)
{
	if($i==9)
		$button="<button id={$i} onclick='reply_click{$i}(this.id)' class='md-trigger' data-modal='a{$i}'><img src='upload_photo/{$array[$i]}.jpg' width='289.2' height='216.9'/></button>";
	else if($i>9)
		$button="<button id={$i} onclick='reply_click{$i}(this.id)' class='md-trigger' data-modal='a{$i}'><img src='upload_photo/{$array[$i]}.jpg' width='142.1' height='113.5'/></button>";
	else
		$button="<button id={$i} onclick='reply_click{$i}(this.id)' class='md-trigger' data-modal='a{$i}'><img src='upload_photo/{$array[$i]}.jpg' width='269.2' height='202.2'/></button>";
	$j=$i+1;
	echo "<div id='apDiv{$j}' onmouseover='this.style.opacity=1;this.filters.alpha.opacity=100;'    
	onMouseOut='this.style.opacity=0.7;this.filters.alpha.opacity=70;'
	style='opacity: 0.7;filter:Alpha(Opacity=70)'>{$button}</div>";
}?>
<div id='apDiv13'>
	<div style="width:185;height:193;background-color:white;margin-left:5px;margin-top:5px;margin-bottom:5px;border-top-right-radius:5px;border-top-left-radius: 5px;border-bottom-right-radius:5px;border-bottom-left-radius: 5px;">
		<?php
		$file = "http://localhost/head/{$uid1}.jpg";
		$file_headers = @get_headers($file);
		if($file_headers[0] == 'HTTP/1.1 404 Not Found')
			echo "<div style='margin-left:5px;margin-top:5px;width=175;height=183'><img src='head/default.jpg' width=175 height=183/><br/></div>";
		else 	
			echo "<div style='position:absolute;margin-left:5px;margin-top:5px;width:175;height:183;'><img src='head/{$uid1}.jpg' width=175 height=183/><br/></div>";
		?>
	</div>
	<div  style='width:69;height:193;margin-left:206px;margin-top:-198.5px;margin-bottom:5px;'>
	<?php
		echo "<font size='100' color='white' face='微軟正黑體'>$name</font>";
	?>
	</div>
</div>
</div>
<div id='apDiv14'>
<?php
	if($sex==0)
		echo "性別：男<br/>";
	else
		echo "性別：女<br/>";
	echo "生日：".$birthday."<br/>";
	echo "e-mail："."<br/>".$email."<br/>";
?>
</div>
<div id='apDiv15'>
<?php
echo "<iframe width='123.2' height='144.1' src='friend_button.php?account=$account' frameborder='0'></iframe>";
?>	
</div>
<div id='apDiv16'>
<?php
$query_id = "SELECT uid FROM user WHERE account = '$account'";
$result_id = mysqli_query($link, $query_id);
while($row_id=mysqli_fetch_assoc($result_id))
{
	$uid2=$row_id['uid'];
}
if($uid2==$uid)
{
	$b_head="\"document.location='/head.php'\"";
	echo "<input type='button' value='大頭貼' onclick=".$b_head.">";
}
?>
</div>
<div id="iframe">
<?php echo "<iframe src='zoom.php?uid2=$uid1' width='750' height='480' name='map' style='position:absolute;top:150;left:195;' scrolling='NO'></iframe>";?>
</div>
	
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