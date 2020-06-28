<?php
       session_start();
	   require(dirname(__FILE__) . '/../../Simple-Ajax-Uploader-master/code/Uploader.php');
	   
/*	   include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
*/	   
	   if(check_file_extension($_FILES)==false)
		{
		  exit(json_encode(array('success' => false, 'msg' =>'Error:  .'.$_SESSION['extension'].' is not a supported file'))); 
		}
		
		
		if(strlen($_FILES['file_picture']['name'])>0 && $_FILES['file_picture']['size']>0)
		{
			$_SESSION['file_picture_tmp_name'] = base64_encode(file_get_contents($_FILES['file_picture']['tmp_name']));
			$_SESSION['file_picture_name']     = $_FILES['file_picture']['name'];
			
		   echo json_encode(array('success' => true)); 	
		   exit;
		}
		
		////////////////////////////////////
		
		
		/*if (!$result) {
		  exit(json_encode(array('success' => false, 'msg' => $uploader->getErrorMsg())));  
		}*/
				
		echo json_encode(array('success' => true));
		
		function check_file_extension($_files)
		{
		  foreach($_files as $key=>$name)
		  {
			 if(strlen($_files[$key]['name'])>0 && $_files[$key]['size']>0)
			 {
					 unset($arr);			
					 $arr = explode(".",$_files[$key]['name']);			
					 $extension = strtolower($arr[count($arr)-1]);			
					 if(!( $extension == "pdf" || $extension == "png"  || $extension == "jpg" || $extension == "jpeg"))
					 {
						 $_SESSION['extension'] = $extension;
						// echo '<font color="red"><h3>Error:'.$extension .' is not supported file</h3></font>';
						 return false;
					 }
			 }
			// echo $arr[count($arr)-1];
		  } 
		  return true;
		}
		
		/*function maxId()
		{
			$sql    = "SHOW TABLE STATUS LIKE 'users'";
			$result = $db->execQuery($sql);
			$row    = $db->resultArray();
			return $row[0]['Auto_increment'];	
		}*/
?>