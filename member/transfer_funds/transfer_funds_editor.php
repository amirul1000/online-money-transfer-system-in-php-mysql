<?php
 include("../template/header.php");
 if(empty($subject))
 {
	 $subject = "Transfer funds";
 }
 
?>
<script language="javascript" src="transfer_funds.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<script type="text/javascript" src="../../js/selectize.js"></script>
<link rel='stylesheet' href='../../css/selectize.css'>
<link rel='stylesheet' href='../../css/selectize.default.css'>


<style type="text/css">
    .selectize-input {
      width: 100% !important;
      height: 62px !important;
    }
</style>



<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","transfer_funds"))?></b>
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

								 <form name="frm_transfer_funds" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <!--<tr>
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
                                                </tr>
                                                <tr>
                                                     <td>To Users</td>
                                                     <td>
													    <?php
															$info['table']    = "users";
															$info['fields']   = array("*");   	   
															$info['where']    =  "1=1 ORDER BY id DESC";
															$resusers  =  $db->select($info);
														?>
                                                        <select  name="to_users_id" id="to_users_id"   class="form-control-static">
                                                            <option value="">--Select--</option>
                                                            <?php
                                                               foreach($resusers as $key=>$each)
                                                               { 
                                                            ?>
                                                              <option value="<?=$resusers[$key]['id']?>" <?php if($resusers[$key]['id']==$to_users_id){ echo "selected"; }?>><?=$resusers[$key]['email']?></option>
                                                            <?php
                                                             }
                                                            ?> 
                                                        </select>
                                                     </td>
                                                  </tr>-->
                                                  <tr>
                                                     <td>Subject</td>
                                                     <td>
                                                        <input type="text" name="subject" id="subject"  value="<?=$subject?>" class="form-control-static">
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td valign="top">Description</td>
                                                     <td>
                                                        <textarea name="description" id="description"  class="form-control-static" style="width:200px;height:100px;"><?=$description?></textarea>
                                                     </td>
                                                 </tr><tr>
                                                     <td>To Email</td>
                                                     <td>
                                                        <input type="text" name="to_email" id="to_email"  value="<?=$to_email?>" style="width:400px;" required>
                                                        <?php
															$info['table']    = "users";
															$info['fields']   = array("*");   	   
															$info['where']    =  "1=1 ORDER By email ASC";
															$resusers  =  $db->select($info);
														?>                                           
														<script>
														var deviceID;
														$(document).ready(function() {												 
															 var eventHandler = function(name) {
																		  return function() {
																			  
																				////////////////////////////////////////////////
																				 $.ajax({
																						   headers: {
																							   "Access-Control-Allow-Origin": "*",
																							   "Access-Control-Allow-Methods": "GET, POST, PUT",
																							   "Access-Control-Allow-Headers": "Content-Type"
																						   },
																						  method: "GET",
																						  url: 'index.php',
																						  data: {
																							  'to_email'  :  $("#to_email").val(),
																							  'cmd' :  'users'
																						  },
																						  dataType: 'json',
																						  timeout: 60000,
																						  async : true,
																						  success: function (data) {
																							  
																								var obj = eval(data);
																								deviceID  = obj[0].deviceID;
																																															
																					  },
																					  error: function (jqXHR, exception) {
																							  //map.setClickable(false);
																							  $(".loader").hide();
																							  if(jqXHR.status==0)
																							  {
																								  //cntrlVisible = {server_error_panel:1};
																								  //setVisibleServerError(cntrlVisible);
																								  
																							  }
																							  //alert(JSON.stringify(jqXHR));
																						  }
																				  });
																														
																			  //////////////////////////////////////////
																			 
																		  };
																		};					
																								 
																								 
															
															$('#to_email')
																		.selectize({
																				plugins: ['remove_button'],
																				persist: false,
																				create: true,
																				maxItems: null,
																				valueField: 'id',
																				placeholder: 'Email ...',
																				labelField: 'title',
																				searchField: 'title',
																				options: [
																						  <?php
																							for($m=0;$m<count($resusers);$m++)
																							{
																						  ?>
																							 {id: '<?=$resusers[$m]['email']?>', title: '<?=$resusers[$m]['email']?>', url: ''},
																						  <?php
																							}
																						  ?>
																						  
																						],
																						onChange  : eventHandler('onChange'),
																					});
																					
																		
														});
                                                     
                                                     </script>
                                                     
                                                     
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td>Currency</td>
                                                     <td><?php
                                                        $info['table']    = "currency";
                                                        $info['fields']   = array("*");   	   
                                                        $info['where']    =  "1=1 ORDER BY id DESC";
                                                        $rescurrency  =  $db->select($info);
                                                    ?>
                                                    <select  name="currency_id" id="currency_id"   class="form-control-static" required>
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
                                                 </tr>
                                                 <tr>
                                                     <td>Amount</td>
                                                     <td>
                                                        <input type="text" name="amount" id="amount"  value="<?=$amount?>" class="form-control-static" required>
                                                     </td>
                                                 </tr>
                                                 <!--<tr>
                                                     <td valign="top">Refference</td>
                                                     <td>
                                                        <textarea name="refference" id="refference"  class="form-control-static" style="width:200px;height:100px;"><?=$refference?></textarea>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td>Date Time Created</td>
                                                     <td>
                                                        <input type="text" name="date_time_created" id="date_time_created"  value="<?=$date_time_created?>" class="datepicker form-control-static">
                                                     </td>
                                                 </tr><tr>
                                                     <td>Date Time Updated</td>
                                                     <td>
                                                        <input type="text" name="date_time_updated" id="date_time_updated"  value="<?=$date_time_updated?>" class="datepicker form-control-static">
                                                     </td>
                                                 </tr>-->
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
	/*
	function isNumberKey(event)
	{
		var ex = /^[0-9]+\.?[0-9]*$/;
		 if(ex.test($("#amount").val())==false){
		   $("#amount").val($scope.inventory.price.substring(0,$scope.inventory.price.length - 1));
		  }
 
	}*/
</script>
  			
<?php
 //include("../template/footer.php");
?>

