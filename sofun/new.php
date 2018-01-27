<?php
session_start();

if ((isset($_POST["insert"])) && ($_POST["insert"] == "member_new")) 
{
	$dbname="sofun";
	$link=@mysqli_connect('localhost','root','tw123456',$dbname);
	mysqli_query($link,"SET NAMES 'UTF8'");
	mysqli_query($link,'SET CHARACTER SET utf8_bin');
	mysqli_query($link,"SET collation_connection ='utf8_bin'");
		$account = $_POST['account'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$sex = $_POST['sex'];
		$birthday=$_POST['year'];
		$email = $_POST['email'];
		
	$query = "INSERT INTO user (`account`,`password`) VALUES ('$account', '$password')";
	$result = mysqli_query($link, $query);
	if($result)
	{
		$sql="SELECT  `uid` FROM  `user` WHERE  `account` ='$account'";
		$result2 = mysqli_query($link, $sql);
		while($row=mysqli_fetch_assoc($result2)){
			$uid=" {$row['uid']}";
		}
		$query2="INSERT INTO user_profile (`uid`,`name`,`sex`,`birthday`,`email`) VALUES ('$uid','$name', '$sex', '$birthday', '$email')" ;
		$result3 = mysqli_query($link, $query2);
		if ($result3)
		{
			//echo "sucess2";
			header('Location:main_new.php');
			$_SESSION['uid'] = $uid;
		}
		else
			echo "bye";

}}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
body {
	background-image: url(image/p-register.jpg);
	background-repeat: no-repeat;
	background-position:top;
	background-attachment:fixed;
}
#apDiv1 {
	position:absolute;
	left:50%;
	top:303px;
	width:400px;
	height:110px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:50%;
	top:426px;
	width:400px;
	height:58px;
	z-index:2;
}
#apDiv3 {
	position:absolute;
	left:50%;
	top:505px;
	width:400px;
	height:82px;
	z-index:3;
}
</style>
</head>
<body>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div id="apDiv1">
  <span id="sprytextfield6">
  <input name="account" type="text" id="account" style="border:0px;background-color:cornsilk"/>
  <span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldMinCharsMsg">未達到字元數目的最小值。</span><span class="textfieldMaxCharsMsg">已超出字元數目的最大值。</span></span>(5~10)

  <p><span id="sprytextfield1">
  <input type="password" name="password" id="password3" style="border:0px;background-color:cornsilk"/>
  <span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldMinCharsMsg">未達到字元數目的最小值。</span><span class="textfieldMaxCharsMsg">已超出字元數目的最大值。</span></span>(6~12)</p>
  <p><span id="spryconfirm1">
    <input type="password" name="confirmpassword" id="confirmpassword" style="border:0px;background-color:cornsilk"/>
    <span class="confirmRequiredMsg">需要有一個值。</span><span class="confirmInvalidMsg">值不相符。</span></span>
    </p>
</div>
<div id="apDiv2"> <label for="name"></label>
    <span id="sprytextfield2">
      <input type="text" name="name" id="name" style="border:0px;background-color:cornsilk"/>
      <span class="textfieldRequiredMsg">需要有一個值。</span></span>
    
  </p>
  <div id="spryradio2">
    <table width="112">
    <tr>
      <td><label>
        <input type="radio" name="sex" value='0' id="性別_2" />
        男</label></td>
  
      <td><label>
        <input type="radio" name="sex" value='1' id="性別_3" />
        女</label></td>
    </tr>
  </table>
</div></div>
<div id="apDiv3">   <span id="sprytextfield4">
  <input name="year" type="text" id="year" size="8" style="border:0px;background-color:cornsilk"/>
      <span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldMinCharsMsg">未達到字元數目的最小值。
      </span><span class="textfieldMaxCharsMsg">已超出字元數目的最大值。</span><span class="textfieldInvalidFormatMsg">格式無效。</span></span>(yyyy-mm-dd) <br/>
    </p>
	<label for="email"></label>
<span id="sprytextfield3">
      <input type="text" name="email" id="email" style="border:0px;background-color:cornsilk"/>
<span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldInvalidFormatMsg">格式無效。</span></span><br/>
    <input type="submit" name="submit" id="submit" value="送出">
    <input type="reset" name="reset" id="reset" value="重設">
    
    <input name="insert" id="insert" type="hidden" value="member_new" />
</div></form>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">

<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">

<link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css">
<script type="text/javascript">

</script>

<script type="text/javascript">
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {validateOn:["blur", "change"], minChars:5, maxChars:10});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:6, maxChars:12, validateOn:["blur", "change"]});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password3", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var spryradio2 = new Spry.Widget.ValidationRadio("spryradio2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "date", {validateOn:["blur", "change"], format:"yyyy-mm-dd"});
</script>
</body>