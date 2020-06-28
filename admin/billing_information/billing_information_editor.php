<?php
 include("../template/header.php");
?>
<script language="javascript" src="billing_information.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">
<b><?=ucwords(str_replace("_"," ","billing_information"))?></b><br />
<table cellspacing="3" cellpadding="3" border="0" align="center" width="98%" class="bdr">
 <tr>
  <td>  
     <a href="billing_information.php?cmd=list" class="nav3">List</a>
	 <form name="frm_billing_information" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
		<table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext" width="100%">  
		 <tr>
						 <td>First Name</td>
						 <td>
						    <input type="text" name="first_name" id="first_name"  value="<?=$first_name?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Last Name</td>
						 <td>
						    <input type="text" name="last_name" id="last_name"  value="<?=$last_name?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Country</td>
						 <td>
						    <input type="text" name="country" id="country"  value="<?=$country?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Adress1</td>
						 <td>
						    <input type="text" name="adress1" id="adress1"  value="<?=$adress1?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Adress2</td>
						 <td>
						    <input type="text" name="adress2" id="adress2"  value="<?=$adress2?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>City</td>
						 <td>
						    <input type="text" name="city" id="city"  value="<?=$city?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>State</td>
						 <td>
						    <input type="text" name="state" id="state"  value="<?=$state?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Zip Code</td>
						 <td>
						    <input type="text" name="zip_code" id="zip_code"  value="<?=$zip_code?>" class="textbox">
						 </td>
				     </tr>
		 <tr> 
			 <td align="right"></td>
			 <td>
				<input type="hidden" name="cmd" value="add">
				<input type="hidden" name="id" value="<?=$Id?>">			
				<input type="submit" name="btn_submit" id="btn_submit" value="submit" class="button_blue">
			 </td>     
		 </tr>
		</table>
	</form>
  </td>
 </tr>
</table>
<?php
 include("../template/footer.php");
?>

