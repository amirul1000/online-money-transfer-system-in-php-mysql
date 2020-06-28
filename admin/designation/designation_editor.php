<?php
 include("../template/header.php");
?>
<script src="../../datetimepicker/jquery.js"></script>	
<script type="text/javascript" src="../../js/selectize.js"></script>
<link rel='stylesheet' href='../../css/selectize.css'>
<link rel='stylesheet' href='../../css/selectize.default.css'>
<style type="text/css">
    .selectize-input {
      width: 100% !important;
      height: 62px !important;
    }
</style>

<a href="index.php?cmd=list" class="btn green">List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","designation"))?></b>
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

								 <form name="frm_designation" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
                                             <td>Name</td>
                                             <td>
                                                <input type="text" name="name" id="name"  value="<?=$name?>" class="textbox">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Roles</td>
                                             <td>[PRESS  CNTRL + SELECT OPTION]<br />
                                                  <?php
                                                     $arr3  =  explode(",",$roles); 
                                                      
                                                     unset($info);
                                                    $info["table"] = "roles";
                                                    $info["fields"] = array("roles.*"); 
                                                    $info["where"]   = "1  ORDER BY name ASC";
                                                    $arr2 =  $db->select($info);
                                                  ?>
                                                    <select name="roles[]" size="10" multiple="multiple"> 
                                                  <?php	
                                                    for($j=0;$j<count($arr2);$j++)
                                                    {   
                                                        $selected ="";
                                                        foreach($arr3 as $key=>$value)
                                                        {
                                                           if($arr2[$j]['name']==trim($value))
                                                           {
                                                               $selected = 'selected="selected"';
                                                               break;
                                                           }
                                                        } 
                                                   ?>
                                                     <?=$arr2[$j]['name']?>
                                                     <option value="<?=$arr2[$j]['name']?>" <?=$selected?> /><?=$arr2[$j]['name']?></option>
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
												<input type="submit" name="btn_submit" id="btn_submit" value="submit" class="button_blue">
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
<?php
 include("../template/footer.php");
?>

