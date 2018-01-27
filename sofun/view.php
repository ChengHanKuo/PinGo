<?php

//echo $uid;
echo $pid;
//echo $_GET['value'];
//o $key;
//IF $id EXISTS, THEN COUNT LIKES & DISLIKES
if($pid){
   include 'headers.php'; //FILE WITH THE NUMBER OF RATINGS, BUTTON IMAGE URLS, AND WHETHER USER HAS RATED
    //EVERYTHING HERE DISPLAYED IN HTML
    echo '<br><br><br><div id="ratings">'.$m.'</div>';
}
else
{
    echo "Invalid PID";
}

?>