//<![CDATA[
var myMap;
var myMarker

function readURL(input)
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


function setMapResolution()  
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
