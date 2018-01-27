<?php
session_start();
$uid = $_SESSION['uid'];

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");

$account = $_GET["account"];
$query_id = "SELECT uid FROM user WHERE account = '$account'";
$result_id = mysqli_query($link, $query_id);
while($row_id=mysqli_fetch_assoc($result_id))
{
	$uid2=$row_id['uid'];
}
if($uid!=$uid2)
{
	$query2 = "SELECT relation FROM friend WHERE uid1 = $uid AND uid2 = $uid2";
	$result2 = mysqli_query($link, $query2);
	
	$query3 = "SELECT relation FROM friend WHERE uid2 = $uid AND uid1 = $uid2";
	$result3 = mysqli_query($link, $query3);
	
	$add_fr="\"document.location='/add_friend.php?rela=0&account=$account'\"";
	$check_fr="\"document.location='/add_friend.php?rela=1&account=$account'\"";
	$dis_fr="\"document.location='/add_friend.php?rela=2&account=$account'\"";
	$add_fo="\"document.location='/add_friend.php?rela=3&account=$account'\"";
	$dis_fo="\"document.location='/add_friend.php?rela=4&account=$account'\"";
	$confirm_fr="\"document.location='/add_friend.php?rela=5&account=$account'\"";
	
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
						/*echo "<a href='add_friend.php?rela=4&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
						<img src='image/b-follow2-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
						echo "<a href='add_friend.php?rela=5&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image2.",".$em.",".$path2.",1)\">
						<img src='image/b-addc1-1.png' name='Image2' width='39' height='39' border='0' id='Image2'></a>";*/
						
						//echo "<a href='add_friend.php?rela=4'><img src='image/b-follow2-1.png' width='39' height='39'></a>";
						//echo "<a href='add_friend.php?rela=5'><img src='image/b-addc1-1.png' width='39' height='39'></a>";
						echo "<input type='button' value='接受為朋友' onclick=".$confirm_fr.">";
						echo "<input type='button' value='取消追蹤' onclick=".$dis_fo.">";
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
						/*echo "<a href='add_friend.php?rela=3&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
						<img src='image/b-follow1-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
						echo "<a href='add_friend.php?rela=5&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image2.",".$em.",".$path2.",1)\">
						<img src='image/b-addc1-1.png' name='Image2' width='39' height='39' border='0' id='Image2'></a>";*/
						
						//echo "<a href='add_friend.php?rela=3'><img src='image/b-follow1-1.png' width='39' height='39'></a>";
						//echo "<a href='add_friend.php?rela=5'><img src='image/b-addc1-1.png' width='39' height='39'></a>";						
						echo "<input type='button' value='接受為朋友' onclick=".$confirm_fr.">";
						echo "<input type='button' value='追蹤' onclick=".$add_fo.">";
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
							/*echo "<a href='add_friend.php?rela=4&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
							<img src='image/b-follow2-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
							echo "<a href='add_friend.php?rela=0&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image2.",".$em.",".$path2.",1)\">
							<img src='image/b-addf1-1.png' name='Image2' width='39' height='39' border='0' id='Image2'></a>";*/
							
							//echo "<a href='add_friend.php?rela=4'><img src='image/b-follow2-1.png' width='39' height='39'></a>";
							//echo "<a href='add_friend.php?rela=0'><img src='image/b-addf1-1.png' width='39' height='39'></a>";							
							echo "<input type='button' value='加為朋友' onclick=".$add_fr.">";
							echo "<input type='button' value='取消追蹤' onclick=".$dis_fo.">";
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
							//echo "<a href='add_friend.php?rela=1&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
							//<img src='image/b-addw1-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
							
							//echo "<a href='add_friend.php?rela=1&account=$account'><img src='image/b-addw1-1.png' width='39' height='39'></a>";
							echo "<input type='button' value='收回邀請' onclick=".$check_fr.">";
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
							/*echo "<a href='add_friend.php?rela=2&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
							<img src='image/b-remf1-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";*/
							
							//echo "<a href='add_friend.php?rela=2'><img src='image/b-remf1-1.png' width='39' height='39'></a>";
							echo "<input type='button' value='取消好友' onclick=".$dis_fr.">";
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
					/*echo "<a href='add_friend.php?rela=3&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
					<img src='image/b-follow1-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
					echo "<a href='add_friend.php?rela=0&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image2.",".$em.",".$path2.",1)\">
					<img src='image/b-addf1-1.png' name='Image2' width='39' height='39' border='0' id='Image2'></a>";*/
					
					//echo "<a href='add_friend.php?rela=3'><img src='image/b-follow1-1.png' width='39' height='39'></a>";
					//echo "<a href='add_friend.php?rela=0'><img src='image/b-addf1-1.png' width='39' height='39'></a>";
					echo "<input type='button' value='加為朋友' onclick=".$add_fr.">";
					echo "<input type='button' value='追蹤' onclick=".$add_fo.">";
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
						/*echo "<a href='add_friend.php?rela=4&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
						<img src='image/b-follow2-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
						echo "<a href='add_friend.php?rela=0&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image2.",".$em.",".$path2.",1)\">
						<img src='image/b-addf1-1.png' name='Image2' width='39' height='39' border='0' id='Image2'></a>";*/
						
						//echo "<a href='add_friend.php?rela=4'><img src='image/b-follow2-1.png' width='39' height='39'></a>";
						//echo "<a href='add_friend.php?rela=0'><img src='image/b-addf1-1.png' width='39' height='39'></a>";
						
						echo "<input type='button' value='加為朋友' onclick=".$add_fr.">";
						echo "<input type='button' value='取消追蹤' onclick=".$dis_fo.">";
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
						/*echo "<a href='add_friend.php?rela=1&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
						<img src='image/b-addw1-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";*/

						
						//echo "<a href='add_friend.php?rela=1'><img src='image/b-addw1-1.png' width='39' height='39'></a>";
						echo "<input type='button' value='收回邀請' onclick=".$check_fr.">";
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
						/*echo "<a href='add_friend.php?rela=2&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
						<img src='image/b-remf1-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";*/
						
						//echo "<a href='add_friend.php?rela=2'><img src='image/b-remf1-1.png' width='39' height='39'></a>";
						echo "<input type='button' value='取消好友' onclick=".$dis_fr.">";
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
				/*echo "<a href='add_friend.php?rela=3&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image1.",".$em.",".$path1.",1)\">
				<img src='image/b-follow1-1.png' name='Image1' width='39' height='39' border='0' id='Image1'></a>";
				echo "<a href='add_friend.php?rela=0&account=$account' onMouseOut='MM_swapImgRestore()' onMouseOver=\"MM_swapImage(".$image2.",".$em.",".$path2.",1)\">
				<img src='image/b-addf1-1.png' name='Image2' width='39' height='39' border='0' id='Image2'></a>";*/
				
				//echo "<a href='add_friend.php?rela=3'><img src='image/b-follow1-1.png' width='39' height='39'></a>";
				//echo "<a href='add_friend.php?rela=0'><img src='image/b-addf1-1.png' width='39' height='39'></a>";			
				echo "<input type='button' value='加為朋友' onclick=".$add_fr.">";
				echo "<input type='button' value='追蹤' onclick=".$add_fo.">";
				echo "<input name='insert' id='insert' type='hidden' value='rela' />";
				echo "</form>";
			}
		}
	}
	echo "<br/>";
}
?>