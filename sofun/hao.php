<script src="../../../wamp/www/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../../../wamp/www/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">

<script src="../../../wamp/www/SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<script src="../../../wamp/www/SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
<script src="../../../wamp/www/SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../../../wamp/www/SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">

<link href="../../../wamp/www/SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css">

<link href="../../../wamp/www/SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<script type="text/javascript">

</script>

<form name="form1" method="post" action="">
  <label for="account">帳號</label>
  <span id="sprytextfield6">
  <input name="account" type="text" id="account" />
  <span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldMinCharsMsg">未達到字元數目的最小值。</span><span class="textfieldMaxCharsMsg">已超出字元數目的最大值。</span></span>(5~10)
</form>
<form name="form2" method="post" action="">
  <p><label>密碼</label>
  <span id="sprytextfield1">
  <input type="password" name="password" id="password3" />
  <span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldMinCharsMsg">未達到字元數目的最小值。</span><span class="textfieldMaxCharsMsg">已超出字元數目的最大值。</span></span>(6~12)</p>
  <label for="confirmpassword">確認密碼</label>
  <span id="spryconfirm1">
  <input type="password" name="confirmpassword" id="confirmpassword" />
  <span class="confirmRequiredMsg">需要有一個值。</span><span class="confirmInvalidMsg">值不相符。</span></span>
  <p class="textfieldRequiredMsg">&nbsp;</p>
<p>&nbsp;</p>
</form>
<form name="form4" method="post" action="">
  <span>
<label for="name"></label>
    <span id="sprytextfield5">
    <label for="name">姓名</label>
    <input type="text" name="name" id="name">
    
</form>
<form name="form5" method="post" action="">
  <div id="spryradio1">
    性別
      <table width="88">
      <tr>
        <td width="80"><label>
          <input type="radio" name="性別" value="男" id="性別_0">
          男</label></td>
      </tr>
      <tr>
        <td><label>
          <input type="radio" name="性別" value="女" id="性別_1">
          女</label></td>
      </tr>
    </table>
    <span class="radioRequiredMsg">請進行選取。</span></div>
</form>
<span id="sprytextfield3">
<label for="email">email</label>
<input type="text" name="email" id="email">
<span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldInvalidFormatMsg">格式無效。</span></span>
<form name="form3" method="post" action="">
  生日　<span id="sprytextfield4">
  <input name="year" type="text" id="year" size="8">
年 <span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldInvalidFormatMsg">格式無效。</span></span>　<span id="spryselect1">
<label for="birthday"></label>
    <select name="birthday" id="birthday">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
    </select>

    <span class="selectRequiredMsg">請選取項目。</span></span>
<span id="spryselect2">
<label for="select1"></label>
<span class="selectRequiredMsg">請選取項目。</span></span>月
<select name="select1" id="select1">
<?php
		     for ($i = 1; $i <= 31; $i++)
 {
     echo"<option value= $i > $i </option>";
 }
 ?> 
</select> 
日
</form>

<form name="form6" method="post" action="">
  <input type="submit" name="submit" id="submit" value="送出">
  <input type="reset" name="reset" id="reset" value="重設">
</form>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {validateOn:["blur", "change"], minChars:5, maxChars:10});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:6, maxChars:12, validateOn:["change"]});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password3", {validateOn:["change"]});
</script>
