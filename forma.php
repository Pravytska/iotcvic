<form name="form1" method="post" action="">
<table width="100%"  border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#0033FF" bgcolor="#DEE3EF" >
<tr><td width="100%">
<table width="60%" height="25%"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#DEE3ED">
<caption align="left" class="heading">
    Phone Number Validation
</caption>
<tr>
<td width="46%" class="text"><div align="right">Enter Your Phone Number </div>
<td width="5%"><input name="txtisdcode" type="text" class="textbox"  size="7" value="<?php echo $intisd; ?>" maxlength="5">
<td width="10%"><input name="txtcitycode" type="text" class="textbox"  size="7" value="<?php echo $intccode;?>" maxlength="5">
<td width="26%"><input name="txtphone" type="text" class="textbox" value="<?php echo $intphone;?>" maxlength="20" >
</tr>
<tr>
<td colspan="4"><div align="center">
<br>
<input type="submit" name="Submit" value="Submit">
<input name="hidSubmit" type="hidden" id="hidSubmit" value="true">
</div></td>
</tr>
</table>
<div align="center"></div>
</td>
</tr>
</table>
</form>
<?php
return;
}
?>
    