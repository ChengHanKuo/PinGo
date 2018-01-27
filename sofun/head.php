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
</html>
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
					echo "<li class='last'><a href='#'><span>$account_n[$n]$n_content[$n]</span></a></li>";
			}
			else
			{
				if($pid_n[$n]==0)
					echo "<li><a href='personal.php?account=$account_n[$n]'><span>$account_n[$n]$n_content[$n]</span></a></li>";
				else
					echo "<li><a href='#'><span>$account_n[$n]$n_content[$n]</span></a></li>";
			}
		}	
	  ?>
      </ul>
	  	  <?php echo "<li class='has-sub'><a href='personal.php?account=$account_bar'><span>$account_bar</span></a>";?>

   </li>
</ul>
</div>

<?php
if ((isset($_POST["insert"])) && ($_POST["insert"] == "upload")) 
{
	if($_FILES['fileid']['error'] == UPLOAD_ERR_OK)
	{
		$newname = "{$uid}.jpg";
		if(move_uploaded_file($_FILES['fileid']['tmp_name'],'head/'.$newname))
				{
					header("Location:crop_head.php?name=$uid");
				}
	}
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<div class='fileInputContainer'>
    <input class='fileInput' type='file' name='fileid' onchange='readURL(this);' />
	</div><br/>
	<img id='blah' src='image/i-upload.png' /><br/>
<input type='image' src='image/b-upload_check.png' alt='Submit' />
<input name="insert" id="insert" type="hidden" value="upload" />
</form>
</body>