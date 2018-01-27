<?php
session_start();
$uid = $_SESSION['uid'];
$q2 = mysql_query("SELECT * FROM $ratings WHERE pid='$pid' AND rating='like'");
$likes = mysql_num_rows($q2);
//LIKE & DISLIKE IMAGES
$l = 'image/win/b-like1.png';
//$d = 'http://wcetdesigns.com/images/buttons/d_color.png';

//CHECKS IF USER HAS ALREADY RATED CONTENT
$q3 = mysql_query("SELECT * FROM $ratings WHERE pid='$pid' AND uid='$uid'");
$r = mysql_fetch_assoc($q3); //CHECKS IF USER HAS ALREADY RATED THIS ITEM

//IF SO, THE RATING WILL HAVE A SHADOW
if($r["rating"]=="like"){
    $l = 'image/win/b-like2.png';
}

//FORM & THE NUMBER OF LIKES & DISLIKES
    
?>