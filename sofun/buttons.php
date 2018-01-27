<?php

//COUNTS THE TOTAL NUMBER OF LIKES & DISLIKES FOR THE SPECIFIC CONTENT
$q = mysql_query("SELECT * FROM $table WHERE id='$id' AND rating='l'");
$likes = mysql_num_rows($q);
$q = mysql_query("SELECT * FROM $table WHERE id='$id' AND rating='d'");
$dislikes = mysql_num_rows($q);

//CHECKS IF USER HAS RATED THE SPECIFIC CONTENT
$q = mysql_query("SELECT * FROM $table WHERE ip='$ip' AND id='$id' AND rating='l'");
$ipl = mysql_num_rows($q);
$q = mysql_query("SELECT * FROM $table WHERE ip='$ip' AND id='$id' AND rating='d'");
$ipd = mysql_num_rows($q);

//THE LIKE & DISLIKE BUTTONS (IF USER HASN'T RATED)
$l_b = 'http://img.wcetdns.com/btns/l_color15.png';
$d_b = 'http://img.wcetdns.com/btns/d_color15.png';

//THE SHADOWED LIKE & DISLIKE BUTTONS (IF USER HAS RATED)
if($ipl){
    $l_b = 'http://img.wcetdns.com/btns/l_color_shadow15.png';
} if($ipd){
    $d_b = 'http://img.wcetdns.com/btns/d_color_shadow15.png';
}

?>