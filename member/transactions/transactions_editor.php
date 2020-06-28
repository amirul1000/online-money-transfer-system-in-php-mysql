<?php
 include("../template/header.php");
?>
<script language="javascript" src="transactions.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","transactions"))?></b>
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

								 <form name="frm_transactions" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
							 <td>Users</td>
							 <td><?php
	$info['table']    = "users";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY id DESC";
	$resusers  =  $db->select($info);
?>
<select  name="users_id" id="users_id"   class="form-control-static">
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
						 <td>Subject</td>
						 <td>
						    <input type="text" name="subject" id="subject"  value="<?=$subject?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td valign="top">Description</td>
						 <td>
						    <textarea name="description" id="description"  class="form-control-static" style="width:200px;height:100px;"><?=$description?></textarea>
						 </td>
				     </tr><tr>
							 <td>Currency</td>
							 <td><?php
	$info['table']    = "currency";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY id DESC";
	$rescurrency  =  $db->select($info);
?>
<select  name="currency_id" id="currency_id"   class="form-control-static">
	<option value="">--Select--</option>
	<?php
	   foreach($rescurrency as $key=>$each)
	   { 
	?>
	  <option value="<?=$rescurrency[$key]['id']?>" <?php if($rescurrency[$key]['id']==$currency_id){ echo "selected"; }?>><?=$rescurrency[$key]['code']?></option>
	<?php
	 }
	?> 
</select></td>
					  </tr><tr>
						 <td>Debit</td>
						 <td>
						    <input type="text" name="debit" id="debit"  value="<?=$debit?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Credit</td>
						 <td>
						    <input type="text" name="credit" id="credit"  value="<?=$credit?>" class="form-control-static">
						 </td>
				     </tr><tr>
						 <td valign="top">Refference</td>
						 <td>
						    <textarea name="refference" id="refference"  class="form-control-static" style="width:200px;height:100px;"><?=$refference?></textarea>
						 </td>
				     </tr><tr>
						 <td>Date Time Created</td>
						 <td>
						    <input type="text" name="date_time_created" id="date_time_created"  value="<?=$date_time_created?>" class="datepicker form-control-static">
						 </td>
				     </tr><tr>
						 <td>Date Time Updated</td>
						 <td>
						    <input type="text" name="date_time_updated" id="date_time_updated"  value="<?=$date_time_updated?>" class="datepicker form-control-static">
						 </td>
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

