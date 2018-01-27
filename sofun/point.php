<?php
session_start();
$uid = "100000001";
//$_SESSION['test']=0;

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");


$c = mysql_connect("localhost", "root", "tw123456");
$db = mysql_select_db("sofun", $c);

$ratings = 'ratings';
?>
<script>
function reply_click(clicked_id){

var value=clicked_id; // alert(clicked_id)
//location.href="main_new.php?#none_value=" +value;
var data = 'value='+value;

$.ajax({
type: 'POST',
url: 'key.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings").html(e); //REPLACES THE TEXT OF view.php
}
});
}
</script>
<?php
		if($value ){
		echo '<br><br><br><div id="ratings">'.$m.'</div>';
		   $l = 'http://wcetdesigns.com/images/buttons/l_color_shadow.png';
		$m = '<img id="like" onClick="rate($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
?>


<div id='apDiv1' onmouseover='this.style.opacity=1;this.filters.alpha.opacity=100;'    
	onMouseOut='this.style.opacity=0.7;this.filters.alpha.opacity=70;'
	style='opacity: 0.7;filter:Alpha(Opacity=70)'><button id='1' onclick='reply_click(this.id)' class='md-trigger' data-modal='a1'>123</button></div>

<div id='apDiv1' onmouseover='this.style.opacity=1;this.filters.alpha.opacity=100;'    
	onMouseOut='this.style.opacity=0.7;this.filters.alpha.opacity=70;'
	style='opacity: 0.7;filter:Alpha(Opacity=70)'><button id='2' onclick='reply_click(this.id)' class='md-trigger' data-modal='a1'>12</button></div>
	<div id='apDiv1' onmouseover='this.style.opacity=1;this.filters.alpha.opacity=100;'    
	onMouseOut='this.style.opacity=0.7;this.filters.alpha.opacity=70;'
	style='opacity: 0.7;filter:Alpha(Opacity=70)'><button id='3' onclick='reply_click(this.id)' class='md-trigger' data-modal='a1'>3</button></div>
	<div id='apDiv1' onmouseover='this.style.opacity=1;this.filters.alpha.opacity=100;'    
	onMouseOut='this.style.opacity=0.7;this.filters.alpha.opacity=70;'
	style='opacity: 0.7;filter:Alpha(Opacity=70)'><button id='4' onclick='reply_click(this.id)' class='md-trigger' data-modal='a1'>123</button></div>

