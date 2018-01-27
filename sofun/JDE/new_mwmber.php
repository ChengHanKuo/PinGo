<head>
<?php
//-----------------------------------------
// 在member資料表內插入一筆新的紀錄
//-----------------------------------------

if ((isset($_POST["insert"])) && ($_POST["insert"] == "member_new")) 
{

	// 選擇 MySQL 資料庫ch26
	//mysql_select_db('sofun', $connection) or die('資料庫sofun不存在');	
	  
	// 在member資料表內插入一筆新的紀錄
	$dbname="sofun";
	$link=@mysqli_connect('localhost','root','tw123456',$dbname);
	mysqli_query($link,'SET CHARACTER SET utf8_bin');
	mysqli_query($link,"'SET collation_connection ='utf8_bin'");
		$account = $_POST['account'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$sex = $_POST['sex'];
		//$birthday = $_POST['birthday'];
		$birthday="{$year}-{$month}-{$day}";
		$email = $_POST['email'];
		
	$query = "INSERT INTO user (`account`,`password`) VALUES ('$account', '$password')";
		//GetSQLValue($_POST['account'], "text");
		//GetSQLValue($_POST['password'], "text");
		//GetSQLValue($_POST['name'], "text");
		//GetSQLValue($_POST['sex'], "int");
		//GetSQLValue($_POST['birthday'], "date");
		//GetSQLValue($_POST['email'], "text");

	// 傳回結果集
	$result = mysqli_query($link, $query);
	if($result)
	{
		$sql="SELECT  `uid` FROM  `user` WHERE  `account` ='$account'";
		$result2 = mysqli_query($link, $sql);
		while($row=mysqli_fetch_assoc($result2)){
			$uid=" {$row['uid']}";
		}
		$query2="INSERT INTO user_profile (`uid`,`name`,`sex`,`birthday`,`email`) VALUES ('$uid','$name', '$sex', '$birthday', '$email')" ;
		$result3 = mysqli_query($link, $query2);
		if ($result3) {
			echo "sucess2";
	}}

}
?>
</head>
<body>
<table class="member_new_style1">
  <tr>
    <td class="member_new_style2">
	  <span class="member_new_style3">
        加入會員          
      </span>          
    </td>
  </tr>
  <tr>
    <td>
	  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onkeydown="if(event.keyCode==13) return false;"> 
            <td class="member_new_style16">
        	  <table class="member_new_style9">
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">帳　　號</span>                 
                 </td>
                 <td class="member_new_style12">
                   <input name="account" id="account" type="text" class="member_new_style13" size="20" maxlength="10" 
                     value="<?php echo $_COOKIE['account']; ?>" />
                     <span class="member_new_style8">＊</span>（5~10個字元，請勿使用中文）                 
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     密　　碼
                   </span>
                 </td>
                <td class="member_new_style12">
                   <input name="password" id="password" type="password" class="member_new_style13" size="20" maxlength="12" 
                     value="<?php echo $_COOKIE['password']; ?>" />
                     <span class="member_new_style8">＊</span>（6~12個字元，請勿使用中文）
                 </td>
               </tr>
			   <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     請再輸入一次密碼
                   </span>
                 </td>
                <td class="member_new_style12">
                   <input name="password_confirm" id="password_confirm" type="password" class="member_new_style13" size="20" maxlength="12" 
                     value="<?php echo $_COOKIE['password_confirm']; ?>" />
                     <span class="member_new_style8">＊</span>
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     姓　　名
                   </span> 
                 </td>
                <td class="member_new_style12">
                   <input name="name" id="name" type="text" class="member_new_style13" size="20" maxlength="40" 
                     value="<?php echo $_COOKIE['name']; ?>" />
                     <span class="member_new_style8">＊</span>123
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     性　　別
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <!-- 點選[性別]欄位值為 男 -->
                   <input name="sex" type="radio" value="0" class="member_new_style14" 
                   <?php 
				     // 檢查之前點選的[性別]欄位值是否是 "男" 
					 if (!empty($_COOKIE['sex']))
					 {
					   if (uniDecode($_COOKIE['sex']) == "0")
					   {
						 echo "checked=\"checked\"";
					   }
				  	 }
					 else
					 {
					   echo "checked=\"checked\"";
					 } 
				   ?> />
                   男
                   <input name="sex" type="radio" value="1" 
                   <?php 
					 if (!empty($_COOKIE['sex']))
					 {
					   if (uniDecode($_COOKIE['sex']) == "1")
					   {
						 echo "checked=\"checked\"";
					   }
				  	 }
				   ?> />
                   女
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     電子信箱
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <input name="email" id="email" type="text" class="member_new_style13" size="40" maxlength="40" 
                     value="<?php echo $_COOKIE['email']; ?>" />
                     <span class="member_new_style8">＊</span>
                 </td>
               </tr>
               <tr>
                 <td class="member_new_style10">
                   <span class="member_new_style11">
                     出生日期
                   </span> 
                 </td>
                 <td class="member_new_style12">
                   <input name="year" id="year" type="text" class="member_new_style13" size="6" maxlength="4" 
                     value="<?php echo $_COOKIE['year']; ?>" />
                     &nbsp;年&nbsp;
                   <!-- 在選單中填入[出生日期]的[月]欄位值 -->
	               <select name="month" id="month">
                   <?php
		             for ($i = 1; $i <= 12; $i++)
		             {
		           ?>
                     <option value="<?php echo $i ?>" 
              		  <?php 
					    if (!empty($_COOKIE['month']))
						{
						  if ($i == $_COOKIE['month'])
						  {
						    echo "selected=\"selected\"";
						  }
						} 
					  ?>>
                      &nbsp;&nbsp;<?php echo $i ?>&nbsp; 
                     </option>         
                   <?php
                     }
		           ?>
                   </select>
                     &nbsp;月&nbsp;&nbsp;
		           <select name="day" id="day">                   
                   <!-- 在選單中填入[出生日期]的[日]欄位值 -->
                   <?php
		             for ($i = 1; $i <= 31; $i++)
		             {
		           ?>
                     <option value="<?php echo $i ?>" 
					   <?php 
					    if (!empty($_COOKIE['day']))
						{
						  if ($i == $_COOKIE['day'])
						  {
						    echo "selected=\"selected\"";
						  }
						}
					   ?>>
                       &nbsp;&nbsp;<?php echo $i ?>&nbsp;&nbsp; 
                     </option>         
                   <?php
                     }
		           ?>
                   </select>
                   &nbsp;日&nbsp;&nbsp;
                   <span class="member_new_style8">＊</span>（請填入西元年, 例如 2010）
                 </td>
               </tr>
         <tr>
           <td class="member_new_style2">
             <table class="member_new_style9">
               <tr>
                 <td class="member_new_style2">
                   <input type="submit" value="確定送出" onclick="return CheckFields();" />
                   <input type="button" value="取消" class="member_new_style15" 
                   	 onclick="document.location='<?php echo $_SESSION['PrevPage']; ?>'; return false;" />
                 </td>
               </tr>
             </table> 
           </td>
         </tr>
			</table>
	  <input name="insert" id="insert" type="hidden" value="member_new" />
	  </form>
    </td>
 </tr>

</body>