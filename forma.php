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



<select name="Date">
  <option value="">Select date</option>
  <?php for ($i = 1; $i <= 31; $i++) : ?>
  <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
</select>

$conn = mysqli_connect("localhost","root","","getdob");
if(isset($_POST['sub']))
{
$Year = $_POST['Year'];
$Month = $_POST['Month'];
$Date = $_POST['Date'];
if ($Year != '' && $Month != '' && $Date != '') 
   {
   $date = $Year.'-'.$Month.'-'.$Date;
   $sql="INSERT INTO dob VALUES  (Null,'$date')";
   if (mysqli_query($conn,$sql))
   {
      echo "Record added!";
   }
   else
   {
      echo "Error!!!";
   }
   }
else
   {
      echo "Please Select Day, Month and Year!!!";
   }   
}
    


<select name="Date">
  <option value="">Select date</option>
  <?php for ($i = 1; $i <= 31; $i++) : ?>
  <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
  </select>