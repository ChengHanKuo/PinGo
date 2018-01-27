<?php 
session_start();
header("Content-Type:text/html; charset = utf8");
$pid=$_SESSION['pid'];
$uid=$_SESSION['uid'];
echo "<img src='upload_photo/{$pid}.jpg' width='400' heigh='300'/><br/>";


if ((isset($_POST["insert"])) && ($_POST["insert"] == "upload"))//心情輸入後 
{
	$address=$_POST['address'];
    // echo $address;
    $type = $_POST['type'];
	$description = $_POST['description'];
    //$add=$_POST['address'];
    $lon=(float)sprintf("%.3f", $_POST['inLng']);//經  
    $lat=(float)sprintf("%.3f", $_POST['inLat']); //緯     
	
	$dbname="sofun";
	$link=@mysqli_connect('localhost','root','tw123456',$dbname);
	mysqli_query($link,'SET CHARACTER SET utf8_bin');      
	mysqli_query($link,"'SET collation_connection ='utf8_bin'");
    mysqli_query($link,"SET NAMES 'UTF8'");
	
    $query = "UPDATE `photo` SET `type` = '$type', `description` = '$description',`location`='$address', `altitude` = '$lon', `latitude` = '$lat' WHERE `pid` = '$pid'";
	$result = mysqli_query($link, $query);
    if($result){
    header('Location:main_new.php');
    }                                    
      
}			
   /*else{
    		echo "資料庫失敗";}*/
?>

<html>
<head>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyC3_gZW63Lb1i8oljeSfY-RAf-FjZjs7ig"
      type="text/javascript"></script>
      
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

<script type="text/javascript"> 
//<![CDATA[
var myMap;
var myMarker

function readURL(input)//預覽資料
 {
          if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        //.width(150)
                        //.height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
   }


function setMapResolution()  //設定ZOOM極限大小
 {  
     
    var mapTypes = map.getMapTypes();  
     
   for(var i=0; i<mapTypes.length; i++)  
    {  
        mapTypes[i].getMinimumResolution = function() { return 4; };  
        mapTypes[i].getMaximumResolution = function() { return 11; };  
    }  
 }  
    setMapResolution();

function load() {
	if (GBrowserIsCompatible()) {  //如果browser支援map
		myMap = new GMap2(document.getElementById("my_map"));
    myMap.enableGoogleBar();
		var myLatLng = new GLatLng(22.73432, 120.28527);
		myMap.setCenter(myLatLng, 15);
		myMap.addControl(new GLargeMapControl());
		document.getElementById('inLatLng').value = myLatLng.toString();
		document.getElementById('inLat').value = myLatLng.lat();
		document.getElementById('inLng').value = myLatLng.lng();		
		
		myMarker = new GMarker( myLatLng );
		myMap.addOverlay( myMarker );
		myMap.enableScrollWheelZoom();
	}
}
 
function addressGps() {
	var myGeocoder = new GClientGeocoder();
	var address = document.getElementById('address').value;
	myGeocoder.getLatLng(address, function getRequest( point ){
							if(!point){
								alert('這個地址 Google 說不知道！');
							}else{
								//移動地圖中心點
								myMap.panTo( point );
								//設定標註座標
								myMarker.setLatLng(point);
								document.getElementById('inLatLng').value = point.toString();
								document.getElementById('inLat').value = point.lat();
								document.getElementById('inLng').value = point.lng();
							}
						});
}




//]]>
</script>
</head>
<body onload="load()" onunload="GUnload()">
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 <input type="hidden" name="MAX_FILE_SIZE" value="1000000"  />  
  輸入所在地址︰<input id="address" name="address" type="text" size="40" value="*請在這裡輸入拍攝的位址*" />
	<input name="button" type="button" value="轉換" onclick="javascript:addressGps();" />
	<br>
  座標︰<input id="inLatLng" name="inLatLng" type="text" size="40" value="" />
	<br>
	<input id="inLat" name="inLat" type="hidden" size="20" value="" />
	<input id="inLng" name="inLng" type="hidden" size="20" value="" />
	<div id="my_map" style="width: 500px; height: 500px"></div>

  心情：  <table width="112">
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
 <textarea name="description" cols="45" rows="5"></textarea><br>		

 <input type="submit" value="上傳" /> 
 <input name="insert" id="insert" type="hidden" value="upload" />
 
 
</form>
</body>
</html>