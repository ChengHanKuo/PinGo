<html>
<head>
<?php 
session_start();     
//$destination=$_POST['destination'];
unset($_SESSION['destination']);
$destination=$_GET['destination'];
$_SESSION['destination']=$destination;
//$destination;
?>

<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta charset="utf-8">
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0 20%; padding: 0px }
  #map_canvas { height: 100% }
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
		//$("#NowLatLng").html("【移動標記點後的位置】緯度：" + LatLng.lat() + "經度：" + LatLng.lng());
    document.getElementById("inLat").value=LatLng.lat();   //  11/8新增
    document.getElementById("inLng").value=LatLng.lng();
	//alert(document.getElementById("inLng").value);
	//alert(document.getElementById("inLat").value);
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
			   //$("#SearchLatLng").html("【您輸入的地址位置】緯度：" + LatLng.lat() + "經度：" + LatLng.lng());
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
		//$("#NowLatLng").html("【移動標記點後的位置】");
	});	
  });
</script>
</head>
<body background="image/p-gogogo.jpg" onload="initialize() " style="overflow-y: hidden; overflow-x: hidden;">  

  <div style="height:150;margin-top:100;">
	<div><img src="image/i-loc.png"/><input type="text" id="address_val" name="address_val" style="width:400px;" ></div>
	
  
	<form action="route.php" method="POST">
	<input id="inLat" name="inLat" type="hidden" size="20" value="" />
	<input id="inLng" name="inLng" type="hidden" size="20" value="" />
	<input type="submit"  value="送出" />
   </form></div>
  <div id="map_canvas" style="height:60%;"></div>  
</body>
</html>