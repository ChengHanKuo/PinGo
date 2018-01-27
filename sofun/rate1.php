<?php
session_start();
$uid = $_SESSION['uid'];
$pid= $_SESSION['keypid'];
$value=$_SESSION['keyvalue'];
$rating = $_POST["rating"];

$c = mysql_connect("localhost", "root", "tw123456");
$db = mysql_select_db("sofun", $c);

$photo='photo';
$ratings = 'ratings';
$notice = 'notice';

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"SET collation_connection ='utf8_bin'");
	
$query= "SELECT uid FROM photo WHERE pid = $pid ";
$result = mysqli_query($link, $query);
while($row=mysqli_fetch_array($result))
{
	$uid_photo=$row['uid'];		
}

$query_account= "SELECT account FROM user WHERE uid = $uid ";
$result_account = mysqli_query($link, $query_account);
while($row_acc=mysqli_fetch_array($result_account))
{
	$uid_account=$row_acc['account'];		
}

 //if(in_array($rating, $rating_type)){    
 //CHECKS IF $id EXISTS
    $q = mysql_query("SELECT * FROM $photo WHERE pid='$pid'");
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
			echo "你好";
			$query_not = "INSERT INTO `notice` (`uid1`,`uid2`, `pid`, `n_content`) VALUES ('$uid', '$uid_photo','$pid','$n_content')";
			$result = mysqli_query($link, $query_not);
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