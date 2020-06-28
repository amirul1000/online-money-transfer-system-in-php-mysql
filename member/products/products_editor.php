<?php
 include("../template/header.php");
?>
<script language="javascript" src="products.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","products"))?></b>
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

								 <form name="frm_products" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <!--<tr>
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
                                                    </select>
                                                    </td>
                                           </tr>-->
                                           <tr>
                                                 <td>Category</td>
                                                 <td><?php
                                                        $info['table']    = "category";
                                                        $info['fields']   = array("*");   	   
                                                        $info['where']    =  "1=1 ORDER BY id DESC";
                                                        $rescategory  =  $db->select($info);
                                                    ?>
                                                    <select  name="category_id" id="category_id"   class="form-control-static">
                                                        <option value="">--Select--</option>
                                                        <?php
                                                           foreach($rescategory as $key=>$each)
                                                           { 
                                                        ?>
                                                          <option value="<?=$rescategory[$key]['id']?>" <?php if($rescategory[$key]['id']==$category_id){ echo "selected"; }?>><?=$rescategory[$key]['cat_name']?></option>
                                                        <?php
                                                         }
                                                        ?> 
                                                    </select>
                                                   </td>
                                              </tr>
                                              <tr>
                                                 <td>Model</td>
                                                 <td>
                                                    <input type="text" name="model" id="model"  value="<?=$model?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Title</td>
                                                 <td>
                                                    <input type="text" name="title" id="title"  value="<?=$title?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Product Condition</td>
                                                 <td><?php
                                                        $enumproducts = getEnumFieldValues('products','product_condition');
                                                    ?>
                                                    <select  name="product_condition" id="product_condition"   class="form-control-static">
                                                    <?php
                                                       foreach($enumproducts as $key=>$value)
                                                       { 
                                                    ?>
                                                      <option value="<?=$value?>" <?php if($value==$product_condition){ echo "selected"; }?>><?=$value?></option>
                                                     <?php
                                                      }
                                                    ?> 
                                                    </select>
                                                 </td>
                                          </tr>
                                          <tr>
                                                 <td>Sale Type</td>
                                                 <td><?php
                                                            $enumproducts = getEnumFieldValues('products','sale_type');
                                                        ?>
                                                        <select  name="sale_type" id="sale_type"   class="form-control-static">
                                                        <?php
                                                           foreach($enumproducts as $key=>$value)
                                                           { 
                                                        ?>
                                                          <option value="<?=$value?>" <?php if($value==$sale_type){ echo "selected"; }?>><?=$value?></option>
                                                         <?php
                                                          }
                                                        ?> 
                                                        </select>
                                                </td>
                                          </tr>
                                          <tr>
                                                 <td>Quantity</td>
                                                 <td>
                                                    <input type="text" name="quantity" id="quantity"  value="<?=$quantity?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Price</td>
                                                 <td>
                                                    <input type="text" name="price" id="price"  value="<?=$price?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Discount</td>
                                                 <td>
                                                    <input type="text" name="discount" id="discount"  value="<?=$discount?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Shipping Cost</td>
                                                 <td>
                                                    <input type="text" name="shipping_cost" id="shipping_cost"  value="<?=$shipping_cost?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td valign="top">Description</td>
                                                 <td>
                                                    <textarea name="description" id="description"  class="form-control-static" style="width:200px;height:100px;"><?=$description?></textarea>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td valign="top">Product Details</td>
                                                 <td>
                                                    <textarea name="product_details" id="product_details"  class="form-control-static" style="width:200px;height:100px;"><?=$product_details?></textarea>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Size</td>
                                                 <td>
                                                    <input type="text" name="size" id="size"  value="<?=$size?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Weight</td>
                                                 <td>
                                                    <input type="text" name="weight" id="weight"  value="<?=$weight?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Color</td>
                                                 <td>
                                                    <input type="text" name="color" id="color"  value="<?=$color?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Company Name</td>
                                                 <td>
                                                    <input type="text" name="company_name" id="company_name"  value="<?=$company_name?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Agreement Year</td>
                                                 <td>
                                                    <input type="text" name="agreement_year" id="agreement_year"  value="<?=$agreement_year?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Made In</td>
                                                 <td>
                                                    <input type="text" name="made_in" id="made_in"  value="<?=$made_in?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td valign="top">Shipping Desc</td>
                                                 <td>
                                                    <textarea name="shipping_desc" id="shipping_desc"  class="form-control-static" style="width:200px;height:100px;"><?=$shipping_desc?></textarea>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td valign="top">Delivery Desc</td>
                                                 <td>
                                                    <textarea name="delivery_desc" id="delivery_desc"  class="form-control-static" style="width:200px;height:100px;"><?=$delivery_desc?></textarea>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td valign="top">Payment Desc</td>
                                                 <td>
                                                    <textarea name="payment_desc" id="payment_desc"  class="form-control-static" style="width:200px;height:100px;"><?=$payment_desc?></textarea>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td valign="top">Return Desc</td>
                                                 <td>
                                                    <textarea name="return_desc" id="return_desc"  class="form-control-static" style="width:200px;height:100px;"><?=$return_desc?></textarea>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>File Image1</td>
                                                 <td><input type="file" name="file_image1" id="file_image1"  value="<?=$file_image1?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>File Image2</td>
                                                 <td><input type="file" name="file_image2" id="file_image2"  value="<?=$file_image2?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Product Type</td>
                                                 <td><?php
                                                            $enumproducts = getEnumFieldValues('products','product_type');
                                                        ?>
                                                        <select  name="product_type" id="product_type"   class="form-control-static">
                                                        <?php
                                                           foreach($enumproducts as $key=>$value)
                                                           { 
                                                        ?>
                                                          <option value="<?=$value?>" <?php if($value==$product_type){ echo "selected"; }?>><?=$value?></option>
                                                         <?php
                                                          }
                                                        ?> 
                                                        </select>
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

