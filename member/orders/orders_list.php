<?php
 include("../template/header.php");
?>
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

<a href="index.php?cmd=edit" class="btn green"><i class="fa fa-plus-circle"></i> Add a <?=ucwords(str_replace("_"," ","orders"))?></a> <br><br>
 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","orders"))?></b>
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
											  $hash    =  getTableFieldsName("orders");
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
										  <input type="hidden" name="cmd" id="cmd" value="search_orders" >
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
                              <td>Users</td>
                              <td>Shipping Address </td>
                              <td>Billing Information </td>
                              <td>Items</td>
                              <td>Shipping Cost</td>
                              <td>Total Amount</td>
                              <td>Date Created</td>
                              <td>Delivery Status</td>
                              <td>Action</td>
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
								  
                         
                                $rowsPerPage = 10;
                                $pageNum = 1;
                                if(isset($_REQUEST['page']))
                                {
                                    $pageNum = $_REQUEST['page'];
                                }
                                $offset = ($pageNum - 1) * $rowsPerPage;
                                              
                                $info["table"] = "orders INNER JOIN products ON(orders.products_id=products.id)
								                         INNER JOIN users ON(products.users_id=users.id) ";
                                $info["fields"] = array("orders.*"); 
                                $info["where"]   = "1   $whrstr ORDER BY  FIELD(delivery_status, 'pending','completed','return'),orders.id  DESC  LIMIT $offset, $rowsPerPage";
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
                              <td valign="top">
                                    <?php
                                          unset($info2);        
                                        $info2['table']    = "users";	
                                        $info2['fields']   = array("users.*");	   	   
                                        $info2['where']    =  "1 AND id='".$arr[$i]['users_id']."' LIMIT 0,1";
                                        $res2  =  $db->select($info2);
                                        echo $res2[0]['email'].'<br>';	
                                        echo $res2[0]['first_name'].' '.$res2[0]['last_name'];	
                                    ?>
                               </td>
                              <td valign="top">
                                    <?php
                                            unset($info2);        
                                        $info2["table"] = "shipping_address";
                                        $info2["fields"] = array("shipping_address.*"); 
                                        $info2["where"]   = "1  AND id='".$arr[$i]['shipping_address_id']."' LIMIT 0,1";
                                        $res2 =  $db->select($info2);
                                    ?>
                                    First name:<?=$res2[0]['ship_first_name']?><br />
                                    Last name:<?=$res2[0]['ship_last_name']?><br />
                                    Adress1:<?=$res2[0]['ship_adress1']?><br />
                                    Adress2:<?=$res2[0]['ship_adress2']?><br />
                                    Zip code:<?=$res2[0]['ship_zip_code']?><br />
                                    City:<?=$res2[0]['ship_city']?><br />
                                    State:<?=$res2[0]['ship_state']?><br />
                                    Country:<?=$res2[0]['ship_country']?><br />
                               </td>
                              <td valign="top">
                                  <?php
                                          unset($info2);        
                                        $info2["table"] = "billing_information";
                                        $info2["fields"] = array("billing_information.*"); 
                                        $info2["where"]   = "1  AND id='".$arr[$i]['billing_information_id']."' LIMIT 0,1";
                                        $res2 =  $db->select($info2);
                                  ?>
                                  First name:<?=$res2[0]['first_name']?><br />
                                  Last name:<?=$res2[0]['last_name']?><br />
                                  Country:<?=$res2[0]['country']?><br />
                                  Adress1:<?=$res2[0]['adress1']?><br />
                                  Adress2:<?=$res2[0]['adress2']?><br />
                                  City:<?=$res2[0]['city']?><br />
                                  State:<?=$res2[0]['state']?><br />
                                  Zip code:<?=$res2[0]['zip_code']?><br />
                              </td>
                              <td valign="top">
                                  <!--Item-->
                                       <table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext">
                                        <tr bgcolor="#ABCAE0">
                                          <td>Os0</td>
                                          <td>Item Name</td>
                                          <td>Item Number</td>
                                          <td>Quantity</td>
                                          <td>Amuont</td>
                                        </tr>
                                       <?php
                                              unset($info2);
                                            $info2["table"] = "items";
                                            $info2["fields"] = array("items.*"); 
                                            $info2["where"]   = "1    AND orders_id='".$arr[$i]['id']."' ORDER BY id ASC";
                                            $res2 =  $db->select($info2);                        
                                            for($j=0;$j<count($res2);$j++)
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
                                         <td>
                                          <div style="width:100px;">
                                          <img src="../../<?=getImage($db,$res2[$j]['item_number'])?>" style="width:25px;height:25px;float:left;" />
                                           <?=$res2[$j]['os0']?>
                                          </div>
                                         </td>
                                          <td><?=$res2[$j]['item_name']?></td>
                                          <td><?=$res2[$j]['item_number']?></td>
                                          <td><?=$res2[$j]['quantity']?></td>
                                          <td><?=$res2[$j]['amount']?></td>
                                        </tr>
                                    <?php
                                              }
                                    ?>
                                    </table>
                                  <!--Item/-->
                              </td>
                              <td valign="top"><?=$arr[$i]['shipping_cost']?></td>
                              <td valign="top"><?=$arr[$i]['total_amount']?></td>
                              <td valign="top"><?=date("D F j, Y H:i:s",strtotime($arr[$i]['date_created']))?></td>
                              <td valign="top">
                                   <?php
								      echo $arr[$i]['delivery_status'];
								   ?>
                                   <!--<form action="" method="post">
                                      <select name="delivery_status">
                                        <option value="pending" <?php if($arr[$i]['delivery_status']=="pending") { echo "selected";}?>>pending</option>
                                        <option value="completed" <?php if($arr[$i]['delivery_status']=="completed") { echo "selected";}?>>completed</option>
                                        <option value="return" <?php if($arr[$i]['delivery_status']=="return") { echo "selected";}?>>return</option>
                                      </select>
                                      <br />
                                      <input type="hidden" name="cmd" value="change_delivery_status"/>
                                      <input type="hidden" name="id" value="<?=$arr[$i]['id']?>" />
                                      <input type="submit" value="submit" />
                                  </form>-->
                              </td>			  
                              <td nowrap  valign="top">
                                   <a href="index.php?cmd=edit&id=<?=$arr[$i]['id']?>"  class="btn default btn-xs purple"><i class="fa fa-edit"></i>Edit</a>
								   <a href="index.php?cmd=delete&id=<?=$arr[$i]['id']?>" class="btn btn-sm red filter-cancel"  onClick=" return confirm('Are you sure to delete this item ?');"><i class="fa fa-times"></i>Delete</a> 
                             </td>
                        
                            </tr>
                        <?php
                                  }
                        ?>                        
                        <tr>
						   <td colspan="10" align="center">
							  <?php              
									  unset($info);
					
									   $info["table"] = "orders INNER JOIN products ON(orders.products_id=products.id)
								                         INNER JOIN users ON(products.users_id=users.id) ";
									   $info["fields"] = array("count(*) as total_rows"); 
									   $info["where"]   = "1  $whrstr ORDER BY orders.id DESC";
									  
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









