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
  <label for="account">�b��</label>
  <span id="sprytextfield6">
  <input name="account" type="text" id="account" />
  <span class="textfieldRequiredMsg">�ݭn���@�ӭȡC</span><span class="textfieldMinCharsMsg">���F��r���ƥت��̤p�ȡC</span><span class="textfieldMaxCharsMsg">�w�W�X�r���ƥت��̤j�ȡC</span></span>(5~10)
</form>
<form name="form2" method="post" action="">
  <p><label>�K�X</label>
  <span id="sprytextfield1">
  <input type="password" name="password" id="password3" />
  <span class="textfieldRequiredMsg">�ݭn���@�ӭȡC</span><span class="textfieldMinCharsMsg">���F��r���ƥت��̤p�ȡC</span><span class="textfieldMaxCharsMsg">�w�W�X�r���ƥت��̤j�ȡC</span></span>(6~12)</p>
  <label for="confirmpassword">�T�{�K�X</label>
  <span id="spryconfirm1">
  <input type="password" name="confirmpassword" id="confirmpassword" />
  <span class="confirmRequiredMsg">�ݭn���@�ӭȡC</span><span class="confirmInvalidMsg">�Ȥ��۲šC</span></span>
  <p class="textfieldRequiredMsg">&nbsp;</p>
<p>&nbsp;</p>
</form>
<form name="form4" method="post" action="">
  <span>
<label for="name"></label>
    <span id="sprytextfield5">
    <label for="name">�m�W</label>
    <input type="text" name="name" id="name">
    
</form>
<form name="form5" method="post" action="">
  <div id="spryradio1">
    �ʧO
      <table width="88">
      <tr>
        <td width="80"><label>
          <input type="radio" name="�ʧO" value="�k" id="�ʧO_0">
          �k</label></td>
      </tr>
      <tr>
        <td><label>
          <input type="radio" name="�ʧO" value="�k" id="�ʧO_1">
          �k</label></td>
      </tr>
    </table>
    <span class="radioRequiredMsg">�жi�����C</span></div>
</form>
<span id="sprytextfield3">
<label for="email">email</label>
<input type="text" name="email" id="email">
<span class="textfieldRequiredMsg">�ݭn���@�ӭȡC</span><span class="textfieldInvalidFormatMsg">�榡�L�ġC</span></span>
<form name="form3" method="post" action="">
  �ͤ�@<span id="sprytextfield4">
  <input name="year" type="text" id="year" size="8">
�~ <span class="textfieldRequiredMsg">�ݭn���@�ӭȡC</span><span class="textfieldInvalidFormatMsg">�榡�L�ġC</span></span>�@<span id="spryselect1">
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

    <span class="selectRequiredMsg">�п�����ءC</span></span>
<span id="spryselect2">
<label for="select1"></label>
<span class="selectRequiredMsg">�п�����ءC</span></span>��
<select name="select1" id="select1">
<?php
		     for ($i = 1; $i <= 31; $i++)
 {
     echo"<option value= $i > $i </option>";
 }
 ?> 
</select> 
��
</form>

<form name="form6" method="post" action="">
  <input type="submit" name="submit" id="submit" value="�e�X">
  <input type="reset" name="reset" id="reset" value="���]">
</form>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {validateOn:["blur", "change"], minChars:5, maxChars:10});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:6, maxChars:12, validateOn:["change"]});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password3", {validateOn:["change"]});
</script>
