<?php
session_start();

$uid = $_SESSION['uid'];
header("Content-Type:text/html; charset = utf8");

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");

$query_account="SELECT account FROM user WHERE uid = $uid";
$result_account = mysqli_query($link, $query_account);
while($row_account=mysqli_fetch_assoc($result_account))
	$account_bar=$row_account['account'];
?>
<html>
<head>
<style type="text/css"> 
#test{
	position:absolute;
	top:50%;
	left:50%;
	margin-left:-200px;
	margin-top:-311px;
}
  

.fileInputContainer{
        height:60px;
        width: 60px;
        background:url(image/b-upload.png);
		position:relative;


}
.fileInput{
        height:256px;
        overflow: hidden;
        font-size: 300px;
        position:absolute;
        right:0;
        top:0;
        opacity: 0;
        filter:alpha(opacity=0);
        cursor:pointer;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/style_notice.css" />
<script type="text/javascript"> 
function readURL(input)//預覽照片
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
</script>
<?php
function getGps($exifCoord, $hemi) { 

    $degrees = count($exifCoord) > 0 ? gps2Num($exifCoord[0]) : 0; 
    $minutes = count($exifCoord) > 1 ? gps2Num($exifCoord[1]) : 0; 
    $seconds = count($exifCoord) > 2 ? gps2Num($exifCoord[2]) : 0; 

    $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1; 

    return $flip * ($degrees + $minutes / 60 + $seconds / 3600); 
}
function gps2Num($coordPart) { 

    $parts = explode('/', $coordPart); 

    if (count($parts) <= 0) 
        return 0; 

    if (count($parts) == 1) 
        return $parts[0]; 

    return floatval($parts[0]) / floatval($parts[1]); 
} 
?>
</head>
<body background = "image/p-upload.jpg"  >
<div id='cssmenu'>
<ul>
	<li class='has-sub'><a href="main_new.php">首頁</a>
   <li class='has-sub'><a href="function.php">功能</a>
   <li class='has-sub'><a href='#'><span>通知</span></a>
      <ul>
	  <?php
		$query_n="SELECT uid1, n_content, pid FROM notice WHERE uid2 = $uid ORDER BY nid DESC";
		$result_n = mysqli_query($link, $query_n);
		while($row_n=mysqli_fetch_assoc($result_n))
		{
			$uid_n=$row_n['uid1'];
			$pid_n[]=$row_n['pid'];
			$n_content[]=$row_n['n_content'];
			$query_a="SELECT account FROM user WHERE uid = $uid_n";
			$result_a = mysqli_query($link, $query_a);
			while($row_a=mysqli_fetch_assoc($result_a))
				$account_n[]=$row_a['account'];
		}
		for($n=0;$n<count($account_n);$n++)
		{
			if($n==count($account_n)-1)
			{
				if($pid_n[$n]==0)
					echo "<li class='last'><a href='personal.php?account=$account_n[$n]'><span>$account_n[$n]$n_content[$n]</span></a></li>";
				else
					echo "<li class='last'><a href='photo.php?pid=$pid_n[$n]'><span>$account_n[$n]$n_content[$n]</span></a></li>";
			}
			else
			{
				if($pid_n[$n]==0)
					echo "<li><a href='personal.php?account=$account_n[$n]'><span>$account_n[$n]$n_content[$n]</span></a></li>";
				else
					echo "<li><a href='photo.php?pid=$pid_n[$n]'><span>$account_n[$n]$n_content[$n]</span></a></li>";
			}
		}	
	  ?>
      </ul>
	  	  <?php echo "<li class='has-sub'><a href='personal.php?account=$account_bar'><span>$account_bar</span></a>";?>

   </li>
</ul>
</div><div id="test">
<style>
body{
background-attachment:fixed;
background-position:center center;
background-repeat:no-repeat;}
</style>
<?php
if ((isset($_POST["insert"])) && ($_POST["insert"] == "upload")) //心情有值 
{
$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,'SET CHARACTER SET utf8');      
mysqli_query($link,"'SET collation_connection ='utf8_general_ci'");
mysqli_query($link,"SET NAMES UTF8"); 
$type = $_POST['type'];
$description = $_POST['description'];
//$pid2 = $_SESSION['pid'];
//$lon2 = $_SESSION['lon'] ;
//$lat2 = $_SESSION['lat'] ;
$lat=$_GET['lat'];
$lon=$_GET['lon'];
$name=$_GET['name'];
$query = "UPDATE `photo` SET `type` = '$type', `description` = '$description', `altitude` = '$lon', `latitude` = '$lat' WHERE `pid` = '$pid'";
//圖片有值，將心情與經緯度更新資料庫
$result = mysqli_query($link, $query);
  if ($result)  //經緯度清除
  {
	//unset($_SESSION['pid']);
	//unset($_SESSION['lat']);
	//unset($_SESSION['lon']);
	
	//header("Location:crop.php?name=$newname"); 11月23號(改)
	 header("Location:cropadd.php?name=$newname&lat=$lat&lon=$lon&pid=$pid");
  }
}
else   //第一步驟
  {
    if ((isset($_POST["check"])) && ($_POST["check"] == "check")) //確定有無檔案
    {
	   if($_FILES['fileid']['error'] == UPLOAD_ERR_OK)           
	    {			
			$dbname="sofun";
			$link=@mysqli_connect('localhost','root','tw123456',$dbname);
			mysqli_query($link,'SET CHARACTER SET utf8_bin');
			mysqli_query($link,"SET collation_connection ='utf8_bin'");
			$query = "INSERT INTO `photo` (`uid`, `pid`, `time`) VALUES ('$uid', NULL, CURRENT_TIMESTAMP)";
			$result = mysqli_query($link, $query);
			
			 if($result)
			 {
				$query2 = "SELECT MAX( pid ) FROM `photo` WHERE uid = $uid";
				$result2 = mysqli_query($link, $query2);
				  while($row=mysqli_fetch_assoc($result2))
				  {
					$pid = $row['MAX( pid )'];
					global $pid;
					$_SESSION['pid'] = $pid;
			   	}
				    $newname = "{$pid}.jpg";

				    if(move_uploaded_file($_FILES['fileid']['tmp_name'],'upload_photo/'.$newname))//複製檔案
				    {
					 echo "<img src='upload_photo/{$pid}.jpg' width='400' heigh='300'/><br/>";
					//讀座標-----------------------------------------------------------
				 	$targetPath = "C:/AppServ/www/upload_photo/{$newname}";
					
					$exts = array('jpg', 'JPG'); 
					$keys = array('GPSLongitude', 'GPSLongitudeRef', 'GPSLatitude', 'GPSLatitudeRef'); 
					$fileStack = array(); 
					foreach (glob($targetPath) AS $file) { 
						if (in_array(substr($file, -3), $exts)) { 
							//echo $file;
							$exif = exif_read_data($file); 
							$keyCheck = true; 
							foreach ($keys AS $key) { 
								if ($keyCheck && empty($exif[$key])) { 
									$keyCheck = false; 
								} 
							} 
							if ($keyCheck) {
								$lon = getGps($exif["GPSLongitude"], $exif['GPSLongitudeRef']); 
								$lat = getGps($exif["GPSLatitude"], $exif['GPSLatitudeRef']); 
								if (!empty($lon) && !empty($lat)) { 
									//$_SESSION['lon'] = $lon;
									//$_SESSION['lat'] = $lat;
									global $lon, $lat;
									echo "</br>";
									//echo $lat;
									echo "</br>";
									//echo $lon;
									echo "</br>";
									$time = explode('_', substr(basename($file), 0, -4)); 
									if (!isset($fileStack[$time[0]])) { 
										$fileStack[$time[0]] = array(); 
									} 
									$fileStack[$time[0]] = array( 
									'file' => $file, 
									'lat' => $lat, 
									'lng' => $lon, 
									); 
								} 
							} 
						} 
					} 
					//--------------------------------------------------------------------
					if(isset($lat))
					{
						//echo "123#";
						//echo $lat;
						}
					else{         
						header("Location:upload_fix.php?name=$newname"); //圖片本身沒有經緯度轉到upload_fix           
					}  
                                          
					echo "<form name='form1' method='post' action='/upload.php?lat=$lat&lon=$lon&name=$newname' style='margin-left:-200;margin-top:-50'>";					
					echo " <table width='112'>
					<label>
					<input type='radio' name='type' value='0' />
					<img src='image/mood/1b.png'></label>
					<label>
					<input type='radio' name='type' value='1' />
					<img src='image/mood/2b.png'></label>
					<label>
					<input type='radio' name='type' value='2' />
					<img src='image/mood/3b.png'></label>
					<label>
					<input type='radio' name='type' value='3' />
					<img src='image/mood/4b.png'></label>
					<label>
					<input type='radio' name='type' value='4' />
					<img src='image/mood/5b.png'></label>
					<label>
					<input type='radio' name='type' value='5' />
					<img src='image/mood/6b.png'></label>
					<label>
					<input type='radio' name='type' value='6' />
					<img src='image/mood/7b.png'></label><br/>
					<label>
					<input type='radio' name='type' value='7' />
					<img src='image/mood/8b.png'></label>
					<label>
					<input type='radio' name='type' value='8' />
					<img src='image/mood/9b.png'></label>
					<label>
					<input type='radio' name='type' value='9' />
					<img src='image/mood/10b.png'></label>
					<label>
					<input type='radio' name='type' value='10' />
					<img src='image/mood/11b.png'></label>
					<label>
					<input type='radio' name='type' value='11' />
					<img src='image/mood/12b.png'></label>
					<label>
					<input type='radio' name='type' value='12' />
					<img src='image/mood/13b.png'></label>
					<label>
					<input type='radio' name='type' value='13' />
					<img src='image/mood/14b.png'></label>
					</table>
					<textarea name='description' cols='45' rows='5' style='margin-left:200'></textarea>";  //描述
					echo "<input type='submit' value='上傳' >";

					echo "<input name='insert' id='insert' type='hidden' value='upload' />";
					echo "</form>";
				}
				else
					echo "檔案複製失敗";
			}
	}
	else
		echo $_FILES['fileid']['error'];
}
else
{
	echo '<form action="upload.php"';
  
	echo "method='post' enctype='multipart/form-data'><br/>";
	echo "<div class='fileInputContainer'>
    <input class='fileInput' type='file' name='fileid' onchange='readURL(this);' />
	</div><br/>";
		
	echo "<img id='blah' src='image/i-upload.png' width='400' height='300'/><br/>";	


//echo "<input type='submit' value='確認' />";
echo "<input type='image' src='image/b-upload_check.png' alt='Submit' />";
echo "<input name='check' id='check' type='hidden' value='check' /></form>";
}}
?>
</div>
</body>
</html>

