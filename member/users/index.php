<?php
       session_start();
       include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
	   
	    if(empty($_SESSION['users_id'])) 
	   {
	     Header("Location: ../login/");
	   }
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "users";
				//$data['email']   = $_REQUEST['email'];
                //$data['password']   = $_REQUEST['password'];
                $data['title']   = $_REQUEST['title'];
                $data['first_name']   = $_REQUEST['first_name'];
                $data['last_name']   = $_REQUEST['last_name'];
				
			    $_SESSION['file_picture_tmp_name'] = base64_decode($_SESSION['file_picture_tmp_name']);
				if(strlen($_SESSION['file_picture_name'])>0)
				{
					
					if(!file_exists("../../profile_images"))
					{ 
					   mkdir("../../profile_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_SESSION['file_picture_name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_SESSION['file_picture_name'])));
					}
					$filePath="../../profile_images/".$file;
					
					//move_uploaded_file($_SESSION['file_picture_name_tmp_name'],$filePath);
					
					$fp=fopen($filePath,"w");
					
					fwrite($fp,$_SESSION['file_picture_tmp_name']);
					
					$data['file_picture']="profile_images/".trim($file);
					
					unset($_SESSION['file_picture_tmp_name']);
					unset($_SESSION['file_picture_name']);
				}

				
				
				
				
                $data['company']   = $_REQUEST['company'];
                $data['address']   = $_REQUEST['address'];
                $data['city']   = $_REQUEST['city'];
                $data['state']   = $_REQUEST['state'];
                $data['zip']   = $_REQUEST['zip'];
				$data['ABN']   = $_REQUEST['ABN'];
                $data['commercial_address']   = $_REQUEST['commercial_address'];
                $data['passport']   = $_REQUEST['passport'];
                $data['residential_address']   = $_REQUEST['residential_address'];
                $data['country_id']   = $_REQUEST['country_id'];
				if(empty($_REQUEST['id']))
				{
                	$data['created_at']   = date("Y-m-d H:s:i");
				}
				else
				{
                	$data['updated_at']   = date("Y-m-d H:s:i");
				}
                $data['user_type']   = 'client';
				$data['facebook']   = $_REQUEST['facebook'];
                $data['linkedin']   = $_REQUEST['linkedin'];
                $data['twitter']   = $_REQUEST['twitter'];
                $data['google_plus']   = $_REQUEST['google_plus'];
                $data['status']   = $_REQUEST['status'];
                
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					$status =  $db->insert($info);
					if($status)
					{
						$msg = "Profile has been saved sucesfully";
					}
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id='".$Id."' AND id='".$_SESSION['users_id']."'";
					
					$status = $db->update($info);
					if($status)
					{
						$msg = "Profile has been updated sucesfully";
					}
				}
				
				include("users_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "users";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$email    = $res[0]['email'];
					$password    = $res[0]['password'];
					$title    = $res[0]['title'];
					$first_name    = $res[0]['first_name'];
					$last_name    = $res[0]['last_name'];
					$company    = $res[0]['company'];
					$address    = $res[0]['address'];
					$city    = $res[0]['city'];
					$state    = $res[0]['state'];
					$zip    = $res[0]['zip'];
					$ABN    = $res[0]['ABN'];
					$commercial_address    = $res[0]['commercial_address'];
					$passport    = $res[0]['passport'];
					$residential_address    = $res[0]['residential_address'];
					$country_id    = $res[0]['country_id'];
					$created_at    = $res[0]['created_at'];
					$updated_at    = $res[0]['updated_at'];
					$user_type    = $res[0]['user_type'];
					$facebook    = $res[0]['facebook'];
					$linkedin    = $res[0]['linkedin'];
					$twitter    = $res[0]['twitter'];
					$google_plus    = $res[0]['google_plus'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("users_editor.php");						  
				break;
						   
         case 'close': 
		        $Id  = $_REQUEST['id']; 
				if($Id)
				{
					$info['table']    = "users"; 
					$data['status']   = 'inactive';
					$info['data']     =  $data;
					$info['where']    = "id='".$_SESSION['users_id']."'";
					$status = $db->update($info);
					if($status)
					{
						$msg = "Profile has been closed sucesfully";
					}

				}
				include("users_list.php");						   
				break; 
						   
         case "list" :    	 
			  if(!empty($_REQUEST['page'])&&$_SESSION["search"]=="yes")
				{
				  $_SESSION["search"]="yes";
				}
				else
				{
				   $_SESSION["search"]="no";
					unset($_SESSION["search"]);
					unset($_SESSION['field_name']);
					unset($_SESSION["field_value"]); 
				}
				include("users_list.php");
				break; 
        case "search_users":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("users_list.php");
				break;  								   
						
	     default :    
		       include("users_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'users'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
