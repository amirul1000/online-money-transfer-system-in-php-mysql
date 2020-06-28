<?php
       session_start();
       include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
	   include("../../common_lib/common_lib.php");
	   
	    if(empty($_SESSION['users_id'])) 
	   {
	     Header("Location: ../login/");
	   }
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		 /* case 'add': 
				$info['table']    = "subscription";
				$data['users_id']   = $_SESSION['users_id'];
                $data['email']   = $_REQUEST['email'];
                $data['date_time_created']   = $_REQUEST['date_time_created'];
                $data['date_time_updated']   = $_REQUEST['date_time_updated'];
                
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					 $db->insert($info);
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id='".$Id."' AND users_id='".$_SESSION['users_id']."'";
					
					$db->update($info);
				}
				
				include("subscription_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "subscription";
					$info['fields']   = array("*");   	   
					$info['where'] = "id='".$Id."' AND users_id='".$_SESSION['users_id']."'";
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$users_id    = $res[0]['users_id'];
					$email    = $res[0]['email'];
					$date_time_created    = $res[0]['date_time_created'];
					$date_time_updated    = $res[0]['date_time_updated'];
					
				 }
						   
				include("subscription_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "subscription";
				$info['where'] = "id='".$Id."' AND users_id='".$_SESSION['users_id']."'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("subscription_list.php");						   
				break; */
		 case "subscribe":
		              unset($info);
				$info["table"] = "subscription";
				$info["fields"] = array("subscription.*"); 
				$info["where"]   = "1 AND users_id='".$_SESSION['users_id']."'";
				$arr =  $db->select($info);
				
				$Id            = $arr[0]['id'];

		 
		        $arr2 =  get_users_info($db,$_SESSION['users_id']);
		        $info['table']    = "subscription";
				$data['users_id']   = $_SESSION['users_id'];
                $data['email']   = $arr2[0]['email'];
				if(empty($Id))
				{
                	$data['date_time_created']   = date("Y-m-d H:i:s");
				}
				else
				{
                	$data['date_time_updated']   = date("Y-m-d H:i:s");
				}
				if($arr[0]['status'] == 'subscribe')
				{
					$data['status']   = 'unsubscribe';
				}
				else
				{
					$data['status']   = 'subscribe';	
				}
				$info['data']     =  $data;
				if(empty($Id))
				{
					 $db->insert($info);
				}
				else
				{	
					$info['where'] = "id='".$Id."' AND users_id='".$_SESSION['users_id']."'";
					$db->update($info);
				}
				
		        include("subscription_list.php");						   
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
				include("subscription_list.php");
				break; 
        case "search_subscription":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("subscription_list.php");
				break;  								   
						
	     default :    
		       include("subscription_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'subscription'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
