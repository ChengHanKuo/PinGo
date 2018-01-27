<?php 
session_start();
header("Content-Type:text/html; charset = utf8");
$pid=$_SESSION['pid'];
$uid=$_SESSION['uid'];
$name = $_GET['name'];
$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,'SET CHARACTER SET utf8_bin');      
mysqli_query($link,"'SET collation_connection ='utf8_bin'");
mysqli_query($link,"SET NAMES UTF8"); 
?>
<html>
<head>
<title>上傳頁面</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="css/menu.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/style_notice.css" />
<style type="text/css">
  html { height: 100% }
 body { height: 100%; margin: 0 20%; padding: 0px }
  #map_canvas { height: 100% }
#test{
	position:absolute;
	top:50%;
	left:50%;
	margin-left:-200px;
	margin-top:-211px;
}
  

</style>
</style>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="https://googledrive.com/host/0B6dtn0LtYgFgUUFtMzhOWHpyQ0k/jquery-1.7.2.min.js"></script>
<script type="text/javascript">


  var map;
  var marker;
   
  function initialize() 
  {
	//初始化地圖時的定位經緯度設定
    var latlng = new google.maps.LatLng(23.973875,120.982024); //台灣緯度Latitude、經度Longitude：23.973875,120.982024
    //初始化地圖options設定
	var mapOptions = {
      zoom: 14,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
	//初始化地圖
    map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
	//加入標記點
	marker = new google.maps.Marker({
		  draggable:true,
		  position: latlng,
		  title:"台灣 Taiwan",
		  map:map
	});	
	//增加標記點的mouseup事件
	google.maps.event.addListener(marker, 'mouseup', function() {
		LatLng = marker.getPosition();
		$("#NowLatLng").html("【最後的位置】緯度：" + LatLng.lat() + "經度：" + LatLng.lng());
    document.getElementById("inLat").value=LatLng.lat();   //  11/8新增
    document.getElementById("inLng").value=LatLng.lng();
	});
	
  }
  
  function GetAddressMarker()
  {//重新定位地圖位置與標記點位置
	 address = $("#address_val").val();
	 geocoder = new google.maps.Geocoder();
	 geocoder.geocode(
		 {
		  'address':address
		 },function (results,status) 
		 {
			if(status==google.maps.GeocoderStatus.OK) 
			{
			   //console.log(results[0].geometry.location);
			   LatLng = results[0].geometry.location;
			   map.setCenter(LatLng);		//將地圖中心定位到查詢結果
			   marker.setPosition(LatLng);	//將標記點定位到查詢結果
			   marker.setTitle(address);	//重新設定標記點的title
			   $("#NowLatLng").html("【最後的位置】緯度：" + LatLng.lat() + "經度：" + LatLng.lng());  // LatLng.lat()為輸入後的緯度 經度橫之
			document.getElementById("inLat").value=LatLng.lat();   //  11/8新增
			document.getElementById("inLng").value=LatLng.lng();
			}
		 }
	 ); 
  }

  $(document).ready(function() { 
	//綁定地址輸入框的keyup事件以即時重新定位
	$("#address_val").bind("keyup",function(){	
		GetAddressMarker();
		//$("#NowLatLng").html("【最後的位置】");
	});	
  });
  
  
</script>




</head>
<body  background = "image/p-upload.jpg"  onload="initialize()">
<div id='cssmenu'>
<ul>
   <li class='has-sub'><a href="function.php">功能</a>
   <li class='has-sub'><a href='#'><span>通知</span></a>
      <ul>
	  <?php
		$query_n="SELECT uid1, n_content FROM notice WHERE uid2 = $uid ORDER BY nid DESC";
		$result_n = mysqli_query($link, $query_n);
		while($row_n=mysqli_fetch_assoc($result_n))
		{
			$uid_n[]=$row_n['uid1'];
			$n_content[]=$row_n['n_content'];
		}
		for($n=0;$n<count($uid_n);$n++)
		{
			if($n==count($uid_n)-1)
				echo "<li class='last'><a href='#'><span>$n_content[$n]</span></a></li>";
			else
				echo "<li><a href='#'><span>$n_content[$n]</span></a></li>";
		}	
	  ?>
      </ul>
   </li>
</ul>
</div>  
<div id="test">
<style>
body{
background-attachment:fixed;
background-position:center center;
background-repeat:no-repeat;}
</style>
<?php
echo "<img src='upload_photo/{$name}' width='400' heigh='300'/><br/><br/>";
if ((isset($_POST["insert"])) && ($_POST["insert"] == "upload"))//心情輸入後 
{
			
    // echo $address;
      $type = $_POST['type'];
			$description = $_POST['description'];
      //$add=$_POST['address'];
      $lon=$_POST['inLng'];//經
     //echo $lon;      
      $lat=$_POST['inLat']; //緯 
     //echo $lat;
	  
	  //echo "<script>codeAddress();</script>";
	 
      $query = "UPDATE `photo` SET `type` = '$type', `description` = '$description',`altitude` = '$lon', `latitude` = '$lat' WHERE `pid` = '$pid'";
	  $result = mysqli_query($link, $query);
      if($result){
      unset($_SESSION['pid']);   
      header("Location:crop.php?name=$name");
      }                                    
      
}			
	   /*else{
    		echo "資料庫失敗";}*/?>
  <div style="height:;margin-left:-60">
	<div>
	<img src="image/i-upload_loca.png"></br> </br>
	<input type="text"  id="address_val" name="address_val" style="width:400px; outline:none;margin-left:60; ></div>
	<!--<div id="SearchLatLng"></div>-->
	<!--<div id="NowLatLng"> </div>--> 
  </div>
   <div id="map_canvas" style="width:600;height:350;margin-left:-100;"></div> 
	<?php echo "<form action='upload_fix.php?name=$name' method='post'>";?>
	<input id="inLat" name="inLat" type="hidden" size="20" value="" >
	<input id="inLng" name="inLng" type="hidden" size="20" value="" >
	<img src="image/i-upload_mood.png"  style="margin-left:40;" ></br> </br>
	<table width="112">
        <label>
        <input type="radio" name="type" value="0" />
        開心</label>
        <label>
        <input type="radio" name="type" value="1" />
        難過</label>
		    <label>
        <input type="radio" name="type" value="2" />
        生氣</label>
		    <label>
        <input type="radio" name="type" value="3" />
        興奮</label>
		    <label>
        <input type="radio" name="type" value="4" />
        歡樂</label>
		    <label>
        <input type="radio" name="type" value="5" />
        無奈</label><br>
		    </table>
	 </br> </br><img src="image/i-upload_post.png"></br> </br>
        <textarea name="description" cols="45" rows="5" style="margin-left:-10;"></textarea><br>
              
        <input name='insert' id='insert' type='hidden' value='upload' />  
        <input type='image' src='image/b-upload_check.png' alt='Submit' style="margin-left:160;"/>
        </form>  
  
</div>  

</body>
</html>