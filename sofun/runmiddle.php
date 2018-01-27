<?php
session_start();
$uid = $_SESSION['uid'];
$uid2= $_SESSION['uid_friend'];
$rela_bebore=$_SESSION['rela_before'];
$rela = $_POST["rela"];

$c = mysql_connect("localhost", "root", "tw123456");
$db = mysql_select_db("sofun", $c);

$friend='friend';

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"SET collation_connection ='utf8_bin'");
	


 //if(in_array($rating, $rating_type)){    
 //CHECKS IF $id EXISTS
    $q = mysql_query("SELECT * FROM $friend WHERE uid1='$uid' AND uid2 ");
    $r = mysql_fetch_assoc($q);
    //COUNTS LIKES & DISLIKES IF $id EXISTS
    if($pid)
    {
        //CHECKS IF USER HAS ALREADY RATED CONTENT
        $q = mysql_query("SELECT * FROM $ratings WHERE pid='$pid' AND uid='$uid'");
        $r = mysql_fetch_assoc($q); //CHECKS IF USER HAS ALREADY RATED THIS ITEM
			//IF USER HAS ALREADY RATED
        if ($r["rating"]==$rating){
                mysql_query("DELETE FROM $ratings WHERE pid='$pid' AND uid='$uid'"); //DELETES RATING
        } else {
            mysql_query("INSERT INTO $ratings VALUES('$rating', '$pid','$uid')"); //INSERTS INITIAL RATING
		
			$query_check = "SELECT * FROM notice WHERE pid='$pid' AND uid1='$uid'";
			$result_check = mysqli_query($link, $query_check);
			if($row_ckeck =mysqli_fetch_array($result_check))
			{}
			else
			{
			//$n_content= $uid_account."喜歡您的一張照片";
			echo $n_content;
			echo "like";
			$query_not = "INSERT INTO `notice` (`uid1`,`uid2`, `pid`, `n_content`) VALUES ('$uid', '$uid_photo','$pid','$n_content')";
			$result = mysqli_query($link, $query_not);
			}
        }      

		
		
$query2 = "SELECT relation FROM friend WHERE uid1 = $uid AND uid2 IN (SELECT uid FROM user WHERE account = '$account')";
$result2 = mysqli_query($link, $query2);
if($row2=mysqli_fetch_assoc($result2))
	$relation =$row2['relation'];
else
	$relation = $row2['relation'];
$query3 = "SELECT uid FROM user WHERE account = '$account'";
$result3 = mysqli_query($link, $query3);
while($row3=mysqli_fetch_assoc($result3))
	$uid2 = $row3['uid'];
	
switch ($relation)
{
	case "":
	{
		if($rela==0)
		{
			$query = "INSERT INTO friend (`uid1`, `uid2`, `relation`) VALUES ('$uid', '$uid2', '1')";
			$result = mysqli_query($link, $query);
			echo "<script>history.go(-1);</script>";
			//if($result)
				//header('personal.php');
		}
		if($rela=='3')
		{
			$query = "INSERT INTO friend (`uid1`, `uid2`, `relation`) VALUES ('$uid', '$uid2', '0')";
			$result = mysqli_query($link, $query);
			echo "<script>history.go(-1);</script>";
			//if($result)
				//header('personal.php');
		}
		if($rela=='5')
		{
			$query1 = "INSERT INTO friend (`uid1`, `uid2`, `relation`) VALUES ('$uid', '$uid2', '2')";
			$result1 = mysqli_query($link, $query1);
			$query2 = "UPDATE friend SET relation =  '2' WHERE  `friend`.`uid1` ='$uid2' AND  `friend`.`uid2` ='$uid'";
			$result2 = mysqli_query($link, $query2);
			echo "<script>history.go(-1);</script>";
			//if($result)
				//header('personal.php');
		}
		break;
	}
	
	case "0":
	{
		if($rela=='0')
		{
			$query = "UPDATE friend SET relation =  '1' WHERE  `friend`.`uid1` ='$uid' AND  `friend`.`uid2` ='$uid2'";
			$result = mysqli_query($link, $query);
			echo "<script>history.go(-1);</script>";
			//if($result)
				//header('personal.php');
		}
		if($rela=='4')
		{
			$query = "DELETE FROM friend WHERE `friend`.`uid1` = '$uid' AND `friend`.`uid2` = '$uid2'";
			$result = mysqli_query($link, $query);
			echo "<script>history.go(-1);</script>";
			//if($result)
				//header('personal.php');
		}
		if($rela=='5')
		{
			$query1 = "UPDATE friend SET relation =  '2' WHERE  `friend`.`uid1` ='$uid' AND  `friend`.`uid2` ='$uid2'";
			$result1 = mysqli_query($link, $query1);
			$query2 = "UPDATE friend SET relation =  '2' WHERE  `friend`.`uid1` ='$uid2' AND  `friend`.`uid2` ='$uid'";
			$result2 = mysqli_query($link, $query2);
			echo "<script>history.go(-1);</script>";
			//if($result)
				//header('personal.php');
		}
		break;
	}
	
	case "1":
	{
		if($rela=='1')
		{
			$query = "UPDATE friend SET relation =  '0' WHERE  `friend`.`uid1` ='$uid' AND  `friend`.`uid2` ='$uid2'";
			$result = mysqli_query($link, $query);
			echo "<script>history.go(-1);</script>";
			//if($result)
				//header('personal.php');
		}
		break;
	}
		
	case "2":
	{
		if($rela=='2')
		{
			$query1 = "DELETE FROM friend WHERE `friend`.`uid1` = '$uid' AND `friend`.`uid2` = '$uid2'";
			$result1 = mysqli_query($link, $query1);
			$query2 = "DELETE FROM friend WHERE `friend`.`uid1` = '$uid2' AND `friend`.`uid2` = '$uid'";
			$result2 = mysqli_query($link, $query2);
			echo "<script>history.go(-1);</script>";
			//echo "<a href='javascript:history.back()'/>";
			//if($result)
				//header('personal.php');
		}
		break;
	}	
}



		
             include 'headers.php'; //FILE WITH THE NUMBER OF RATINGS, BUTTON IMAGE URLS, AND WHETHER USER HAS RATED
   if($value==0){
		$m = '<img id="like" onClick="rate($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==1){
		$m = '<img id="like" onClick="rate1($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==2){
		$m = '<img id="like" onClick="rate2($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==3){
		$m = '<img id="like" onClick="rate3($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==4){
		$m = '<img id="like" onClick="rate4($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==5){
		$m = '<img id="like" onClick="rate5($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==6){
		$m = '<img id="like" onClick="rate6($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==7){
		$m = '<img id="like" onClick="rate7($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==8){
		$m = '<img id="like" onClick="rate8($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==9){
		$m = '<img id="like" onClick="rate9($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==10){
		$m = '<img id="like" onClick="rate10($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==11){
		$m = '<img id="like" onClick="rate11($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==12){
		$m = '<img id="like" onClick="rate12($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==13){
		$m = '<img id="like" onClick="rate13($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==14){
		$m = '<img id="like" onClick="rate14($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
	if($value==15){
		$m = '<img id="like" onClick="rate15($(this).attr(\'id\'))" src="'.$l.'"> '.$likes ;
		}
        //EVERYTHING HERE DISPLAYED IN HTML AND THE "ratings" ELEMENT FOR AJAX
        echo $m;
    }
    else
    {
        echo "Invalid ID";
    }


?>