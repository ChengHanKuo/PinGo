<?php 
$link = mysql_connect('localhost', 'root', '') or die(mysql_error()); 
mysql_select_db('vote', $link) or die(mysql_error()); 
mysql_query("set names utf8"); 
$num = 3; 
$url = "page.php"; 
$con = "<ul id='msg'>"; 
$page = (isset($_REQUEST['page'])) ? $_REQUEST['page'] : 1; 
$offset = ($page - 1) * $num; 
$result = mysql_query("SELECT COUNT(*) FROM client"); 
$total = mysql_fetch_row($result); 
$total = $total[0]; 
$pagenum = ceil($total / $num); 
$page = min($pagenum, $page); 
$prepg = $page - 1; //上一頁 
if ($prepg <= 1) 
$prepg = 1; 
$nextpg = ($page == $pagenum ? 1 : $page + 1); //下一頁 
//如果只有一頁則跳出函數： 
if ($pagenum <= 1) 
return false; 
$sql = "SELECT `name`,`content` FROM `client` LIMIT " . $offset . "," . $num; 
$res = mysql_query($sql); 
while ($content = mysql_fetch_row($res)) { 
$con .= "<li><span>$content[0]:</span> $content[1]</li>"; 
} 
$con .= "</ul>"; 
$con .= <<< PAGE 
<p id="page"><a href="#" id="first" onclick="showHint1('$url?page=1')">首頁</a>|<a href="#" id="pre" onclick="showHint2('$url?page=$prepg')">上一頁</a>|<a href="#" id="next" onclick="showHint3('$url?page=$nextpg')">下一頁</a>|<a href="#" id="last" onclick="showHint4('$url?page=$pagenum')">最後一頁</a></p> 
PAGE; 
echo $con; 
?>