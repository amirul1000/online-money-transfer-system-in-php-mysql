<?php
 include("../template/header.php");
?>
<script language="javascript" src="invite_friends.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","invite_friends"))?></b>
          </div>
          <div class="tools">
              <a href="javascript:;" class="reload"></a>
              <a href="javascript:;" class="remove"></a>
          </div>
      </div>
	   <div class="portlet-body">
		         <div class="table-responsive">	
	                <table class="table">
							 <tr>
							  <td>  

								 <form name="frm_invite_friends" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
							 <td>From Users</td>
							 <td><?php
	$info['table']    = "users";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY id DESC";
	$resusers  =  $db->select($info);
?>
<select  name="from_users_id" id="from_users_id"   class="form-control-static">
	<option value="">--Select--</option>
	<?php
	   foreach($resusers as $key=>$each)
	   { 
	?>
	  <option value="<?=$resusers[$key]['id']?>" <?php if($resusers[$key]['id']==$from_users_id){ echo "selected"; }?>><?=$resusers[$key]['email']?></option>
	<?php
	 }
	?> 
</select></td>
					  </tr><tr>
						 <td>Invited Email</td>
						 <td>
						    <input type="text" name="invited_email" id="invited_email"  value="<?=$invited_email?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Sending Date Time</td>
						 <td>
						    <input type="text" name="sending_date_time" id="sending_date_time"  value="<?=$sending_date_time?>" class="datepicker form-control-static">
						 </td>
				     </tr><tr>
						 <td>Joining Date Time</td>
						 <td>
						    <input type="text" name="joining_date_time" id="joining_date_time"  value="<?=$joining_date_time?>" class="datepicker form-control-static">
						 </td>
				     </tr><tr>
		           		 <td>Joining Status</td>
				   		 <td><?php
	$enuminvite_friends = getEnumFieldValues('invite_friends','joining_status');
?>
<select  name="joining_status" id="joining_status"   class="form-control-static">
<?php
   foreach($enuminvite_friends as $key=>$value)
   { 
?>
  <option value="<?=$value?>" <?php if($value==$joining_status){ echo "selected"; }?>><?=$value?></option>
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
												<input type="submit" name="btn_submit" id="btn_submit" value="submit" class="btn red">
											 </td>     
										 </tr>
										</table>
										</div>
										</div>
								</form>
							  </td>
							 </tr>
							</table>
			      </div>
			</div>
  </div>
  <script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '../../images/calendar.gif',
	});
</script>  			
<?php
 include("../template/footer.php");
?>

