<?php

$c = mysql_connect("localhost", "root", "tw123456");
$db = mysql_select_db("sofun", $c);

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"SET collation_connection ='utf8_bin'");


$ratings = 'ratings';

session_start();
$uid = $_SESSION['uid'];
$value=$_POST["value"];
$time=$_SESSION['time'];
$location=$_SESSION['location'];
$type=$_SESSION['type'];
$description=$_SESSION['description'];
$array=$_SESSION['array'];
$pid=$array[$value];
$_SESSION['keypid']=$pid;
$_SESSION['keyvalue']=$value;
?>
<script src="http://wcetdesigns.com/assets/javascript/jquery.js"></script>
<script type="text/javascript">
function rate(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data0 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data0,
success: function(e){
$("#ratings0").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate1(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data1 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data1,
success: function(e){
$("#ratings1").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate2(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data2 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data2,
success: function(e){
$("#ratings2").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate3(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data3 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data3,
success: function(e){
$("#ratings3").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate4(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data4 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data4,
success: function(e){
$("#ratings4").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate5(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data5 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data5,
success: function(e){
$("#ratings5").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate6(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data6 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data6,
success: function(e){
$("#ratings6").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate7(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data7 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data7,
success: function(e){
$("#ratings7").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate8(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data8 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data8,
success: function(e){
$("#ratings8").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate9(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data9 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data9,
success: function(e){
$("#ratings9").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate10(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data10 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data10,
success: function(e){
$("#ratings10").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate11(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data11 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data11,
success: function(e){
$("#ratings11").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate12(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data12 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data12,
success: function(e){
$("#ratings12").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate13(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data13 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data13,
success: function(e){
$("#ratings13").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate14(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data14 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data14,
success: function(e){
$("#ratings14").html(e); //REPLACES THE TEXT OF view.php
}
});
}
function rate15(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data15 = 'rating='+rating+'&pid = <?php echo $pid; ?> &uid=<?php echo $uid; ?>&value=<?php echo $value; ?>';
$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data15,
success: function(e){
$("#ratings15").html(e); //REPLACES THE TEXT OF view.php
}
});
}


</script>
<?php

		$pid=$array[$value];	
		if($value==0)
		{
		if($pid){

		?><br><div id="ratings0"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m;
		?></div><?php
		}
	
		else
		{
			echo "Invalid PID";
		}
		}
		
		if($value==1)
		{
		if($pid){

		?><br><div id="ratings1"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate1($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m;
		 ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
		if($value==2)
		{
		if($pid){

		?><br><div id="ratings2"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate2($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m; ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
		
		if($value==3)
		{
		if($pid){

		?><br><div id="ratings3"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate3($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m;
		 ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
		if($value==4)
		{
		if($pid){

		?><br><div id="ratings4"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate4($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m; ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
		
		if($value==5)
		{
		if($pid){

		?><br><div id="ratings5"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate5($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m;
		 ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
		if($value==6)
		{
		if($pid){

		?><br><div id="ratings6"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate6($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m; ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
		
		if($value==7)
		{
		if($pid){

		?><br><div id="ratings7"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate7($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m;
		 ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
		if($value==8)
		{
		if($pid){

		?><br><div id="ratings8"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate8($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m; ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
		
		if($value==9)
		{
		if($pid){

		?><br><div id="ratings9"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate9($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m;
		 ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
				if($value==10)
		{
		if($pid){

		?><br><div id="ratings10"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate10($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m; ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
		
		if($value==11)
		{
		if($pid){

		?><br><div id="ratings11"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate11($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m;
		 ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
		if($value==12)
		{
		if($pid){

		?><br><div id="ratings12"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate12($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m; ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
		
		if($value==13)
		{
		if($pid){

		?><br><div id="ratings13"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate13($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m;
		 ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
		if($value==14)
		{
		if($pid){

		?><br><div id="ratings14"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate14($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m; ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
		
		if($value==15)
		{
		if($pid){

		?><br><div id="ratings15"><?php
		include 'headers.php';
		$m = '<img id="like" onClick="rate15($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		 echo $m;
		 ?></div><?php
		}
		else
		{
			echo "Invalid PID";
		}
		}
?>