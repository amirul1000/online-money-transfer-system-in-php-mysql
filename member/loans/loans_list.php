<?php
 include("../template/header.php");
?>
<script src="../../js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="../../css/toastr.css">
<script language="javascript" src="../../js/toastr.js"></script>
<div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue-madison">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                         <?php
                            echo get_total_loans($db,$_SESSION['users_id']);
                         ?>
                    </div>
                    <div class="desc">
                        Total Loans
                    </div>
                </div>
                <a class="more" href="../loans">
                View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green-haze">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                         <?php
                            echo get_total_credited_loans($db,$_SESSION['users_id']);
                         ?>
                    </div>
                    <div class="desc">
                        Total Credited Loans
                    </div>
                </div>
                <a class="more" href="../loans">
                View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    
    
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple-plum">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                         <?php
                            echo get_total_debitted_loans($db,$_SESSION['users_id']);
                         ?>
                    </div>
                    <div class="desc">
                        Total Debited Loans
                    </div>
                </div>
                <a class="more" href="../loans">
                View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

    
    
</div>
<div class="row">
    <a  class="btn red" data-toggle="modal" href="#request_a_loan"><i class="fa fa-plus-circle"></i> Request a loan</a> 
    <a  class="btn green" data-toggle="modal"  href="#return_loan"><i class="fa fa-minus-circle"></i> Pay your loan </a> 
    <a href="../loans_request/index.php?cmd=list" class="btn yellow"><i class="fa fa-list"></i> Show all requested loans </a> 
</div> 
<br><br>
 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","loans"))?></b>
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
						<td align="center" valign="top">
						  <form name="search_frm" id="search_frm" method="post">
							<div class="portlet-body">
					         <div class="table-responsive">	
				                <table align="right">
									  <TR>
										<TD  nowrap="nowrap">
										  <?php
											  $hash    =  getTableFieldsName("loans");
											  $hash    = array_diff($hash,array("id"));
										  ?>
										  Search Key:
										  <select   name="field_name" id="field_name"  class="form-control-static">
											<option value="">--Select--</option>
											<?php
											foreach($hash as $key=>$value)
											{
										    ?>
											<option value="<?=$key?>" <?php if($_SESSION['field_name']==$key) echo "selected"; ?>><?=str_replace("_"," ",$value)?></option>
											<?php
										    }
										  ?>
										  </select>
										</TD>
										<TD  nowrap="nowrap" align="right"><label for="searchbar"><img src="../../images/icon_searchbox.png" alt="Search"></label>
										   <input type="text"    name="field_value" id="field_value" value="<?=$_SESSION["field_value"]?>" class="form-control-static"></TD>
										<td nowrap="nowrap" align="right">
										  <input type="hidden" name="cmd" id="cmd" value="search_loans" >
										  <input type="submit" name="btn_submit" id="btn_submit"  value="Search" class="btn blue-hoki" />
										</td>
									  </TR>
									</table>
							</div>
							</div>
						  </form>
						</td>
				   </tr>
				   <tr>
				   <td> 
				
						<div class="portlet-body">
				      <div class="table-responsive">	
				          <table class="table">
							<tr bgcolor="#ABCAE0">
                                <td>Subject</td>
                                <td>Description</td>
                                <td>Currency</td>
                                <td>Debit</td>
                                <td>Credit</td>
                                <td>Refference</td>
                                <td>Date Time Created</td>
                                <td>Date Time Updated</td>                                
							</tr>
						 <?php
								
								if($_SESSION["search"]=="yes")
								  {
									$whrstr = " AND ".$_SESSION['field_name']." LIKE '%".$_SESSION["field_value"]."%'";
								  }
								  else
								  {
									$whrstr = "";
								  }
								  
								  $whrstr .= " AND users_id='".$_SESSION['users_id']."'";  
						 
								$rowsPerPage = 10;
								$pageNum = 1;
								if(isset($_REQUEST['page']))
								{
									$pageNum = $_REQUEST['page'];
								}
								$offset = ($pageNum - 1) * $rowsPerPage;  
						 
						 
											  
								$info["table"] = "loans";
								$info["fields"] = array("loans.*"); 
								$info["where"]   = "1   $whrstr ORDER BY id DESC  LIMIT $offset, $rowsPerPage";
													
								
								$arr =  $db->select($info);
								
								for($i=0;$i<count($arr);$i++)
								{
								
								   $rowColor;
						
									if($i % 2 == 0)
									{
										
										$row="#C8C8C8";
									}
									else
									{
										
										$row="#FFFFFF";
									}
								
						 ?>
							<tr bgcolor="<?=$row?>" onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; ">
							  <td><?=$arr[$i]['subject']?></td>
                              <td><?=$arr[$i]['description']?></td>
                              <td>
		                            <?php
									    unset($info2);        
										$info2['table']    = "currency";	
										$info2['fields']   = array("code");	   	   
										$info2['where']    =  "1 AND id='".$arr[$i]['currency_id']."' LIMIT 0,1";
										$res2  =  $db->select($info2);
										echo $res2[0]['code'];	
					                ?>
							  </td>
                              <td><?=$arr[$i]['debit']?></td>
                              <td><?=$arr[$i]['credit']?></td>
                              <td><?=$arr[$i]['refference']?></td>
                              <td><?=$arr[$i]['date_time_created']?></td>
                              <td><?=$arr[$i]['date_time_updated']?></td>
							</tr>
						<?php
								  }
						?>
						
						<tr>
						   <td colspan="10" align="center">
							  <?php              
									  unset($info);
					
									   $info["table"] = "loans";
									   $info["fields"] = array("count(*) as total_rows"); 
									   $info["where"]   = "1  $whrstr ORDER BY id DESC";
									  
									   $res  = $db->select($info);  
					
												
										$numrows = $res[0]['total_rows'];
										$maxPage = ceil($numrows/$rowsPerPage);
										$self = 'index.php?cmd=list';
										$nav  = '';
										
										$start    = ceil($pageNum/5)*5-5+1;
										$end      = ceil($pageNum/5)*5;
										
										if($maxPage<$end)
										{
										  $end  = $maxPage;
										}
										
										for($page = $start; $page <= $end; $page++)
										//for($page = 1; $page <= $maxPage; $page++)
										{
											if ($page == $pageNum)
											{
												$nav .= "<li>$page</li>"; 
											}
											else
											{
												$nav .= "<li><a href=\"$self&&page=$page\" class=\"nav\">$page</a></li>";
											} 
										}
										if ($pageNum > 1)
										{
											$page  = $pageNum - 1;
											$prev  = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Prev]</a></li>";
									
										   $first = "<li><a href=\"$self&&page=1\" class=\"nav\">[First Page]</a></li>";
										} 
										else
										{
											$prev  = '<li>&nbsp;</li>'; 
											$first = '<li>&nbsp;</li>'; 
										}
									
										if ($pageNum < $maxPage)
										{
											$page = $pageNum + 1;
											$next = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Next]</a></li>";
									
											$last = "<li><a href=\"$self&&page=$maxPage\" class=\"nav\">[Last Page]</a></li>";
										} 
										else
										{
											$next = '<li>&nbsp;</li>'; 
											$last = '<li>&nbsp;</li>'; 
										}
										
										if($numrows>1)
										{
										  echo '<ul id="navlist">';
										   echo $first . $prev . $nav . $next . $last;
										  echo '</ul>';
										}
									?>     
						   </td>
						</tr>
						</table>
						</div>
					 </div>				
				</td>
				</tr>
				</table>
				</div>
			</div>
		</div>
        
        
        <!----------------------Modal--------------------->
        <!-- /.modal -->
        <div id="request_a_loan" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Request a Loan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet-body">
						              <div class="table-responsive">	
                                        <table class="table">
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
                                                     </tr>
                                                     <tr>
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
                                                                </select>
                                                                </td>
                                                      </tr>
                                                      <tr>
                                                         <td>Amount</td>
                                                         <td>
                                                            <input type="text" name="amount" id="amount"  value="<?=$amount?>" class="form-control-static">
                                                         </td>
                                                     </tr>                                                     
                                                     <tr> 
                                                         <td align="right"></td>
                                                         <td>
                                                            <input type="hidden" name="cmd" value="add">
                                                            <input type="hidden" name="id" value="<?=$Id?>">			
                                                         </td>     
                                                      </tr>
                                             </table>
										</div>
								    </div>                                
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn default">Close</button>
                        <button type="button" class="btn green" onClick="request();">Request</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- /.modal -->
        <div id="return_loan" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Return Loan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet-body">
						              <div class="table-responsive">	
                                        <table class="table">
                                                    <tr>
                                                         <td>Subject</td>
                                                         <td>
                                                            <input type="text" name="subject" id="return_subject"  value="<?=$subject?>" class="form-control-static" required>
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <td valign="top">Description</td>
                                                         <td>
                                                            <textarea name="description" id="return_description"  class="form-control-static" style="width:200px;height:100px;" required><?=$description?></textarea>
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
                                                                <select  name="currency_id" id="return_currency_id"   class="form-control-static" required>
                                                                    <option value="">--Select--</option>
                                                                    <?php
                                                                       foreach($rescurrency as $key=>$each)
                                                                       { 
                                                                    ?>
                                                                      <option value="<?=$rescurrency[$key]['id']?>" <?php if($rescurrency[$key]['id']==$currency_id){ echo "selected"; }?>><?=$rescurrency[$key]['code']?></option>
                                                                    <?php
                                                                     }
                                                                    ?> 
                                                                </select>
                                                             </td>
                                                      </tr>
                                                      <tr>
                                                         <td>Debit</td>
                                                         <td>
                                                            <input type="text" name="debit" id="return_debit"  value="<?=$debit?>" class="form-control-static" required>
                                                         </td>
                                                     </tr>
                                                     <tr> 
                                                         <td align="right"></td>
                                                         <td>
                                                            <input type="hidden" name="cmd" value="add">
                                                            <input type="hidden" name="id" value="<?=$Id?>">			
                                                         </td>     
                                                     </tr>
                                             </table>
										</div>
								    </div>                                
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn default">Close</button>
                        <button type="button" class="btn green" onClick="returnLoan();">Return</button>
                    </div>
                </div>
            </div>
        </div>

        
     <script language="javascript">
	   ////////////////////////////////////////////////
	   function request(){
		 $.ajax({
				   headers: {
					   "Access-Control-Allow-Origin": "*",
					   "Access-Control-Allow-Methods": "GET, POST, PUT",
					   "Access-Control-Allow-Headers": "Content-Type"
				   },
				  method: "GET",
				  url: 'index.php',
				  data: {
					  'subject'      :  $("#subject").val(),
					  'description'  :  $("#description").val(),
					  'currency_id'  :  $("#currency_id").val(),
					  'amount'       :  $("#amount").val(),
					  'cmd'          :  'request_a_loan'
				  },
				  dataType: 'json',
				  timeout: 60000,
				  async : true,
				  success: function (data) {
					   obj = eval(data);
					   if(obj.status == "success")
						{
						   toastr.options.timeOut = 3000;
						   toastr.success(obj.msg);
						}																													
			  },
			  error: function (jqXHR, exception) {
					  //map.setClickable(false);
					  if(jqXHR.status==0)
					  {
						  //cntrlVisible = {server_error_panel:1};
						  //setVisibleServerError(cntrlVisible);
						  
					  }
					  //alert(JSON.stringify(jqXHR));
				  }
		  });
	   }	  
	  //////////////////////////////////////////
	  
	  function returnLoan()
	  {
		  $.ajax({
				   headers: {
					   "Access-Control-Allow-Origin": "*",
					   "Access-Control-Allow-Methods": "GET, POST, PUT",
					   "Access-Control-Allow-Headers": "Content-Type"
				   },
				  method: "GET",
				  url: 'index.php',
				  data: {
					  'subject'      :  $("#return_subject").val(),
					  'description'  :  $("#return_description").val(),
					  'currency_id'  :  $("#return_currency_id").val(),
					  'debit'       :   $("#return_debit").val(),
					  'cmd'          :  'return_loan'
				  },
				  dataType: 'json',
				  timeout: 60000,
				  async : true,
				  success: function (data) {
					   obj = eval(data);
					   if(obj.status == "success")
						{
						   toastr.options.timeOut = 3000;
						   toastr.success(obj.msg);
						}																													
			  },
			  error: function (jqXHR, exception) {
					  //map.setClickable(false);
					  if(jqXHR.status==0)
					  {
						  //cntrlVisible = {server_error_panel:1};
						  //setVisibleServerError(cntrlVisible);
						  
					  }
					  //alert(JSON.stringify(jqXHR));
				  }
		  });
		  
	  }
	 </script>   
                
        
<?php
  include("../template/footer.php");
?>









