<?php
 include("../template/header.php");
?>
<?php
   if($msg)
   {
	   echo "<b>".$msg."</b>";
   }
?>
 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","Profile"))?></b>
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
				
						<div class="portlet-body">
				      <div class="table-responsive">	
				          <table class="table">
							 <?php
								
								if($_SESSION["search"]=="yes")
								  {
									$whrstr = " AND ".$_SESSION['field_name']." LIKE '%".$_SESSION["field_value"]."%'";
								  }
								  else
								  {
									$whrstr = "";
								  }
								  
								 $whrstr .= " AND id='".$_SESSION['users_id']."'";  
						 
								$rowsPerPage = 10;
								$pageNum = 1;
								if(isset($_REQUEST['page']))
								{
									$pageNum = $_REQUEST['page'];
								}
								$offset = ($pageNum - 1) * $rowsPerPage;  
						 
						 
									unset($info);		  
								$info["table"] = "users";
								$info["fields"] = array("users.*"); 
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
							<tr>
                              <td width="30%">Email</td> 
							  <td><?=$arr[$i]['email']?></td>
                            </tr>
                            <tr>  
                              <td>Title</td>
                              <td><?=$arr[$i]['title']?></td>
                            </tr>
                            <tr>    
                              <td>First Name</td>
                              <td><?=$arr[$i]['first_name']?></td>
                            </tr>
                            <tr>   
                              <td>Last Name</td>
                              <td><?=$arr[$i]['last_name']?></td>
                            </tr>
                            <tr>   
                              <td>Picture</td>
                              <td>
                                 <?php
								    if(is_file('../../'.$arr[$i]['file_picture']) && file_exists('../../'.$arr[$i]['file_picture']))
									{
								 ?>
                                  <img src="../../<?=$arr[$i]['file_picture']?>" style="width:100px;">
                                 <?php
									}
									else
									{
								?>		
                                  <img src="../../v4.0.1/theme/assets/admin/layout/img/avatar.png" style="width:100px;">
                                <?php
									}
							    ?> 		
                              </td>
                            </tr>
                            <tr>    
                             <td>Company</td>
                              <td><?=$arr[$i]['company']?></td>
                            </tr>
                            <tr>   
                              <td>Address</td> 
                              <td><?=$arr[$i]['address']?></td>
                             </tr>
                            <tr>   
                              <td>City</td>
                              <td><?=$arr[$i]['city']?></td>
                            </tr>
                            <tr>    
                               <td>State</td>
                              <td><?=$arr[$i]['state']?></td>
                            </tr>
                            <tr>    
                              <td>Zip</td>
                              <td><?=$arr[$i]['zip']?></td>
                            </tr>
                            <tr>  
                              <td>ABN</td>   
                              <td><?=$arr[$i]['ABN']?></td>
                            </tr>
                            <tr> 
                             <td>Commercial Address</td>   
                              <td><?=$arr[$i]['commercial_address']?></td>
                            </tr>
                            <tr>    
                             <td>Passport</td>
                              <td><?=$arr[$i]['passport']?></td>
                            </tr>
                            <tr>    
                              <td>Residential Address</td>                                
                              <td><?=$arr[$i]['residential_address']?></td>
                            </tr>
                            <tr>  
                             <td>Country</td>  
                              <td>
		                            <?php
									    unset($info2);        
										$info2['table']    = "country";	
										$info2['fields']   = array("country");	   	   
										$info2['where']    =  "1 AND id='".$arr[$i]['country_id']."' LIMIT 0,1";
										$res2  =  $db->select($info2);
										echo $res2[0]['country'];	
					                ?>
							  </td>
                             </tr>
                             <tr>  
                                  <td>Facebook</td>
                                  <td><?=$arr[$i]['facebook']?></td>
                             </tr>
                             <tr>  
                                  <td>Linkedin</td>
                                  <td><?=$arr[$i]['linkedin']?></td>
                             </tr>
                             <tr>  
                                   <td>Twitter</td>
                                   <td><?=$arr[$i]['twitter']?></td>
                             </tr>
                             <tr>  
                                    <td>Google plus</td>
                                    <td><?=$arr[$i]['google_plus']?></td>
                             </tr>
                             <tr>  
                              <td>Created At</td> 
                              <td><?=$arr[$i]['created_at']?></td>
                             </tr>
                             <tr>    
                              <td>Updated At</td>
                              <td><?=$arr[$i]['updated_at']?></td>
                             </tr>
                             <tr>   
                              <td>User Type</td>
                              <td><?=$arr[$i]['user_type']?></td>
                             </tr>
                             <tr>
                              <td>Status</td>                                   
                              <td><?=$arr[$i]['status']?></td>
                             </tr>
                             <tr>   
                              <td>Action</td>
							  <td nowrap >
								  <a href="index.php?cmd=edit&id=<?=$arr[$i]['id']?>"  class="btn default btn-xs purple"><i class="fa fa-edit"></i>Edit</a>
								  <a href="index.php?cmd=close&id=<?=$arr[$i]['id']?>" class="btn btn-sm red filter-cancel"  onClick=" return confirm('Are you sure to close this account ?');"><i class="fa fa-times"></i>Close</a> 
                             </td>
						
							</tr>
						<?php
								  }
						?>
						
						<tr>
						   <td colspan="10" align="center">
							  <?php              
									  unset($info);
					
									   $info["table"] = "users";
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
<?php
include("../template/footer.php");
?>









