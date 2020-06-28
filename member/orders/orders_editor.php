<?php
 include("../template/header.php");
?>
<script language="javascript" src="orders.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">
<b><?=ucwords(str_replace("_"," ","orders"))?></b><br />
<table cellspacing="3" cellpadding="3" border="0" align="center" width="98%" class="bdr">
 <tr>
  <td>  
     <a href="orders.php?cmd=list" class="nav3">List</a>
	 <form name="frm_orders" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
		<table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext" width="100%">  
		 <tr>
							 <td>Users</td>
							 <td><?php
	$info['table']    = "users";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY id DESC";
	$resusers  =  $db->select($info);
?>
<select  name="users_id" id="users_id"   class="textbox">
	<option value="">--Select--</option>
	<?php
	   foreach($resusers as $key=>$each)
	   { 
	?>
	  <option value="<?=$resusers[$key]['id']?>" <?php if($resusers[$key]['id']==$users_id){ echo "selected"; }?>><?=$resusers[$key]['email']?></option>
	<?php
	 }
	?> 
</select></td>
					  </tr><tr>
							 <td>Shipping Address</td>
							 <td><?php
	$info['table']    = "address";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY id DESC";
	$resaddress  =  $db->select($info);
?>
<select  name="shipping_address_id" id="shipping_address_id"   class="textbox">
	<option value="">--Select--</option>
	<?php
	   foreach($resaddress as $key=>$each)
	   { 
	?>
	  <option value="<?=$resaddress[$key]['id']?>" <?php if($resaddress[$key]['id']==$shipping_address_id){ echo "selected"; }?>><?=$resaddress[$key]['']?></option>
	<?php
	 }
	?> 
</select></td>
					  </tr><tr>
							 <td>Billing Information</td>
							 <td><?php
	$info['table']    = "information";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY id DESC";
	$resinformation  =  $db->select($info);
?>
<select  name="billing_information_id" id="billing_information_id"   class="textbox">
	<option value="">--Select--</option>
	<?php
	   foreach($resinformation as $key=>$each)
	   { 
	?>
	  <option value="<?=$resinformation[$key]['id']?>" <?php if($resinformation[$key]['id']==$billing_information_id){ echo "selected"; }?>><?=$resinformation[$key]['']?></option>
	<?php
	 }
	?> 
</select></td>
					  </tr><tr>
						 <td>Shipping Cost</td>
						 <td>
						    <input type="text" name="shipping_cost" id="shipping_cost"  value="<?=$shipping_cost?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Total Amount</td>
						 <td>
						    <input type="text" name="total_amount" id="total_amount"  value="<?=$total_amount?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Date Created</td>
						 <td>
						    <input type="text" name="date_created" id="date_created"  value="<?=$date_created?>" class="textbox">
							<a href="javascript:void(0);" onclick="displayDatePicker('date_created');"><img src="../../images/calendar.gif" width="16" height="16" border="0" /></a>
						 </td>
				     </tr><tr>
		           		 <td>Delivery Status</td>
				   		 <td><?php
	$enumorders = getEnumFieldValues('orders','delivery_status');
?>
<select  name="delivery_status" id="delivery_status"   class="textbox">
<?php
   foreach($enumorders as $key=>$value)
   { 
?>
  <option value="<?=$value?>" <?php if($value==$delivery_status){ echo "selected"; }?>><?=$value?></option>
 <?php
  }
?> 
</select></td>
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

