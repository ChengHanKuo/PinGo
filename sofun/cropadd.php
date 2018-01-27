<?php
		$dbname="sofun";
		$link=@mysqli_connect('localhost','root','tw123456',$dbname);
		mysqli_query($link,'SET CHARACTER SET utf8_bin');      
		mysqli_query($link,"'SET collation_connection ='utf8_bin'");
		mysqli_query($link,"SET NAMES UTF8"); 
		header("Content-Type:text/html; charset = utf8");

?>

<html>

<head>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="https://googledrive.com/host/0B6dtn0LtYgFgUUFtMzhOWHpyQ0k/jquery-1.7.2.min.js"></script>
<script type="text/javascript">	

	var pid = <?php echo $_GET['pid']?>;
	var lat = <?php echo $_GET['lat']?>;
	var lon = <?php echo $_GET['lon']?>;
	var LatLng = new google.maps.LatLng(lat,lon);
	var geocoder = new google.maps.Geocoder(); 

  					geocoder.geocode({'latLng': LatLng}, function(results, status) //11/23·s¼W
					{
						if (status == google.maps.GeocoderStatus.OK) 
						{
						//alert(results[0].formatted_address);
						var add= results[0].formatted_address;
						location.href="cropadd.php?add="+add+"&pid="+pid;	
						}
					});
  
   
  </script>

</head>
<body>
<?php
header("Content-Type:text/html; charset = utf8");


if(isset($_GET['add'])){
				
		$pid=$_GET['pid'];
		$add=$_GET['add'];
		//$add2=iconv("big5","utf-8",$add);
		$query = "UPDATE `photo` SET `location` = '$add' WHERE `pid` = '$pid'";
		$result = mysqli_query($link, $query);
		if($result){
		
		$name = "{$pid}.jpg";
		header("Location:crop.php?name=$name");
		}        
}
?>

</body>

</html>  
 

         