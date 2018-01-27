<?php
session_start();
$uid=$_SESSION['uid'];
$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");

$query_account="SELECT account FROM user WHERE uid = $uid";
$result_account = mysqli_query($link, $query_account);
while($row_account=mysqli_fetch_assoc($result_account))
	$account_bar=$row_account['account'];

$uid=$_GET['name'];
$name="$uid.jpg";
$src="head/$name";

$query2="SELECT account FROM user WHERE uid = $uid";
$result2 = mysqli_query($link, $query2);
while($row2=mysqli_fetch_assoc($result2))
	$account = $row2['account'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	$targ_w = 640;
	$targ_h = 640;
	$jpeg_quality = 90;

	list($width, $height) = getimagesize($src);
	$width_r = $width /640;
	$height_r = $height /640;
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
	echo $src;

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x']*$width_r,$_POST['y']*$height_r,
	$targ_w,$targ_h,$_POST['w']*$width_r,$_POST['h']*$height_r);
	
	
	
	
	

	header("Location:personal.php?account=$account");
	imagejpeg($dst_r,null,$jpeg_quality);
	imagejpeg($dst_r,"$src"); //儲存
	

	exit;
}

// If not a POST request, display page below:

?><!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="css/menu.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/style_notice.css" />
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="js/crop/jquery.min.js"></script>
  <script src="js/crop/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="css/main.css" type="text/css" />
  <link rel="stylesheet" href="css/demos.css" type="text/css" />
  <link rel="stylesheet" href="css/crop/jquery.Jcrop.css" type="text/css" />

<script type="text/javascript">

  $(function(){

    $('#cropbox').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script>
<style type="text/css">
  #target {
    background-color: #ccc;
    width: 500px;
    height: 330px;x
    font-size: 24px;
    display: block;
  }


</style>

</head>
<body>
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
</div>
		<?php
		echo "<img src='$src' id='cropbox' width=640 height=640/>";
		
		//<!-- This is the form that our event handler fills -->
			echo "<form action='crop_head.php?name=$uid' method='post' onsubmit='return checkCoords();'>";
		?>
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
		</form>

	</body>

</html>
