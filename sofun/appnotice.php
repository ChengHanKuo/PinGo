<?php


$dbname="sofun";

$link=@mysqli_connect('localhost','root','tw123456',$dbname);  

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link, "SET collation_connection = 'utf8_general_ci'");

$uid=$_POST["uid"];


$sql="SELECT distinct `uid1`,`pid`,`n_content` FROM `notice` WHERE `uid2`=$uid AND `n_read`=0 ORDER BY `time` desc";
$res=mysqli_query($link, $sql);

while($row = mysqli_fetch_assoc($res)){
	$array1[]=array($row['uid1'],$row['pid'],$row['n_content']);
}
if($array1!=NULL){
foreach($array1 as $i)
{
	$sql2="SELECT `time` FROM `notice` WHERE `uid1`=$i[0] AND `pid`=$i[1] AND `n_content`='$i[2]' ORDER BY `time` desc LIMIT 1";
	$res2=mysqli_query($link,$sql2);
	while($row2 = mysqli_fetch_assoc($res2)){
		$sql0="SELECT `account` FROM `user` WHERE `uid`=$i[0]";
		$res0=mysqli_query($link, $sql0);
		while($row0 = mysqli_fetch_assoc($res0)){
		echo $i[0]."\t".$i[1]."\t".$row2['time']."\t".$i[2]."\t".$row0['account']."\t";
		echo "\n";
		}
	}

}}
else
	echo "µL";
mysqli_close($link);
?>
