<?php
/*121行 cluster註解*/  
session_start();
$uid=$_SESSION['uid'];
$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");

if(isset($_GET['check']))
{
	
	$check = $_GET['check'];
	if ($check=='1')
		$query2 = "SELECT `latitude`, `altitude`, `pid` FROM photo WHERE uid != $uid";
		
	/*else if($check == '2')
		$query2 = "SELECT `latitude`, `altitude` FROM photo WHERE uid = $uid";
	else if($check == '3')
	{
		$uid2 = $_GET['uid2'];
		$query2 = "SELECT `latitude`, `altitude` FROM photo WHERE uid = $uid2";
	}*/
	
	
}
else if(isset($_GET['uid2']))
{
	
	$uid2=$_GET['uid2'];	
	$query2 = "SELECT `latitude`, `altitude` , `pid` FROM photo WHERE uid = $uid2";
}
else
	$query2 = "SELECT `latitude`, `altitude` ,`pid` FROM photo WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = $uid)";

$result2 = mysqli_query($link,$query2);
$pid = array ();
$lat = array ();
$lon = array ();
	while($row2 = mysqli_fetch_assoc($result2))
	{
		$lat[] = $row2['latitude'];
		$lon[] = $row2['altitude'];		
		$pid[] = $row2['pid'];
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/menu.css" media="screen">
<script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px }
  #map_canvas { height: 100% }
</style>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<!--<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAG_4i2swR3KOd-nGYrlrt8RTkyS8SRe_kYPTAbwTumvAqao01PRRUcCtCzTBnNH2kRURGR8RhQQoZ3w" type="text/javascript" ></script>-->
<script type="text/javascript" src="markerclusterer.js"></script>
<script type="text/javascript" src="https://googledrive.com/host/0B6dtn0LtYgFgUUFtMzhOWHpyQ0k/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
  var map;
  var MarkAry = [];	   //要查詢的位址資料陣列
  var marker = [];     //要查詢的位址資料陣列，對應的標記Marker資訊
  var infowindow = new google.maps.InfoWindow();  
  var geocoder = new google.maps.Geocoder();
  var pid= [];
  var html=null;

SetData(initialize); //載入地圖
   
  function initialize(MarkAry) //MarkAry為輸入陣列
{


	marker = [];//重設欲查詢的地址資料時需確認marker為空
    var latlng = new google.maps.LatLng(23.973875,120.982024); //台灣緯度Latitude、經度Longitude：23.973875,120.982024
    var minZoomLevel=4;
    var mapOptions = {
      zoom: 7,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);//顯示MarkAry中地點標記

   	google.maps.event.addListener(map, 'zoom_changed',
    function() {
    if (map.getZoom() < minZoomLevel) map.setZoom(minZoomLevel);});
     
	for ( var index in MarkAry )
	{
      /*var position= new google.maps.LatLng(MarkAry[index][1],MarkAry[index][2]);
       //alert(position);
      geocoder.geocode(
     {'latLng':position}, function(results, status) {
     if (status == google.maps.GeocoderStatus.OK) {     
		  html2 = results[0].formatted_address;
      alert(html2);           
     } 
    })*/
    			
		//設定各查詢位址的標記Marker
		marker[index] = new google.maps.Marker({		  
		position: new google.maps.LatLng(MarkAry[index][1],MarkAry[index][2]),
		title:MarkAry[index][0],
		map:map,
		pid:MarkAry[index][3]//,		//要顯示標記的地圖
	//address:
    });	
		//設定 各標記點Marker的click事件
		google.maps.event.addListener(marker[index], 'click', function() {
		ShowInfo(map, this);
		//alert(MarkAry); //目的在了解從資料庫抓下來的MarkAry
		}); 						
  } 	
	
    google.maps.event.addListener(map, 'zoom_changed', function() {
    infowindow.close();
	  });//設定當user縮放地圖時，若存在資訊視窗則關閉資訊視窗   
	  var markerCluster = new MarkerClusterer(map, marker);
    //以下為變更Cluster icon圖 
    /* var styles=markerCluster.getStyles();
   //console.log(markerCluster.getStyles());
    $(styles).each(function(){
    var obj =($(this))[0];
    obj.url = "./ball_left_pink.png";//直接設定要替換的圖檔url位置
   });*/
      
}     
  
  function SetData(callback)
{

  var pid= "<?php foreach ($pid as $i)echo $i.',';?>";
  var pid2= pid.split(",");
  pid2.splice(pid2.length-1, 1);
 //alert(pid2.splice(pid2.length-1, 1)); 
  
	var lat= "<?php foreach ($lat as $i)echo $i.',';?>";
	var lat2=lat.split(",");
	var lon = "<?php foreach ($lon as $i)echo $i.',';?>";
	var lon2=lon.split(",");
	MarkAry = [];//重設欲查詢的地址資料時需確認MarkAry為空
	
	var aryData = lat2;//[緯度]當作索引值 
  
  //var aryData = lat2+','+lon2; 

  /*aryData= new google.maps.LatLng(lat2,lon2);
  	alert(aryData);*/
  
	$.each(aryData,function(key,value){
  //alert(aryData);  
		geocoder.geocode
		(
			  {'address':value},
			 function (results,status) 
			 {
				if(status==google.maps.GeocoderStatus.OK) 
				{
				
				   var thisData = [value,lat2[key],lon2[key],pid2[key]];
             //alert(value);
             //alert(lat2[key]);
           //alert(results[0].formatted_address);
           //alert(MarkAry);

				   MarkAry[key] = thisData;	 //將push方式改為直接設定陣列的index再去塞值，如此MarkAry的順序跟地址輸入框內才相同
            //alert(MarkAry[key]);
				}
				callback(MarkAry);
			 }
		 );
	}
	);		
}
                                                   

  function InfoContent(markerObj)
  {//設定資訊視窗內容要呈現什麼	 
  //alert(markerObj.pid); 
    
	 var latlng = new google.maps.LatLng(markerObj.getPosition().lat(), markerObj.getPosition().lng());  
   var geocoder = new google.maps.Geocoder(); 
   var pid = markerObj.pid;    
    /*geocoder.geocode(
     {'latLng': latlng}, function(results, status) {
     if (status == google.maps.GeocoderStatus.OK) {       
      html="";
		  //html = "<div>地址：<font color='blue'>"+results[0].formatted_address+"</font></div>";  
      //html+=html2;      
      //html=html2;      
   }});*/
   
   
    
    var abc= 'http://140.127.220.144/upload_photo/'+pid+'.jpg';
    var def= '<img src='+abc+' '+"width='240' height='180'>";
    html=def; //圖片顯示
	
    var markerlatlng = '('+markerObj.getPosition().lat()+","+markerObj.getPosition().lng()+")";    
    
    //alert(markerlatlng);     
                                        //10/22問題: 無法將markerlatlng中空白弄掉 以解決
       
    //以下製作表單
    var form='<form action="SetFrom.php" method="GET" target="_blank">';
    var finsh_form='</form>';
    var url='<input type="hidden" name="destination" value='+markerlatlng+'>'; //傳出地址座標
    var submit='<input type="submit" value="帶我去玩">';
    var url2=form+url+submit+finsh_form;     //製作完成
    //alert(url2);  //測試表單程式碼
    
    html+=url2;
      
    //alert(html);
    //html+='<input type="button" value="帶我去玩" onclick=tag>'                  
    //html += "<div>緯度：<font color='blue'>" + markerObj.getPosition().lat() + "</font></div>";
	  //html += "<div>經度：<font color='blue'>" + markerObj.getPosition().lng() + "</font></div>";     
                             
   return html;
  }

function ShowInfo(mapObj , markerObj)
  {//開啟資訊視窗
   if(infowindow){infowindow.close();}
    //alert(InfoContent(markerObj));
   infowindow.setContent(InfoContent(markerObj));
	 infowindow.open(mapObj,markerObj);   		
  }
</script>
</head>
<body>
<?php
if(!isset($_GET['uid2']))

echo "
<div class='menuContent'>
	<a class='slider'><img alt='' id='bot' src='image/arrow_bottom.png'></a>
	<div id='nav'>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<div><a href='zoom.php'><img src='image/2.png' ></a></div>
		<div><a href='zoom.php?check=1'><img src='image/13.png'></a></div>
		
	</div>
</div>
";?>
  <div id="map_canvas" style="width:100%; height:100%;"></div>
  <div id="left" style="width:0%; height:0%;">
	<div id="setData">
	</div>
  </div>
</body>
</html>