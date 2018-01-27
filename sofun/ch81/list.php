<html>
<head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$(function(){
   $(".rating").live("click", function(){
     var rating = $(this).attr("id").substr(0, 1);
     var id = $(this).attr("id").substr(1);
     var data = "id="+id+"&rating="+rating;

     $.ajax({
       type: "POST",
       url: "rate.php",
       data: data,
       success: function(e){
         $("#r"+id).html(e);
       }
     })
   });
});
</script>
<style>
.rating { cursor: pointer; }
</style>
</head>
<body>
<?php

include ("headers.php");
$qq = mysql_query("SELECT * FROM $con");

$ip = $_SERVER["REMOTE_ADDR"];

while($rr=mysql_fetch_array($qq)){
    $id = $rr["id"];
    $content = $rr["content"];
    
    include("buttons.php"); //FILE WITH THE LIKE & DISLIKE BUTTONS AND THE NUMBER OF LIKES & DISLIKES
    
    $list .= '<div style="border-bottom: 1px #32baed solid">
    '.$content.'&nbsp;&nbsp;&nbsp;
    <div id="r'.$id.'"><img class="rating" id="l'.$id.'" src="'.$l_b.'"> '.$likes.'&nbsp;&nbsp;&nbsp;<img class="rating" id="d'.$id.'" src="'.$d_b.'"> '.$dislikes.'</div>
    </div><br><br>';
}

echo $list;

?>
</body>
</html>