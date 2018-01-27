function Coord2Map()
		{
			var strLat   = document.getElementById('src_latitude').value;  
		        var strLng   = document.getElementById('src_longitude').value;  	        
		        var myLatLng = new GLatLng(strLat, strLng);  		        
						
						gGeocoder.getLocations(myLatLng, function(addresses) 
											{
													if (addresses.Status.code != 200) {
														//alert("此座標沒有找到對應的地址 " + myLatLng.toUrlValue());
														document.getElementById('e_addr_resolved').value = "此座標沒有找到對應的地址: " + myLatLng.toUrlValue();
													} 
													else { 
														var result = addresses.Placemark[0];
														//gmarker.openInfoWindowHtml( result.address );
														gmarker.openInfoWindowHtml(result.address + "<BR><FONT COLOR=#55ccff><SUB>" + myLatLng.toString() + "</FONT></SUB>");
														
														document.getElementById('e_addr_resolved').value = result.address;
													}
													
													showMeFaster("#target_address");
											}
									);
		        
		}//END_OF function Coord2Map()
    
    
    
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



function GPS_GetAddress( response )
{
       // alert( response.Placemark[0].address );
       alert('寫入成功!!');


var GPSDecoder = new GClientGeocoder();

var location_point =  '["lat","lon"]';
location_point = eval( location_point );
GPSDecoder.getLocations( new GLatLng( location_point[0] , location_point[1]  ) , GPS_GetAddress );   
}