<?php
session_start();
$uid = $_SESSION['uid'];
$uid2= $_SESSION['uid_friend'];
$rela_bebore=$_SESSION['rela_before'];


//$q2 = mysql_query("SELECT * FROM $friend WHERE pid='$pid' AND rating='like'");
//$likes = mysql_num_rows($q2);
//LIKE & DISLIKE IMAGES
$l = 'http://wcetdesigns.com/images/buttons/l_color.png';
//$d = 'http://wcetdesigns.com/images/buttons/d_color.png';
$addc='image/b-addc1-1.png';
$addf='image/b-addf1-1.png';
$addw='image/b-addw1-1.png';
$bfol='image/b-follow1-1.png';
$bfold='image/b-follow2-1.png';

//CHECKS IF USER HAS ALREADY RATED CONTENT
$q = mysql_query("SELECT * FROM $friend WHERE uid1='$uid' AND uid2='$uid2'");
$r = mysql_fetch_assoc($q1); //CHECKS IF USER HAS ALREADY RATED THIS ITEM

//IF SO, THE RATING WILL HAVE A SHADOW
//if($r["relationship"]=="frined"){
 //   $l = 'http://wcetdesigns.com/images/buttons/l_color_shadow.png';
//}

//FORM & THE NUMBER OF LIKES & DISLIKES


   if(isset ($_GET["account"]))
{
	$account = $_GET["account"];
	$_SESSION['account'] = $account;

	$query2 = "SELECT relation FROM friend WHERE uid1 = $uid AND uid2 IN (SELECT uid FROM user WHERE account = '$account')";
	$result2 = mysqli_query($link, $query2);
	
	$query3 = "SELECT relation FROM friend WHERE uid2 = $uid AND uid1 IN (SELECT uid FROM user WHERE account = '$account')";
	$result3 = mysqli_query($link, $query3);

//	0 追蹤      以追蹤  加好友 
//	1 A加好友B  A:等待確認  追蹤會不件變成以追蹤    B:確認是否為好友   確認後 追蹤會不建   
//	2  AB 好友  取消好友

	
	
	if($result3)
	{
		if($row3=mysqli_fetch_assoc($result3))
		{
			$relation = $row3['relation'];
			if($relation==1)
			{
				if($result2)
				{
					if($row2=mysqli_fetch_assoc($result2))
					{
						//$relation=$row2['relation'];
						//if($relation="")
						echo "<form>";
						
						$image1 = "'Image1'";
						$image2 = "'Image2'";
						$path1 = "'image/b-follow2-2.png'";
						$path2 = "'image/b-addc1-2.png'";
						$em="''";
						echo "<a href='add_friend.php?rela=4' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
						<img src='image/b-follow2-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
						echo "<a href='add_friend.php?rela=5' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image2.",".$em.",".$path2.",1)\">
						<img src='image/b-addc1-1.png' name='Image2' width='39' height='39' border='0' id='Image2'></a>";
						
						$track=	'<img id="" onClick="change($(this).attr(\'id\'))" src="image/b-"> '."追蹤" ;
						
						//echo "<a href='add_friend.php?rela=4'><img src='image/b-follow2-1.png' width='39' height='39'></a>";
						//echo "<a href='add_friend.php?rela=5'><img src='image/b-addc1-1.png' width='39' height='39'></a>";
						//echo "<input type='button' value='接受為朋友' onclick=".$confirm_fr.">";
						//echo "<input type='button' value='取消追蹤' onclick=".$dis_fo.">";
						echo "<input name='insert' id='insert' type='hidden' value='rela' />";
						echo "</form>";
					}
					else
					{
						echo "<form>";
						
						$image1 = "'Image1'";
						$image2 = "'Image2'";
						$path1 = "'image/b-follow1-2.png'";
						$path2 = "'image/b-addc1-2.png'";
						$em="''";
						echo "<a href='add_friend.php?rela=3' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
						<img src='image/b-follow1-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
						echo "<a href='add_friend.php?rela=5' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image2.",".$em.",".$path2.",1)\">
						<img src='image/b-addc1-1.png' name='Image2' width='39' height='39' border='0' id='Image2'></a>";
						
						//echo "<a href='add_friend.php?rela=3'><img src='image/b-follow1-1.png' width='39' height='39'></a>";
						//echo "<a href='add_friend.php?rela=5'><img src='image/b-addc1-1.png' width='39' height='39'></a>";						
						//echo "<input type='button' value='接受為朋友' onclick=".$confirm_fr.">";
						//echo "<input type='button' value='追蹤' onclick=".$add_fo.">";
						echo "<input name='insert' id='insert' type='hidden' value='rela' />";
						echo "</form>";
					}
				}
			}
			else if($result2)
			{
				if($row2=mysqli_fetch_assoc($result2))
				{
					$relation=$row2['relation'];
					switch($relation)
					{
						case "0":
						{
							echo "<form>";
							
							$image1 = "'Image1'";
							$image2 = "'Image2'";
							$path1 = "'image/b-follow2-2.png'";
							$path2 = "'image/b-addf1-2.png'";
							$em="''";
							echo "<a href='add_friend.php?rela=4' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
							<img src='image/b-follow2-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
							echo "<a href='add_friend.php?rela=0' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image2.",".$em.",".$path2.",1)\">
							<img src='image/b-addf1-1.png' name='Image2' width='39' height='39' border='0' id='Image2'></a>";
							
							//echo "<a href='add_friend.php?rela=4'><img src='image/b-follow2-1.png' width='39' height='39'></a>";
							//echo "<a href='add_friend.php?rela=0'><img src='image/b-addf1-1.png' width='39' height='39'></a>";							
							//echo "<input type='button' value='加為朋友' onclick=".$add_fr.">";
							//echo "<input type='button' value='取消追蹤' onclick=".$dis_fo.">";
							echo "<input name='insert' id='insert' type='hidden' value='rela' />";
							echo "</form>";
							break;				
						}
						case "1":
						{
							echo "<form>";
							
							$image1 = "'Image1'";
							$path1 = "'image/b-addw1-2.png'";
							$em="''";
							echo "<a href='add_friend.php?rela=1' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
							<img src='image/b-addw1-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
							
							echo "<a href='add_friend.php?rela=1'><img src='image/b-addw1-1.png' width='39' height='39'></a>";
							//echo "<input type='button' value='收回邀請' onclick=".$check_fr.">";
							echo "<input name='insert' id='insert' type='hidden' value='rela' />";
							echo "</form>";
							break;
						}
						case "2":
						{
							echo "<form>";
							
							$image1 = "'Image1'";
							$path1 = "'image/b-remf1-2.png'";
							$em="''";
							echo "<a href='add_friend.php?rela=2' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
							<img src='image/b-remf1-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
							
							//echo "<a href='add_friend.php?rela=2'><img src='image/b-remf1-1.png' width='39' height='39'></a>";
							//echo "<input type='button' value='取消好友' onclick=".$dis_fr.">";
							echo "<input name='insert' id='insert' type='hidden' value='rela' />";
							echo "</form>";
							break;
						}
					}
				}
				else
				{
					echo "<form>";
					
					$image1 = "'Image1'";
					$image2 = "'Image2'";
					$path1 = "'image/b-follow1-2.png'";
					$path2 = "'image/b-addf1-2.png'";
					$em="''";
					echo "<a href='add_friend.php?rela=3' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
					<img src='image/b-follow1-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
					echo "<a href='add_friend.php?rela=0' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image2.",".$em.",".$path2.",1)\">
					<img src='image/b-addf1-1.png' name='Image2' width='39' height='39' border='0' id='Image2'></a>";
					
					//echo "<a href='add_friend.php?rela=3'><img src='image/b-follow1-1.png' width='39' height='39'></a>";
					//echo "<a href='add_friend.php?rela=0'><img src='image/b-addf1-1.png' width='39' height='39'></a>";
					//echo "<input type='button' value='加為朋友' onclick=".$add_fr.">";
					//echo "<input type='button' value='追蹤' onclick=".$add_fo.">";
					echo "<input name='insert' id='insert' type='hidden' value='rela' />";
					echo "</form>";
				}
			}
		}
		else if($result2)
		{
			if($row2=mysqli_fetch_assoc($result2))
			{
				$relation=$row2['relation'];
				switch($relation)
				{
					case "0":
					{
						echo "<form>";
						$image1 = "'Image1'";
						$image2 = "'Image2'";
						$path1 = "'image/b-follow2-2.png'";
						$path2 = "'image/b-addf1-2.png'";
						$em="''";
						echo "<a href='add_friend.php?rela=4' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
						<img src='image/b-follow2-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
						echo "<a href='add_friend.php?rela=0' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image2.",".$em.",".$path2.",1)\">
						<img src='image/b-addf1-1.png' name='Image2' width='39' height='39' border='0' id='Image2'></a>";
						
						//echo "<a href='add_friend.php?rela=4'><img src='image/b-follow2-1.png' width='39' height='39'></a>";
						//echo "<a href='add_friend.php?rela=0'><img src='image/b-addf1-1.png' width='39' height='39'></a>";
						
						//echo "<input type='button' value='加為朋友' onclick=".$add_fr.">";
						//echo "<input type='button' value='取消追蹤' onclick=".$dis_fo.">";
						echo "<input name='insert' id='insert' type='hidden' value='rela' />";
						echo "</form>";
						break;				
					}
					case "1":
					{
						echo "<form>";
						
						$image1 = "'Image1'";
						$path1 = "'image/b-addw1-2.png'";
						$em="''";
						echo "<a href='add_friend.php?rela=1' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
						<img src='image/b-addw1-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";

						
						//echo "<a href='add_friend.php?rela=1'><img src='image/b-addw1-1.png' width='39' height='39'></a>";
						//echo "<input type='button' value='收回邀請' onclick=".$check_fr.">";
						echo "<input name='insert' id='insert' type='hidden' value='rela' />";
						echo "</form>";
						break;
					}
					case "2":
					{
						echo "<form>";
						
						$image1 = "'Image1'";
						$path1 = "'image/b-addw1-2.png'";
						$em="''";
						echo "<a href='add_friend.php?rela=2' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
						<img src='image/b-remf1-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
						
						//echo "<a href='add_friend.php?rela=2'><img src='image/b-remf1-1.png' width='39' height='39'></a>";
						//echo "<input type='button' value='取消好友' onclick=".$dis_fr.">";
						echo "<input name='insert' id='insert' type='hidden' value='rela' />";
						echo "</form>";
						break;
					}
				}
			}
			else
			{
				
				echo "<form>";
				
				$image1 = "'Image1'";
				$image2 = "'Image2'";
				$path1 = "'image/b-follow1-2.png'";
				$path2 = "'image/b-addf1-2.png'";
				$em="''";
				echo "<a href='add_friend.php?rela=3' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
				<img src='image/b-follow1-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
				echo "<a href='add_friend.php?rela=0' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image2.",".$em.",".$path2.",1)\">
				<img src='image/b-addf1-1.png' name='Image2' width='39' height='39' border='0' id='Image2'></a>";
				
				//echo "<a href='add_friend.php?rela=3'><img src='image/b-follow1-1.png' width='39' height='39'></a>";
				//echo "<a href='add_friend.php?rela=0'><img src='image/b-addf1-1.png' width='39' height='39'></a>";			
				//echo "<input type='button' value='加為朋友' onclick=".$add_fr.">";
				//echo "<input type='button' value='追蹤' onclick=".$add_fo.">";
				echo "<input name='insert' id='insert' type='hidden' value='rela' />";
				echo "</form>";
			}
		}
	}
	echo "<br/>";
	/*$query = "SELECT pid FROM photo WHERE uid IN (SELECT uid FROM user WHERE account = '$account')
	ORDER BY pid desc";
	$result = mysqli_query($link, $query);*/
}
?>