<html>
<head>
<?php   
session_start();   
$destination= $_SESSION['destination']; //pEnd目的地座標
$lat=$_POST['inLat']; 
$lon=$_POST['inLng']; //pFrom經緯度
//$destination="(24.233,120.64699)";
//echo $destination;
//echo "</br>";
?>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="https://googledrive.com/host/0B6dtn0LtYgFgUUFtMzhOWHpyQ0k/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

  var directionsDisplay;
  var directionsService = new google.maps.DirectionsService();     //取得google導航服務
  var map;
  var oldDirections = [];
  var currentDirections = null;
  
  var lat = <?php echo $lat ?>;
  var lon = <?php echo $lon ?>; 
  var start = new google.maps.LatLng(lat,lon);
  var end = '<?php echo $destination?>';
  
  function initialize() {   

	
    var myOptions = {
      zoom: 13,     
      center: start, //定位在開始點
      mapTypeId: google.maps.MapTypeId.ROADMAP      
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    directionsDisplay = new google.maps.DirectionsRenderer({
        'map': map,
        'preserveViewport': true,
        'draggable': true
    });    
    directionsDisplay.setPanel(document.getElementById("directions_panel"));
    google.maps.event.addListener(directionsDisplay, 'directions_changed',
      function() {
        if (currentDirections) {
          oldDirections.push(currentDirections);         
        }
        currentDirections = directionsDisplay.getDirections();
      });

    calcRoute();
  }

  function calcRoute() {
    var request = {
        origin:start,       //起始地
        destination:end,    //目的地
        travelMode: google.maps.DirectionsTravelMode.DRIVING //旅行工具 WALKING | DRIVING
    };
    directionsService.route(request, function(response, status) {

      if (status == google.maps.DirectionsStatus.OK) {
       directionsDisplay.setDirections(response);
      }
    });
  }

</script>

</head>
<body onload="initialize()">
<div id="map_canvas" style="float:left;width:70%;height:100%"></div>
<div style="float:right;width:30%;height:100%;overflow:auto">
  <div id="directions_panel" style="width:100%"></div>
</div>
</body>
</html>
