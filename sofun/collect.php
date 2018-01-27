<?php
session_start();
$uid = $_SESSION['uid'];

$dbname="sofun";
$link=@mysqli_connect('localhost','root','tw123456',$dbname);
mysqli_query($link,"SET NAMES 'UTF8'");
mysqli_query($link,'SET CHARACTER SET utf8_bin');
mysqli_query($link,"'SET collation_connection ='utf8_bin'");

$query_account="SELECT account FROM user WHERE uid = $uid";
$result_account = mysqli_query($link, $query_account);
while($row_account=mysqli_fetch_assoc($result_account))
	$account_bar=$row_account['account'];
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<script type="text/javascript" src="https://googledrive.com/host/0B6dtn0LtYgFgUUFtMzhOWHpyQ0k/jquery-1.7.2.min.js"></script>
		
		<script src="booklet/jquery.easing.1.3.js" type="text/javascript"></script>
		<script src="booklet/jquery.booklet.1.1.0.min.js" type="text/javascript"></script>
		
		<link rel="stylesheet" type="text/css" href="css/menu.css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/style_notice.css" />

		<link href="booklet/jquery.booklet.1.1.02.css" type="text/css" rel="stylesheet" media="screen" />
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>

		<script src="cufon/cufon-yui.js" type="text/javascript"></script>
		<script src="cufon/ChunkFive_400.font.js" type="text/javascript"></script>
		<script src="cufon/Note_this_400.font.js" type="text/javascript"></script>
	  	<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>		
		<script type="text/javascript">

		</script>
		<!---------------------------------------------------------------------------------->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="Nifty Modal Window Effects with CSS Transitions and Animations" />
		<meta name="keywords" content="modal, window, overlay, modern, box, css transition, css animation, effect, 3d, perspective" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default (2).css" />
		<link rel="stylesheet" type="text/css" href="css/component (2).css" />
		<script src="js/modernizr.custom.js"></script>
		
    </head>
    <body style="overflow-y: hidden; overflow-x: hidden;">
	<div id='cssmenu'>
<ul>
	<li class='has-sub'><a href="main_new.php">首頁</a>
   <li class='has-sub'><a href="function.php">功能</a>
   <li class='has-sub'><a href='#'><span>通知</span></a>
      <ul>

		
	 <?php
		$query_n="SELECT uid1, n_content, pid FROM notice WHERE uid2 = $uid ORDER BY nid DESC";
		$result_n = mysqli_query($link, $query_n);
		while($row_n=mysqli_fetch_assoc($result_n))
		{
			$uid_n=$row_n['uid1'];
			$pid_n[]=$row_n['pid'];
			$n_content[]=$row_n['n_content'];
			$query_a="SELECT account FROM user WHERE uid = $uid_n";
			$result_a = mysqli_query($link, $query_a);
			while($row_a=mysqli_fetch_assoc($result_a))
				$account_n[]=$row_a['account'];
		}
		for($n=0;$n<count($account_n);$n++)
		{
			if($n==count($account_n)-1)
			{
				if($pid_n[$n]==0)
					echo "<li class='last'><a href='personal.php?account=$account_n[$n]'><span>$account_n[$n]$n_content[$n]</span></a></li>";
				else
					echo "<li class='last'><a href='photo.php?pid=$pid_n[$n]'><span>$account_n[$n]$n_content[$n]</span></a></li>";
			}
			else
			{
				if($pid_n[$n]==0)
					echo "<li><a href='personal.php?account=$account_n[$n]'><span>$account_n[$n]$n_content[$n]</span></a></li>";
				else
					echo "<li><a href='photo.php?pid=$pid_n[$n]'><span>$account_n[$n]$n_content[$n]</span></a></li>";
			}
		}	
	  ?>
      </ul>
	  	  <?php echo "<li class='has-sub'><a href='personal.php?account=$account_bar'><span>$account_bar</span></a>";?>

   </li>
</ul>
</div>
	<script>
	function addOption(list, text, value){
		var index=list.options.length;
		list.options[index]=new Option(text, value);
		list.selectedIndex=index;
	}
	</script>
	<?php
	if ((isset($_POST["book"])) && ($_POST["book"] == "book"))
	{
		$bookmark = $_POST['mod'];
		$pid2= $_GET['pid'];
		
		$query_check="SELECT bid FROM book WHERE bname = '$bookmark'";
		$result_check= mysqli_query($link, $query_check);
		if($row_check=mysqli_fetch_array($result_check))
		{
		}
		else
		{
			$query_newb="INSERT INTO book (`bname`) VALUES ('$bookmark')";
			$result_newb= mysqli_query($link, $query_newb);
		}	
			$q3="SELECT bid FROM book WHERE bname = '$bookmark'";
			$r3=mysqli_query($link, $q3);
			while($row3=mysqli_fetch_array($r3))
				$bid=$row3['bid'];
			$query_update="UPDATE `collect` SET `bid` = '$bid' WHERE `pid` = '$pid2';";
			$result_update= mysqli_query($link, $query_update);
	}
	
	
	
	
	$query_b="SELECT bname FROM book WHERE bid IN (SELECT DISTINCT bid FROM collect WHERE uid = $uid) ORDER BY bid";
	$result_b= mysqli_query($link, $query_b);
	while($row_b=mysqli_fetch_array($result_b))
	{
		$bname[]=$row_b['bname'];
	}
	$bcount=count($bname);
	/*if ($bname[0]=="未分類")
	{
		for ($i=1;$i<$bcount;$i++)
		{
			echo "<a href='collect.php?b={$bname[$i]}'>{$bname[$i]}</a>";
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
		}
		echo "<a href='collect.php?b={$bname[0]}'>{$bname[0]}</a>";
	}
	else
	{
		for ($i=0;$i<$bcount;$i++)
			{
				echo "<a href='collect.php?b={$bname[$i]}'>{$bname[$i]}</a>";
				echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
			}	
	}*/
	//-----------------------------------------------------------------------------------------------------------------
	if(isset ($_GET['b']))
		$b=$_GET['b'];
	else
	{
		if($bname[0]!="未分類")
			$b=$bname[0];
		else
		{
			if(isset($bname[1]))
				$b=$bname[1];
			else
				$b=$bname[0];
		}	
	}
	if($b=="未分類")
		$check_b=0;
	else
		$check_b=9999999;
	$query = "SELECT pid FROM collect WHERE uid = $uid AND bid IN (SELECT bid FROM book WHERE bname = '$b')";
	$result = mysqli_query($link, $query);
	$pid=array();
	while($row=mysqli_fetch_array($result))
	{		
		$pid[] = $row['pid'];
	}
	/*else
	{
			$query = "SELECT pid FROM collect WHERE uid = $uid AND bid != '999999999'";
			$result = mysqli_query($link, $query);
			$check_b=0;
			$pid=array();
			while($row=mysqli_fetch_array($result))
			{		
				$pid[] = $row['pid'];
				$check_b=$check_b+1;
			}
			$query1 = "SELECT pid FROM collect WHERE uid = $uid AND bid = '999999999'";
			$result1 = mysqli_query($link, $query1);
			while($row1=mysqli_fetch_array($result1))
			{		
				$pid[] = $row1['pid'];
			}
	}*/
	//-----------------------------------------------------------------------------------------------------------------------------	
		$count = count($pid);
		for($j=0;$j<$count;$j++)
		{
			$query2="SELECT location, uid, type, description, altitude, latitude FROM photo WHERE pid = $pid[$j]";
			$result2 = mysqli_query($link, $query2);
			$uid2 = array();
			$type=array();
			while($row2=mysqli_fetch_array($result2))
			{
				$location[]=$row2['location'];
				$uid2[]=$row2['uid'];
				$type[]=$row2['type'];
				$des[]=$row2['description'];
				$lat[]=$row2['latitude'];
				$lon[]=$row2['altitude'];
				$query3="SELECT account FROM user WHERE uid = $uid2[0]";
				$result3 = mysqli_query($link, $query3);
				while($row3=mysqli_fetch_array($result3))
				{
					$account[]=$row3['account'];
				}
			}
			echo "<div class='md-modal2 md-effect-1' id='b{$j}'>
							<div class='md-content'>
							<h3>帶我去玩!!</h3>
							<div>
							<iframe src='SetFrom.php?destination={$lat[$j]},{$lon[$j]}' width='720' height='400' name='map' style='position:left:100' scrolling='NO' frameborder='0'></iframe>
							<button class='md-close'>Close me!</button>
							</div>
							</div>
							</div>";
		}
	//-----------------------------------------------------------------------------------------------------------------
	?>

		<div class="book_wrapper">
			<a id="next_page_button"></a>
			<a id="prev_page_button"></a>
			<div id="loading" class="loading">Loading pages...</div>
			<div id="mybook" style="display:none;">
			<?php
			if(isset($b))
			{
				//echo "<div style='position:absolute;width:50;height:100;background-color:red;left:20;top:-100;'>全部</div>";
				$position=20;
				if ($bname[0]=="未分類")
				{
					if(isset($bname[1]))
					{
						for($c=1;$c<$bcount;$c++)
						{
							$position=75*($c-1)+20;
							if($bname[$c]==$b)
								echo "<div style='position:absolute;width:50;height:140;background-image:url(image/bookmark/{$c}-1.png);left:$position;top:-100;'><div style='width:5;margin-left:17;margin-top:10;'><font size=4 face='微軟正黑體' color='white'><strong><a href='collect.php?b=$bname[$c]' style='text-decoration:none;color:white;'>$bname[$c]</a></strong></font></div></div>";
							else
								echo "<div style='position:absolute;width:50;height:100;background-image:url(image/bookmark/{$c}-2.png);left:$position;top:-100;'><div style='width:5;margin-left:17;margin-top:10;'><font size=4 face='微軟正黑體' color='white'><strong><a href='collect.php?b=$bname[$c]' style='text-decoration:none;color:white;'>$bname[$c]</a></strong></font></div></div>";
						}
						$position=$position+75;
						if ($b=="未分類")
							echo "<div style='position:absolute;width:50;height:140;background-image:url(image/bookmark/{$c}-1.png);left:$position;top:-100;'><div style='width:5;margin-left:17;margin-top:10;'><font size=4 face='微軟正黑體' color='white'><strong><a href='collect.php?b=$bname[0]' style='text-decoration:none;color:white;'>$bname[0]</a></strong></font></div></div>";
						else
							echo "<div style='position:absolute;width:50;height:100;background-image:url(image/bookmark/{$c}-2.png);left:$position;top:-100;'><div style='width:5;margin-left:17;margin-top:10;'><font size=4 face='微軟正黑體' color='white'><strong><a href='collect.php?b=$bname[0]' style='text-decoration:none;color:white;'>$bname[0]</a></strong></font></div></div>";
					}
					else
						echo "<div style='position:absolute;width:50;height:140;background-image:url(image/bookmark/1-1.png);left:$position;top:-100;'><div style='width:5;margin-left:17;margin-top:10;'><font size=4 face='微軟正黑體' color='white'><strong><a href='collect.php?b=$bname[0]' style='text-decoration:none;color:white;'>$bname[0]</a></strong></font></div></div>";
				}
				else
				{
					for($c=0;$c<$bcount;$c++)
					{
						$d=$c+1;
						$position=75*($c)+20;
						if($bname[$c]==$b)
							echo "<div style='position:absolute;width:50;height:140;background-image:url(image/bookmark/{$d}-1.png);left:$position;top:-100;'><div style='width:5;margin-left:17;margin-top:10;'><font size=4 face='微軟正黑體' color='white'><strong><a href='collect.php?b=$bname[$c]' style='text-decoration:none;color:white;'>$bname[$c]</a></strong></font></div></div>";
						else
							echo "<div style='position:absolute;width:50;height:100;background-image:url(image/bookmark/{$d}-2.png);left:$position;top:-100;'><div style='width:5;margin-left:17;margin-top:10;'><font size=4 face='微軟正黑體' color='white'><strong><a href='collect.php?b=$bname[$c]' style='text-decoration:none;color:white;'>$bname[$c]</a></strong></font></div></div>";
					}					
				}
			}
			/*else
			{
				echo "<div style='position:absolute;width:50;height:140;background-color:red;left:20;top:-100;'>全部</div>";
				for($c=0;$c<$bcount;$c++)
				{
					$position=75*($c+1)+20;
					echo "<div style='position:absolute;width:50;height:100;background-color:red;left:$position;top:-100;'>$bname[$c]</div>";
				}				
			}*/
			?>
				<div class="b-load">
					<?php
					for($i='0';$i<$count;$i++)
					{
						echo "<div>";
						$m=$type[$i]+1;
						echo "<img src='upload_photo/{$pid[$i]}.jpg' alt='' width=300 height=235/><br/>
						<div style='text-align:right;width:90%'><font face='Note this' size='3'>by {$account[$i]}<br/></font></div>";
							echo "<div style='position:absolute;top:60%;left:60%;'>";
							if($i>=$check_b)
							{
								echo"<form name='form1' method='post' action='/collect.php?pid={$pid[$i]}'>";
								echo "分類：";
								echo "<select id=mod name=mod size=1>";
								if($bcount>1)
								{
									for($j=0;$j<$bcount;$j++)
									{
										echo "<option value=$bname[$j]>$bname[$j]</option>";
									}
								}
								echo "</select>";							
								//Value: <input id=theValue value='test'>";
								echo "<input type='submit' value='選擇' /><br/>";
								if($bcount==5)
									echo "已達書籤上限!";
								else
								{
									echo "書籤： <input id=theText value='' size=5>";
									echo "<input type='button' value='增加' onclick='addOption(mod, theText.value, theText.value)'/>";
								}
								echo "<input name='book' id='book' type='hidden' value='book' />";	
								echo "</form>";
							}
							echo "</div>";
						echo "<div style='position:absolute;top:51%;left:5%;'><img src='image/mod/$m.png' width=47 height=47 style='border:none;'></div>";
						echo "<div><button class='md-trigger' data-modal='b{$i}' style='background-image:url(image/collect/b-car.png);width:59px;height:59px;position:absolute;top:52%;left:35%';></button></div>";
						echo "<div style='position:absolute;top:63%;left:5%;'><img src='image/collect/i-loc.png' width=47 height=47 style='border:none;'></div>";
						echo "<div style='position:absolute;top:74%;left:5%;'><img src='image/collect/i-des.png' width=47 height=47 style='border:none;'></div>";
						echo "<div style='position:absolute;top:78%;left:27%;'><font face='華康秀風體W3' size='4'>{$des[$i]}</font></div>";
						echo "<div style='position:absolute;top:68%;left:27%;'><font face='華康秀風體W3' size='4'>{$location[$i]}</font></div>";
						echo "</div>";
					}					?>
				</div>
			</div>
		</div>

        <!-- The JavaScript -->

        <script type="text/javascript">
			$(function() {
				var $mybook 		= $('#mybook');
				var $bttn_next		= $('#next_page_button');
				var $bttn_prev		= $('#prev_page_button');
				var $loading		= $('#loading');
				var $mybook_images	= $mybook.find('img');
				var cnt_images		= $mybook_images.length;
				var loaded			= 0;
				//preload all the images in the book,
				//and then call the booklet plugin

				$mybook_images.each(function(){
					var $img 	= $(this);
					var source	= $img.attr('src');
					$('<img/>').load(function(){
						++loaded;
						if(loaded == cnt_images){
							$loading.hide();
							$bttn_next.show();
							$bttn_prev.show();
							$mybook.show().booklet({
								name:               null,                            // name of the booklet to display in the document title bar
								width:              800,                             // container width
								height:             500,                             // container height
								speed:              600,                             // speed of the transition between pages
								direction:          'LTR',                           // direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left
								startingPage:       0,                               // index of the first page to be displayed
								easing:             'easeInOutQuad',                 // easing method for complete transition
								easeIn:             'easeInQuad',                    // easing method for first half of transition
								easeOut:            'easeOutQuad',                   // easing method for second half of transition

								closed:             true,                           // start with the book "closed", will add empty pages to beginning and end of book
								closedFrontTitle:   null,                            // used with "closed", "menu" and "pageSelector", determines title of blank starting page
								closedFrontChapter: null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank starting page
								closedBackTitle:    null,                            // used with "closed", "menu" and "pageSelector", determines chapter name of blank ending page
								closedBackChapter:  null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank ending page
								covers:             false,                           // used with  "closed", makes first and last pages into covers, without page numbers (if enabled)

								pagePadding:        10,                              // padding for each page wrapper
								pageNumbers:        true,                            // display page numbers on each page

								hovers:             false,                            // enables preview pageturn hover animation, shows a small preview of previous or next page on hover
								overlays:           false,                            // enables navigation using a page sized overlay, when enabled links inside the content will not be clickable
								tabs:               false,                           // adds tabs along the top of the pages
								tabWidth:           60,                              // set the width of the tabs
								tabHeight:          20,                              // set the height of the tabs
								arrows:             false,                           // adds arrows overlayed over the book edges
								cursor:             'pointer',                       // cursor css setting for side bar areas

								hash:               false,                           // enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with 'hash' enabled
								keyboard:           true,                            // enables navigation with arrow keys (left: previous, right: next)
								next:               $bttn_next,          			// selector for element to use as click trigger for next page
								prev:               $bttn_prev,          			// selector for element to use as click trigger for previous page

								menu:               null,                            // selector for element to use as the menu area, required for 'pageSelector'
								pageSelector:       false,                           // enables navigation with a dropdown menu of pages, requires 'menu'
								chapterSelector:    false,                           // enables navigation with a dropdown menu of chapters, determined by the "rel" attribute, requires 'menu'

								shadows:            true,                            // display shadows on page animations
								shadowTopFwdWidth:  166,                             // shadow width for top forward anim
								shadowTopBackWidth: 166,                             // shadow width for top back anim
								shadowBtmWidth:     50,                              // shadow width for bottom shadow

								before:             function(){},                    // callback invoked before each page turn animation
								after:              function(){}                     // callback invoked after each page turn animation
							});
							Cufon.refresh();
						}
					}).attr('src',source);
				});
				
			});
        </script>
				<div class="md-overlay"></div><!-- the overlay element -->

		<!-- classie.js by @desandro: https://github.com/desandro/classie -->
		<script src="js/classie.js"></script>
		<script src="js/modalEffects.js"></script>

		<!-- for the blur effect -->
		<!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>
		<script src="js/cssParser.js"></script>
		<script src="js/css-filters-polyfill.js"></script>
    </body>
</html>
