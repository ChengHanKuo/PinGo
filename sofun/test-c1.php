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
echo "{$account_user}";

global $pid;

//if (isset($_GET['pid']))
//{
//$pid=$_GET['pid'];
	//echo "<script type='text/javascript'>testMessageBox(event);</script> ";
	//echo "<a href='#none' onclick='testMessageBox(event);'>按我跳出視窗</a>";
//}
global $pid1;
//if (isset($_GET['pid']))
//{
//	$pid1=$_GET['pid'];
//}
//$pid=100000086;
//$query_p = "SELECT pid FROM photo WHERE uid = $uid";
//$result_p = mysqli_query($link, $query_name);
//while($row_p=mysqli_fetch_assoc($result_p))
	//$pid=$row_p['pid'];

?>



<head>
<title></title>
<style>
html,body{font-size:12px;margin:0px;height:100%;}
.mesWindow{border:#666 1px solid;background:#fff;}
.mesWindowTop{border-bottom:#eee 1px solid;margin-left:4px;padding:3px;font-weight:bold;text-align:left;font-size:12px;}
.mesWindowContent{margin:4px;font-size:12px;}
.mesWindow .close{height:15px;width:28px;border:none;cursor:pointer;text-decoration:underline;background:#fff}
</style>
<script>
var isIe=(document.all)?true:false;
//設置select的可見狀態
function setSelectState(state)
{
var objl=document.getElementsByTagName('select');
for(var i=0;i<objl.length;i++)
{
objl[i].style.visibility=state;
}
}

function mousePosition(ev)
{
if(ev.pageX || ev.pageY)
{
return {x:ev.pageX, y:ev.pageY};
}
return {
x:ev.clientX + document.body.scrollLeft - document.body.clientLeft,y:ev.clientY + document.body.scrollTop - document.body.clientTop
};
}
//跳出方法
function showMessageBox(wTitle,content,pos,wWidth)
{
closeWindow();
var bWidth=parseInt(document.documentElement.scrollWidth);
var bHeight=parseInt(document.documentElement.scrollHeight);
if(isIe){
setSelectState('hidden');}
var back=document.createElement("div");
back.id="back";
var styleStr="top:0px;left:0px;position:absolute;background:#666;width:"+bWidth+"px;height:"+bHeight+"px;";
styleStr+=(isIe)?"filter:alpha(opacity=0);":"opacity:0;";
back.style.cssText=styleStr;
document.body.appendChild(back);
showBackground(back,50);
var mesW=document.createElement("div");
mesW.id="mesWindow";
mesW.className="mesWindow";
//mesW.innerHTML="<div class='mesWindowTop'><table width='100%' height='100%'><tr><td>"+wTitle+"</td><td style='width:1px;'><input type='button' onclick='closeWindow();' title='關閉視窗' class='close' value='關閉' /></td></tr></table></div><div class='mesWindowContent' id='mesWindowContent'>"+content+"</div><div class='mesWindowBottom'></div>";
//styleStr="left:"+(((pos.x-wWidth)>0)?(pos.x-wWidth):pos.x)+"px;top:"+(pos.y)+"px;position:absolute;width:"+wWidth+"px;";
mesW.innerHTML="<div class='mesWindowTop'><table width='100%' height='100%'><tr><td>"+wTitle+"</td><td style='width:1px;'><input type='button' onclick='closeWindow();' title='關閉視窗' class='close' value='關閉' /></td></tr></table></div><div class='mesWindowContent' id='mesWindowContent'>"+content+"</div><div class='mesWindowBottom'></div>";
styleStr="left:780px;top:center;position:absolute;width:"+wWidth+"px;";
mesW.style.cssText=styleStr;
document.body.appendChild(mesW);
}
//讓背景漸漸變暗
function showBackground(obj,endInt)
{
if(isIe)
{
obj.filters.alpha.opacity+=1;
if(obj.filters.alpha.opacity<endInt)
{
setTimeout(function(){showBackground(obj,endInt)},5);
}
}else{
var al=parseFloat(obj.style.opacity);al+=0.025;
obj.style.opacity=al;
if(al<(endInt/100))
{setTimeout(function(){showBackground(obj,endInt)},5);}
}
}

//關閉視窗
function closeWindow()
{
if(document.getElementById('back')!=null)
{
document.getElementById('back').parentNode.removeChild(document.getElementById('back'));
}
if(document.getElementById('mesWindow')!=null)
{
document.getElementById('mesWindow').parentNode.removeChild(document.getElementById('mesWindow'));
}
if(isIe){
setSelectState('');}
}
//測試跳出

/*
function testMessageBox(ev)
{	

<?php
$query_name = "SELECT account FROM user WHERE uid = $uid";
$result_name = mysqli_query($link, $query_name);
while($row_name=mysqli_fetch_assoc($result_name))
	$account_user=$row_name['account'];

$query_des="SELECT pid,location,time,description,type FROM photo WHERE pid=$pid1 ";
$result_des=mysqli_query($link, $query_des);
while($row_des=mysqli_fetch_assoc($result_des))
{
	$query_user = "SELECT `account` FROM `user` WHERE uid = $uid";
	$result_user = mysqli_query($link, $query_user);
	while($row1=mysqli_fetch_assoc($result_user))
	{
	//window content
	$accout = $row1['account'];
	$location=$row_des['location'];
	//$pid1=$row_des['pid'];
	$time= $row_des['time'];
	$description= $row_des['description'];
	$type=$row_type['type'];
	//$pid1_new = "{$pid1}.jpg";
	
	
	echo "var objPos = mousePosition(ev);";
	$catch="padding:20px 0 20px 0;text-align:center";
	$image="http://localhost/upload_photo/{$pid}.jpg";
	echo "messContent='<div style={$catch}><image src={$image} width=100 height=100></br>{$type} {$location} {$time} </br> {$description}</div>';";
	//echo "messContent='<div style='padding:20px 0 20px 0;text-align:center'><image src='http://localhost/upload_photo/{$pid1_new}' width='100' height='100'></br> {$type} {$location} {$time} </br> {$description} </div>';";
	echo "showMessageBox('{$account_user}',messContent,objPos,350);";
	}
	}
	
?>
<!--var objPos = mousePosition(ev);-->
<!--messContent="<div style='padding:20px 0 20px 0;text-align:center'>content </div>";-->
<!--showMessageBox('視窗標題',messContent,objPos,350)-->
}*/


</script>
</head>


<body>
<div style="padding:20px">
<!--<div style="text-align:left";><a href="#none" onclick="testMessageBox(event);">按我跳出視窗</a></div>
<div style="text-align:left;padding-left:20px;padding-top:10px";><select ID="Select1" NAME="Select1"><option>下拉</option></select>跳出視窗時會將其隱藏，關閉時會讓其顯示，目的是在IE中防止跳出的DIV擋不住下拉框</div>-->
				<?php
					$query = "SELECT pid FROM photo WHERE uid=$uid ORDER BY pid desc";
					$result = mysqli_query($link, $query);
					
					while($row=mysqli_fetch_assoc($result))
					{
				//	$query_user = "SELECT `account` FROM `user` WHERE uid = $uid";
				//	$result_user = mysqli_query($link, $query_user);
				//		while($row_gps=mysqli_fetch_assoc($result_user))
				//		{
				//			$accout = $row_user['account'];
						
							$pid1 =$row['pid'];
							
						//	$newname = "{$pid1}.jpg";
						//	pid=$row['pid'];
						//	echo "<div style='text-align:center';><a href='#none' onclick='testMessageBox(event);><image src='http://localhost/upload_photo/{$pid1}.jpg' width='100' height='100'></a></div>";						
							echo "<div style='text-align:center';><a href='test-c1.php?pid=$pid1#none' onclick='testMessageBox(event);'><image src='http://localhost/upload_photo/{$pid1}.jpg' width='100' height='100'></a></div>";
				//		}test-c1.php?pid=$pid1
						
					}
					
				?>
<!--<div style="text-align:center";><a href="#none" onclick="testMessageBox(event);"><image src="http://localhost/upload_photo/100000085.jpg" width='100' height='100'></a></div>-->

<!--<div style="text-align:right";><a href="#none" onclick="testMessageBox(event);">按我跳出視窗</a></div>-->

</div>
</body>
</html>


<head>
<script>
function testMessageBox(ev)
{	
<?php
$pid = $_GET['pid'];
$query_name = "SELECT account FROM user WHERE uid = $uid";
$result_name = mysqli_query($link, $query_name);
while($row_name=mysqli_fetch_assoc($result_name))
	$account_user=$row_name['account'];

	$query_des="SELECT pid,location,time,description,type FROM photo WHERE pid=$pid ";
	$result_des=mysqli_query($link, $query_des);
	while($row_des=mysqli_fetch_assoc($result_des))
	{
	//$query_user = "SELECT `account` FROM `user` WHERE uid = $uid";
//	$result_user = mysqli_query($link, $query_user);
//	while($row1=mysqli_fetch_assoc($result_user))
//	{
	//window content
//	$accout = $row1['account'];
	$location=$row_des['location'];
	$pid2=$row_des['pid'];
	$time= $row_des['time'];
	$description= $row_des['description'];
	$type=$row_type['type'];
	//$pid1_new = "{$pid1}.jpg";

//if (isset($_GET['pid']))
//{
//	$pid1=$_GET['pid'];
	
	
	echo "var objPos = mousePosition(ev);";
	$catch="padding:20px 0 20px 0;text-align:center";
	$image="http://localhost/upload_photo/{$pid2}.jpg";
	echo "messContent='<div style={$catch}><image src={$image} width=100 height=100></br>{$type} {$location} {$time} </br> {$description}</div>';";
	//echo "messContent='<div style='padding:20px 0 20px 0;text-align:center'><image src='http://localhost/upload_photo/{$pid1_new}' width='100' height='100'></br> {$type} {$location} {$time} </br> {$description} </div>';";
	echo "showMessageBox('{$account_user}',messContent,objPos,350);";

//	}
	}

?>
<!--var objPos = mousePosition(ev);-->
<!--messContent="<div style='padding:20px 0 20px 0;text-align:center'>content </div>";-->
<!--showMessageBox('視窗標題',messContent,objPos,350)-->
}


</script>
</head>