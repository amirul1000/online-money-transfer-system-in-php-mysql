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
	     
		  /*case 'add': 
				$info['table']    = "withdraw";
				$data['users_id']   = $_REQUEST['users_id'];
                $data['subject']   = $_REQUEST['subject'];
                $data['description']   = $_REQUEST['description'];
                $data['currency_id']   = $_REQUEST['currency_id'];
                $data['amount']   = $_REQUEST['amount'];
                $data['coin_type']   = $_REQUEST['coin_type'];
                $data['coin']   = $_REQUEST['coin'];
                $data['refference']   = $_REQUEST['refference'];
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
					$info['where'] = "id=".$Id;
					
					$db->update($info);
				}
				
				include("withdraw_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "withdraw";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$users_id    = $res[0]['users_id'];
					$subject    = $res[0]['subject'];
					$description    = $res[0]['description'];
					$currency_id    = $res[0]['currency_id'];
					$amount    = $res[0]['amount'];
					$coin_type    = $res[0]['coin_type'];
					$coin    = $res[0]['coin'];
					$refference    = $res[0]['refference'];
					$date_time_created    = $res[0]['date_time_created'];
					$date_time_updated    = $res[0]['date_time_updated'];
					
				 }
						   
				include("withdraw_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "withdraw";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("withdraw_list.php");						   
				break; */
		 case "request_a_withdraw":		       
		        $info['table']    = "withdraw_request";
				$data['users_id']   = $_SESSION['users_id'];
                //$data['action_by_users_id']   = $_REQUEST['action_by_users_id'];
                $data['subject']   = $_REQUEST['subject'];
                $data['description']   = $_REQUEST['description'];
                $data['currency_id']   = $_REQUEST['currency_id'];
                $data['amount']   = $_REQUEST['amount'];
				$data['coin_type']  = $_REQUEST['coin_type'];
                $data['refference']   = 'Withdraw request';
				if(empty($_REQUEST['id']))
				{
                    $data['date_time_created']   = date("Y-m-d H:i:s");
				}
				else
				{
                	$data['date_time_updated']   = date("Y-m-d H:i:s");
				}
                $data['status']   = 'pending';               
				$info['data']     =  $data;
				$status = $db->insert($info);
				if($status==true)
				 {
					 echo json_encode(array('status'=>'success','msg'=>'Withdraw request has been sent successfully'));
				 }
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
				include("withdraw_list.php");
				break; 
        case "search_withdraw":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("withdraw_list.php");
				break;  								   
						
	     default :    
		       include("withdraw_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'withdraw'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
