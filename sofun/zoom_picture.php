<?php  
session_start();
$uid=$_SESSION['uid'];
$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");


if (isset($_GET['pid']))
{
	$pid = $_GET['pid'];
	$query2 = "SELECT `latitude`, `altitude` FROM photo WHERE `pid` = '$pid'";
	$result2 = mysqli_query($link,$query2);
	while($row2 = mysqli_fetch_assoc($result2))
	{
		$lat = $row2['latitude'];
		$lon = $row2['altitude'];
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta charset="utf-8">
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px }
  #map_canvas { height: 100% }
</style>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="markerclusterer.js"></script>
<script type="text/javascript" src="https://googledrive.com/host/0B6dtn0LtYgFgUUFtMzhOWHpyQ0k/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
  var map;
  var MarkAry = [];	   //要查詢的位址資料陣列
  var marker = [];     //要查詢的位址資料陣列，對應的標記Marker資訊
  var infowindow = new google.maps.InfoWindow();  
  var geocoder = new google.maps.Geocoder();
   
$(document).ready(function() { 
	SetData(initialize);//初次載入頁面讀取預設地址資料供地圖使用

});
  
  
  function initialize(MarkAry) 
  {

	var lat = "<?php echo $lat;?>";
	var lon = "<?php echo $lon;?>";
//	console.log(MarkAry);
	marker = [];//重設欲查詢的地址資料時需確認marker為空
    var latlng = new google.maps.LatLng(lat,lon); //台灣緯度Latitude、經度Longitude：23.973875,120.982024
    var minZoomLevel=4;
    var mapOptions = {
      zoom: 16,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
    
    google.maps.event.addListener(map, 'zoom_changed',
    function() {
    if (map.getZoom() < minZoomLevel) map.setZoom(minZoomLevel);});
    
	//顯示MarkAry中地點標記
	for ( var index in MarkAry )
	{				
		//設定各查詢位址的標記Marker
		marker[index] = new google.maps.Marker({		  
		  position: new google.maps.LatLng(MarkAry[index][1],MarkAry[index][2]),
		  title:MarkAry[index][0],
		  map:map		//要顯示標記的地圖
		});	
		//設定 各標記點Marker的click事件		
		google.maps.event.addListener(marker[index], 'click', function() {
			ShowInfo(map , this);			
		});
		
	}
	
	//設定當user縮放地圖時，若存在資訊視窗則關閉資訊視窗
	google.maps.event.addListener(map, 'zoom_changed', function() {
		if (infowindow){ infowindow.close(); }
	});
  
	var markerCluster = new MarkerClusterer(map, marker);
  }

  function SetData(callback)
  {
	var lat = "<?php echo $lat;?>";
	var lon = "<?php echo $lon;?>";
	MarkAry = [];//重設欲查詢的地址資料時需確認MarkAry為空
	var aryData = ['('+lat+','+lon+')'];//lat.split(",");
  $.each
	(
	aryData,function(key,value)
	{//console.log(key);console.log(value);
		geocoder.geocode
		(
			 {
			  'address':value
			 },
			 function (results,status) 
			 {
				//i++;
				if(status==google.maps.GeocoderStatus.OK) 
				{
			
				   var thisData = [value,lat,lon];//obj.lat(),obj.lng()];
				   //MarkAry.push(thisData); //直接使用push似乎會由於非同步回傳結果時間的不同，導致順序與地址輸入框內不同
				   MarkAry[key] = thisData;	 //將push方式改為直接設定陣列的index再去塞值，如此MarkAry的順序跟地址輸入框內才相同
				}
				
				//if ( i==lengthData ){ callback(MarkAry); }
				callback(MarkAry);
			 }
		 );
	}
	);		
  }
  
  function ShowInfo(mapObj , markerObj)
  {//開啟資訊視窗
  infowindow.setContent(InfoContent(markerObj));
  infowindow.open(mapObj,markerObj); 
   			
  }
    
  function InfoContent(markerObj)
  {//設定資訊視窗內容要呈現什麼
	 //html = "<div>縣市：<font color='blue'>" + markerObj.title + "</font></div>";
   var html2="";
   var latlng = new google.maps.LatLng(markerObj.getPosition().lat(), markerObj.getPosition().lng());
    geocoder.geocode(
   {'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[1]) {        
        html2 = "<div>地址：<font color='blue'>"+results[0].formatted_address+"</font></div>";
        html = "<div><?php echo"<img src='http://140.127.220.144/upload_photo/$pid.jpg' width='200' height='150'/>"?></div>";
      	html+=html2;
      }
    } 
  }
  );
	 html += "<div>緯度：<font color='blue'>" + markerObj.getPosition().lat() + "</font></div>";
	 html += "<div>經度：<font color='blue'>" + markerObj.getPosition().lng() + "</font></div>";

   return html;
  }
   
</script>
</head>
<body>
  <div id="map_canvas" style="width:100%; height:100%;"></div>
  <div id="left" style="width:0%; height:0%;">
	<div id="setData">	
		<!--<div><input type="button" value="重新設定查詢資料" name="reSetData" id="reSetData"></div>-->
	</div>
  </div>
</body>
</html>