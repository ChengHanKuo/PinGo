<?php

include ("headers.php");
$id = $_POST["id"];
$ip = $_SERVER["REMOTE_ADDR"];
$prating = $_POST["rating"];

$r_array = array("l", "d");

if(in_array($prating, $r_array)){
    $q = mysql_query("SELECT * FROM $table WHERE id='$id' AND ip='$ip'");
    $n = mysql_num_rows($q);
    if($n){
        $r = mysql_fetch_assoc($q);
        $rating = $r["rating"];
        if($rating==$prating){
            mysql_query("DELETE FROM $table WHERE rating='$prating' AND id='$id' AND ip='$ip'");
        } else {
            mysql_query("UPDATE $table SET rating='$prating' WHERE id='$id' AND ip='$ip'");
        }
    } else {
        mysql_query("INSERT INTO $table VALUES('', '$prating', '$id', '$ip')");
    }
    
    include("buttons.php"); //FILE WITH THE LIKE & DISLIKE BUTTONS AND THE NUMBER OF LIKES & DISLIKES
    
    $list = '<img class="rating" id="l'.$id.'" src="'.$l_b.'"> '.$likes.'&nbsp;&nbsp;&nbsp;<img class="rating" id="d'.$id.'" src="'.$d_b.'"> '.$dislikes;
    echo $list;
}

?>