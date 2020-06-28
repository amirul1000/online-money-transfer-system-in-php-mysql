<?php
  include("../template/header.php");
  include("tinymce.php");
?>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<script type="text/javascript" src="../../js/selectize.js"></script>
<link rel='stylesheet' href='../../css/selectize.css'>
<link rel='stylesheet' href='../../css/selectize.default.css'>

<?php
  if($msg)
  {
  	echo "<b>".$msg."</b>";
  }
?>
 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","news_letter"))?></b>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>             
            <div class="portlet-body">
	         <div class="table-responsive">	
               <form name="form_data" action="" method="post">
                   <table cellspacing="3" cellpadding="3" width="50%">
                     <tr>
                       <td>Select Name</td>
                       <td>
                        <?php
							$info["table"] = "news_letter";
							$info["fields"] = array("news_letter.*"); 
							$info["where"]   = "1";
							$arr =  $db->select($info);
						?>
                        <select name="news_letter" class="form-control-static" onChange="loadData(this.value);">
                            <option>Select</option>
                            <?php
							  for($i=0;$i<count($arr);$i++)
								{
							?>
                             <option value="<?=$arr[$i]['id']?>" <?php if($_REQUEST['news_letter']==$arr[$i]['id']){ echo "selected";} ?>><?=$arr[$i]['name']?></option>
                            <?php
								}
							?>
                        </select>                        
                        <input type="hidden" name="cmd" value="load">
                       </td>
                     </tr>
                    </table> 
                </form>
 
             
             
                <form name="form_data2" action="" method="post">
                   <table cellspacing="3" cellpadding="3" width="100%">                     <tr>
						 <td valign="top">Content</td>
						 <td>
						    <textarea name="content" id="content"  class="form-control-static" style="width:200px;height:100px;"><?=$content?></textarea>
                         </td>
				     </tr>
                     <tr>
						 <td valign="top"></td>
						 <td>
                            <input type="hidden" name="cmd" value="send">
                            <input type="submit" name="submit" value="Submit" class="btn red"> 
                         </td>
				     </tr>
                    </table> 
                </form>
				</div>
			</div>
		</div>
        
        <script language="javascript">
		   function loadData(value)
		   {
			   document.forms["form_data"].submit();

		   }
		</script>
        
        
<?php
include("../template/footer.php");
?>









