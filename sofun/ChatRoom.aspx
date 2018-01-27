<%@ Page language="c#" Inherits="ch81.ChatRoom" codePage="936" CodeFile="ChatRoom.aspx.cs" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<HTML>
 <HEAD>
  <title>聊天室</title>
  <meta content="Microsoft Visual Studio .NET 7.1" name="GENERATOR">
  <meta content="C#" name="CODE_LANGUAGE">
  <meta content="JavaScript" name="vs_defaultClientScript">
  <meta content="http://schemas.microsoft.com/intellisense/ie5" name="vs_targetSchema">
  <LINK href="global.css" type="text/css" rel="stylesheet">
  <script language="javascript">
  //發送消息
  function send()
  {
   var txtContent = document.all("content").value; //文本框輸入內容
   if (txtContent == "") return;
   
   var user_to = document.all("userlist").value;  //聊天對象
   var textcolor = document.all("textcolor").value;  //顏色
   var expression = document.all("expression").value;  //表情
   var isPublic = !(document.all("isSecret").checked);  //是否密談    
   
   //調用伺服器端方法發送消息
   ch81.ChatRoom.SendMsg(txtContent, user_to, textcolor, expression, isPublic);
   
   //更新聊天內容顯示
   var div = document.all("chatcontent");
   div.innerHTML = ch81.ChatRoom.GetNewMsgString().value + div.innerHTML;
   
   //清空輸入框
   document.all("content").value = "";
  }
  
  //定時更新聊天內容
  function refresh_chatcontent()
  {
   //調用伺服器方法獲取最新消息的HTML字串
   var div = document.all("chatcontent");
   var strNewMsg = ch81.ChatRoom.GetNewMsgString().value;
   
   //判斷是否為空，避免不必要的更新
   if (strNewMsg != "")
    div.innerHTML = strNewMsg + div.innerHTML;
    
   //定時更新
   window.setTimeout(refresh_chatcontent, 1000);
  }
  
  //更新用戶列表（左側和下拉清單）
  function refresh_onlineusers()
  {
   //發送對象列表
   var userlist = document.all("userlist");
   
   //調用伺服器端方法獲取用戶列表字串（用逗號分隔）
   var strUserlist = ch81.ChatRoom.GetOnlineUserString().value;
   
   //獲取用戶端顯示的用戶列表字串
   var strUserlistClient = "";
   for (var i = 1;i < userlist.options.length;i++)
   {
    if (i != userlist.options.length - 1)
    {
     strUserlistClient += userlist.options[i].value + ",";
    }
    else
    {
     strUserlistClient += userlist.options[i].value;
    }
   }
   
   if (strUserlistClient != strUserlist)  //線上用戶列表發生變化
   {
    var userArr = strUserlist.split(',');
    
    //線上用戶數
    var usercount = document.all("usercount");
    usercount.innerHTML = "線上名單：（" + userArr.length + "人）";
    
    //左邊用戶列表
    var tableHTML = "<table>";
    for (var i = 0;i < userArr.length;i++)
    {
     tableHTML += "<tr><td><label onmouseover=\"this.style.cursor='hand'\" onmouseout=\"this.style.cursor='default'\" onclick=\"setObj('" + userArr[i] + "')\">" + userArr[i] + "</label></td></tr>";
    }
    tableHTML += "</table>";
    var div = document.all("onlineusers");
    div.innerHTML = tableHTML;
    
    
    //初始化
    while (userlist.options.length > 0)
    {
     userlist.removeChild(userlist.options[0]);  //清空所有選項
    }
    
    //增加“所有的人”選項
    var oOption = document.createElement("OPTION");
    oOption.text = "所有的人";
    oOption.value = "大家";
    userlist.add(oOption);
    
    //下拉清單中增加線上用戶的選項
    for (var i = 0;i < userArr.length;i++)
    {
     var oOption = document.createElement("OPTION");
     oOption.text = userArr[i];
     oOption.value = userArr[i];
     userlist.add(oOption);
    }     
   }   
   
   //每隔1秒更新
   window.setTimeout(refresh_onlineusers, 1000);
  }
  
  //退出聊天室
  function logout()
  {
   ch81.ChatRoom.Logout();
  } 
  
  //設置聊天對象
  function setObj(str)
  {
   var userlist = document.all("userlist");
   for (var i = 0;i < userlist.options.length;i++)
   {
    if (str == userlist.options[i].value)
    {
     userlist.selectedIndex = i;
     break;      
    }
   }
  }
  
  //關閉流覽器窗口
  function Close()
  { 
   var ua = navigator.userAgent;
   var ie = navigator.appName == "Microsoft Internet Explorer" ? true:false;
   if (ie) 
   { 
    var IEversion=parseFloat(ua.substring(ua.indexOf("MSIE ")+5,ua.indexOf(";",ua.indexOf("MSIE "))));
    if (IEversion< 5.5) 
    { 
      var str  = '<object id=noTipClose classid="clsid:ADB880A6-D8FF-11CF-9377-00AA003B7A11">'; 
      str += '<param name="Command" value="Close"></object>'; 
      document.body.insertAdjacentHTML("beforeEnd", str); 
      document.all.noTipClose.Click();
    } 
    else 
    { 
     window.opener = null; 
     window.close(); 
    }
   } 
   else 
   { 
    window.close();
   } 
  }

  </script>
 </HEAD>
 <body bottomMargin="0" onbeforeunload="logout()" leftMargin="0" topMargin="0" rightMargin="0">
  <form id="Form1" method="post" runat="server">
   <TABLE id="Table1" height="100%" cellSpacing="0" cellPadding="0" width="100%" border="0">
    <TR>
     <TD style="FONT-SIZE: 12px" vAlign="top" width="150" background="img/onlinebg.jpg"><br>
      <br>
      <div id="usercount"></div>
      <div id="onlineusers"></div>
     </TD>
     <TD vAlign="top" background="img/bgbrick.gif">
      <table width="100%">
       <tr>
        <td align="center" style="FONT-WEIGHT: bold; FONT-SIZE: 18px; COLOR: #337755; FONT-FAMILY: 宋體, Arial">
         <br>
         歡迎光臨本聊天室!
         <hr>
        </td>
       </tr>
       <tr>
        <td vAlign="top" height="575">
         <div id="chatcontent" style="OVERFLOW-Y: scroll;WIDTH: 100%; POSITION: relative; HEIGHT: 100%"></div>
        </td>
       </tr>
      </table>

     </TD>
    </TR>
    <TR height="65">
     <TD bgColor="#0099cc" align="center" valign="center">
     <label onmouseover="this.style.cursor='hand'" onmouseout="this.style.cursor='default'" onclick="document.all('chatcontent').innerHTML = ''" style="FONT-SIZE:14px;FONT-WEIGHT: bold; COLOR: #ffcc00; TEXT-ALIGN: center">清空螢幕</label>
     <br>
     <label onmouseover="this.style.cursor='hand'" onmouseout="this.style.cursor='default'" onclick="if (confirm('您確定要退出該聊天室嗎？')) Close();" style="FONT-SIZE:14px;FONT-WEIGHT: bold; COLOR: #ffcc00; TEXT-ALIGN: center">退出聊天</label>
     </TD>
     <TD style="FONT-SIZE: 13px" align="center" background="img/chatformbg.jpg">顏色：
      <select style="FONT-SIZE: 12px" name="textcolor">
       <option style="COLOR: #000000" value="000000" selected>
       絕對黑色<option style="COLOR: #000080" value="000080">
       憂鬱的藍<option style="COLOR: #0000ff" value="0000ff">
       碧空藍天<option style="COLOR: #008080" value="008080">
       灰藍種族<option style="COLOR: #0080ff" value="0080ff">
       蔚藍海洋<option style="COLOR: #8080ff" value="8080ff">
       清清之藍<option style="COLOR: #8000ff" value="8000ff">
       發亮藍紫<option style="COLOR: #aa00cc" value="aa00cc">
       紫的拘謹<option style="COLOR: #808000" value="808000">
       卡其制服<option style="COLOR: #808080" value="808080">
       倫敦灰霧<option style="COLOR: #ccaa00" value="ccaa00">
       卡布其諾<option style="COLOR: #800000" value="800000">
       苦澀心紅<option style="COLOR: #ff0000" value="ff0000">
       正宗喜紅<option style="COLOR: #ff0080" value="ff0080">
       愛的暗示<option style="COLOR: #ff00ff" value="ff00ff">
       紅的發紫<option style="COLOR: #ff8080" value="ff8080">
       紅旗飄飄<option style="COLOR: #ff8000" value="ff8000">
       黃金歲月<option style="COLOR: #ff80ff" value="ff80ff">
       紫金繡貼<option style="COLOR: #008000" value="008000">
       橄欖樹綠<option style="COLOR: #345678" value="345678">我不知道</option>
      </select>
      表情：
      <select style="FONT-SIZE: 12px" name="expression">
       <option value="" selected>
       請選擇<option value="笑著">
       笑著<option value="高興地">
       高興地<option value="含情脈脈">
       含情脈脈<option value="微笑">
       微笑<option value="幸福">
       幸福<option value="有點臉紅">
       有點臉紅<option value="使勁安慰">
       使勁安慰<option value="自言自語">
       自言自語<option value="差點要哭">
       差點要哭<option value="嚎啕大哭">
       嚎啕大哭<option value="一把鼻涕">
       一把鼻涕<option value="很無辜">
       很無辜<option value="流口水">
       流口水<option value="神秘兮兮">
       神秘兮兮<option value="幸災樂禍">
       幸災樂禍<option value="很不服氣">
       很不服氣<option value="不懷好意">
       不懷好意<option value="拳打腳踢">
       拳打腳踢<option value="不知所措">
       不知所措<option value="翻箱倒櫃">
       翻箱倒櫃<option value="很遺憾">
       很遺憾<option value="很嚴肅">
       很嚴肅<option value="善意警告">
       善意警告<option value="正氣凜然">
       正氣凜然<option value="哈欠連天">
       哈欠連天<option value="小聲講">
       小聲講<option value="大聲喊叫">
       大聲喊叫<option value="尖叫一聲">
       尖叫一聲<option value="遺憾地說">
       遺憾地說<option value="無精打采">
       無精打采<option value="想吐">
       想吐<option value="真誠">
       真誠<option value="不好意思">
       不好意思<option value="高興地唱">
       高興地唱<option value="輕輕地唱">
       輕輕地唱<option value="很詫異">
       很詫異<option value="依依不捨">依依不捨</option>
      </select>
      聊天對象：
      <SELECT style="FONT-SIZE: 12px" name="userlist">
       <OPTION value="大家" selected>所有的人</OPTION>
      </SELECT>
      <INPUT id="isSecret" type="checkbox" name="isSecret">密談
      <br>
      <INPUT id="content" onkeydown="if (event.keyCode == 13) {send();return false;}" type="text"
       maxLength="100" size="70" name="content"> <INPUT id="btnSend" onclick="send();return false;" type="button" value="發送" name="btnSend">
     </TD>
    </TR>
   </TABLE>
   <script language="javascript">
   refresh_chatcontent();
   refresh_onlineusers();
   </script>
  </form>
 </body>
</HTML>
