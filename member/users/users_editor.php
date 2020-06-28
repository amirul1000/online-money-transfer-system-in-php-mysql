<?php
 include("../template/header.php");
?>
<script language="javascript" src="users.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<link rel="stylesheet" href="../../datepicker/jquery-ui.css">
<script src="../../datepicker/jquery-1.10.2.js"></script>
<script src="../../datepicker/jquery-ui.js"></script>


<a href="index.php?cmd=list" class="btn green"><i class="fa fa-arrow-circle-left"></i> List</a> <br><br>
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

								 <form name="frm_users" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
                                                 <td>Email</td>
                                                 <td>
                                                    <input type="text" name="email" id="email"  value="<?=$email?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Title</td>
                                                 <td>
                                                    <input type="text" name="title" id="title"  value="<?=$title?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>First Name</td>
                                                 <td>
                                                    <input type="text" name="first_name" id="first_name"  value="<?=$first_name?>" class="form-control-static">
                                                 </td>
                                             </tr><tr>
                                                 <td>Last Name</td>
                                                 <td>
                                                    <input type="text" name="last_name" id="last_name"  value="<?=$last_name?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td nowrap="nowrap">Picture</td>
                                                 <td>
                                                      <link href="../../Simple-Ajax-Uploader-master/assets/css/styles.css" rel="stylesheet">
                                                 
                                                      <!--<div class="container">-->                               
                                                          <div class="row" style="padding-top:10px;">
                                                            <div class="col-xs-2">
                                                              <input type="file" id="uploadBtn4"  value="Choose File">
                                                            </div>
                                                            <div class="col-xs-10">
                                                          <div id="progressOuter4" class="progress progress-striped active" style="display:none;">
                                                            <div id="progressBar4" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                            </div>
                                                          </div>
                                                            </div>
                                                          </div>
                                                          <div class="row" style="padding-top:10px;">
                                                            <div class="col-xs-10">
                                                              <div id="msgBox4">
                                                              </div>
                                                            </div>
                                                          </div>
                                                      <!--</div>-->
                                                      <?php
                                                         if(isset($Id)) {
                                                           $url = 'file_upload.php?id='.$Id;
                                                        }
                                                        else {
                                                            $url = 'file_upload.php';
                                                            }
                                                      ?>
                                                
                                                    <script src="../../Simple-Ajax-Uploader-master/SimpleAjaxUploader.js"></script>
                                                    <script>
                                                    function escapeTags( str ) {
                                                      return String( str )
                                                               .replace( /&/g, '&amp;' )
                                                               .replace( /"/g, '&quot;' )
                                                               .replace( /'/g, '&#39;' )
                                                               .replace( /</g, '&lt;' )
                                                               .replace( />/g, '&gt;' );
                                                    }
                                                    
                                                    $(document).ready(function() {
                                                     
                                                      var btn1 = document.getElementById('uploadBtn4'),
                                                          progressBar1 = document.getElementById('progressBar4'),
                                                          progressOuter1 = document.getElementById('progressOuter4'),
                                                          msgBox1 = document.getElementById('msgBox4');
                                                    
                                                      var uploader1 = new ss.SimpleUpload({
                                                            button: btn1,
                                                            url: '<?=$url?>',
                                                            sessionProgressUrl: '../../Simple-Ajax-Uploader-master/code/sessionProgress.php',
                                                            //name: 'uploadfile',
                                                            name:'file_picture', 
                                                            multipart: true,
                                                            hoverClass: 'hover',
                                                            focusClass: 'focus',
                                                            responseType: 'json',
                                                            startXHR: function() {
                                                                progressOuter1.style.display = 'block'; // make progress bar visible           
                                                                this.setProgressBar( progressBar1 );           
                                                            },
                                                            onSubmit: function() {
                                                                msgBox1.innerHTML = ''; // empty the message box
                                                                btn1.innerHTML = 'Uploading...'; // change button text to "Uploading..."
                                                              },
                                                            onComplete: function( filename, response ) {
                                                                //btn.innerHTML = 'Choose Another File';
                                                                $("#uploadBtn4").removeAttr('required');
                                                                btn1.innerHTML = 'Choose File';
                                                                progressOuter1.style.display = 'none'; // hide progress bar when upload is completed
                                                    
                                                                if ( !response ) {
                                                                    msgBox1.innerHTML = 'Unable to upload file';
                                                                    return;
                                                                }
                                                    
                                                                if ( response.success === true ) {
                                                                    msgBox1.innerHTML = '<strong>' + escapeTags( filename ) + '</strong>' + ' successfully uploaded.';
                                                    
                                                                } else {
                                                                    if ( response.msg )  {
                                                                        msgBox1.innerHTML = escapeTags( response.msg );
                                                    
                                                                    } else {
                                                                        msgBox1.innerHTML = 'An error occurred and the upload failed.';
                                                                    }
                                                                }
                                                              },
                                                            onError: function() {
                                                                progressOuter1.style.display = 'none';
                                                                msgBox1.innerHTML = 'Unable to upload file';
                                                              }
                                                        });
                                                        
                                                      
                                                    });
                                                    </script>
                                                    
                                                     <?php 
                                                      if(empty($file_picture))
                                                      {
                                                        echo "Is file uploaded?  No";
                                                      }
                                                     else
                                                     {
                                                       echo "Is file uploaded? Yes";
                                                     }
                                                    ?>	<br />
                                                    
                                                    <code><font color="#993333">[N.B. Supported file extension is pdf,png,jpg,jpeg. Example file.jpg]</font></code>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Company</td>
                                                 <td>
                                                    <input type="text" name="company" id="company"  value="<?=$company?>" class="form-control-static">
                                                 </td>
                                             </tr><tr>
                                                 <td>Address</td>
                                                 <td>
                                                    <input type="text" name="address" id="address"  value="<?=$address?>" class="form-control-static">
                                                 </td>
                                             </tr><tr>
                                                 <td>City</td>
                                                 <td>
                                                    <input type="text" name="city" id="city"  value="<?=$city?>" class="form-control-static">
                                                 </td>
                                             </tr><tr>
                                                 <td>State</td>
                                                 <td>
                                                    <input type="text" name="state" id="state"  value="<?=$state?>" class="form-control-static">
                                                 </td>
                                             </tr><tr>
                                                 <td>Zip</td>
                                                 <td>
                                                    <input type="text" name="zip" id="zip"  value="<?=$zip?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>ABN</td>
                                                 <td>
                                                    <input type="text" name="ABN" id="ABN"  value="<?=$ABN?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td valign="top">Commercial Address</td>
                                                 <td>
                                                    <textarea name="commercial_address" id="commercial_address"  class="form-control-static" style="width:200px;height:100px;"><?=$commercial_address?></textarea>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Passport</td>
                                                 <td>
                                                    <input type="text" name="passport" id="passport"  value="<?=$passport?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td valign="top">Residential Address</td>
                                                 <td>
                                                    <textarea name="residential_address" id="residential_address"  class="form-control-static" style="width:200px;height:100px;"><?=$residential_address?></textarea>
                                                 </td>
                                             </tr>
                                             <tr>
                                                     <td>Country</td>
                                                     <td><?php
                                                            $info['table']    = "country";
                                                            $info['fields']   = array("*");   	   
                                                            $info['where']    =  "1=1 ORDER BY id DESC";
                                                            $rescountry  =  $db->select($info);
                                                        ?>
                                                        <select  name="country_id" id="country_id"   class="form-control-static">
                                                            <option value="">--Select--</option>
                                                            <?php
                                                               foreach($rescountry as $key=>$each)
                                                               { 
                                                            ?>
                                                              <option value="<?=$rescountry[$key]['id']?>" <?php if($rescountry[$key]['id']==$country_id){ echo "selected"; }?>><?=$rescountry[$key]['country']?></option>
                                                            <?php
                                                             }
                                                            ?> 
                                                        </select>
                                                        </td>
                                              </tr>    
                                              <tr>
                                                 <td>Facebook</td>
                                                 <td>
                                                    <input type="text" name="facebook" id="facebook"  value="<?=$facebook?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Linkedin</td>
                                                 <td>
                                                    <input type="text" name="linkedin" id="linkedin"  value="<?=$linkedin?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Twitter</td>
                                                 <td>
                                                    <input type="text" name="twitter" id="twitter"  value="<?=$twitter?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Google Plus</td>
                                                 <td>
                                                    <input type="text" name="google_plus" id="google_plus"  value="<?=$google_plus?>" class="form-control-static">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Status</td>
                                                 <td><?php
                                                            $enumusers = getEnumFieldValues('users','status');
                                                        ?>
                                                        <select  name="status" id="status"   class="form-control-static">
                                                        <?php
                                                           foreach($enumusers as $key=>$value)
                                                           { 
                                                        ?>
                                                          <option value="<?=$value?>" <?php if($value==$status){ echo "selected"; }?>><?=$value?></option>
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

