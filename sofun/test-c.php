<?php
session_start();
$uid = $_SESSION['uid'];

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");

$query_name = "SELECT account FROM user WHERE uid = $uid";
$result_name = mysqli_query($link, $query_name);
while($row_name=mysqli_fetch_assoc($result_name))
	$account_user=$row_name['account'];
echo "<a href='frame_p.php'>{$account_user}</a>";
?>
<head>

<script>
function    locking(){
document.all.ly.style.display="block";
document.all.ly.style.width=document.body.clientWidth;
document.all.ly.style.height=document.body.clientHeight;
document.all.Layer2.style.display='block';
}
function    Lock_CheckForm(theForm){
document.all.ly.style.display='none';document.all.Layer2.style.display='none';
return   false;
}
$('.opca'.css("opacity","0.5"))
</script>
<style type="text/css">
<!--
.STYLE1 {font-size: 12px}
a:link {
color: #FFFFFF;
text-decoration: none;
}
a:visited {
text-decoration: none;
}
a:hover {
text-decoration: none;
}
a:active {
text-decoration: none;
}
-->



</style>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body>
<p align="center">

<img src='http://localhost/upload_photo/100000085.jpg' width='100' height='100' alt='$pid' /></a>


<input type="image" src="http://localhost/upload_photo/100000085.jpg" width='100' height='100' onClick="locking()" />
</p>
<div id="ly" style="position: absolute; top: 0px; filter: alpha(opacity=20); background-color: #777;
z-index: 2; left: 0px; display: none;">
</div>




<!--        ¯B°Ê®Ø      -->
<div id="Layer2" align="center" style="position: absolute; z-index: 3; left: expression((document.body.offsetWidth-540)/2); top: expression((document.body.offsetHeight-170)/10);
background-color: #fff; display: none;" >
<table width="540" height="300" border="0" cellpadding="0" cellspacing="0" style="border: 0    solid    #e7e3e7;
border-collapse: collapse ;" >
<tr>
<td style="background-color: #73A2d6; color: #fff; padding-left: 4px; padding-top: 2px;
font-weight: bold; font-size: 12px;" height="10" valign="middle">
<div align="right"><a href=JavaScript:; class="STYLE1" onclick="Lock_CheckForm(this);">[close]</a> &nbsp;&nbsp;&nbsp;&nbsp;</div></td>
</tr>
<tr>
<td height="130" align="center">
</td>
</tr>
</table>
</div>	
</head>

		<?php
			$query = "SELECT pid FROM photo ORDER BY pid desc";
			$result = mysqli_query($link, $query);
			/*while($row=mysqli_fetch_assoc($result))
				{
					/*$query_gps = "SELECT `add` FROM `photo` WHERE pid = $pid";
						$result_gps = mysqli_query($link, $query_gps);
					while($row_gps=mysqli_fetch_assoc($result_gps))
						{
							$add = $row_gps['add'];
						}*/
			$pid=$row['pid'];						
			$newname = "100000085.jpg";
			echo "<li><img src='http://localhost/upload_photo/{$newname}' width='100' height='100' alt='$pid' /></a></li>";
			echo '1223';
				/*	}*/
		?>
				
