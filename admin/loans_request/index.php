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
	     
		  case 'add': 
				$info['table']    = "loans_request";
				$data['users_id']   = $_REQUEST['users_id'];
                $data['action_by_users_id']   = $_REQUEST['action_by_users_id'];
                $data['subject']   = $_REQUEST['subject'];
                $data['description']   = $_REQUEST['description'];
                $data['currency_id']   = $_REQUEST['currency_id'];
                $data['amount']   = $_REQUEST['amount'];
                $data['refference']   = $_REQUEST['refference'];
                $data['date_time_created']   = $_REQUEST['date_time_created'];
                $data['date_time_updated']   = $_REQUEST['date_time_updated'];
                $data['status']   = $_REQUEST['status'];
                
				
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
				
				include("loans_request_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "loans_request";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$users_id    = $res[0]['users_id'];
					$action_by_users_id    = $res[0]['action_by_users_id'];
					$subject    = $res[0]['subject'];
					$description    = $res[0]['description'];
					$currency_id    = $res[0]['currency_id'];
					$amount    = $res[0]['amount'];
					$refference    = $res[0]['refference'];
					$date_time_created    = $res[0]['date_time_created'];
					$date_time_updated    = $res[0]['date_time_updated'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("loans_request_editor.php");						  
				break;		 				   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "loans_request";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("loans_request_list.php");						   
				break;
				
		case "change_status":	
		        if($_REQUEST['status']=='accepted')
				{
					 	  unset($info);
						  unset($data);
					$info['table']    = "loans_request";
					//$data['users_id']   = $_REQUEST['users_id'];
					$data['action_by_users_id']   = $_SESSION['users_id'];
					//$data['subject']   = $_REQUEST['subject'];
					//$data['description']   = $_REQUEST['description'];
					//$data['currency_id']   = $_REQUEST['currency_id'];
					//$data['amount']   = $_REQUEST['amount'];
					//$data['refference']   = $_REQUEST['refference'];
					//$data['date_time_created']   = $_REQUEST['date_time_created'];
					$data['date_time_updated']   = date("Y-m-d H:i:s");
					$data['status']   = $_REQUEST['status'];
					$info['data']     =  $data;
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					$status = $db->update($info);
					if($status ==true)
					 {
						 ////////////////////////add data/////////////////////////////
						  unset($info);
						  unset($data);
						$info['table']    = "loans";
						$data['users_id']   = $_REQUEST['users_id'];
						$data['subject']   = 'Loan accepted';
						$data['description']   = 'Loan accepted';
						$data['currency_id']   = $_REQUEST['currency_id'];
						$data['debit']   = 0.0;
						$data['credit']   = $_REQUEST['amount'];
						$data['refference']   = 'Loan accepted';
						$data['date_time_created']   = date("Y-m-d H:i:s");
						//$info['debug'] = true;
						$info['data']     =  $data;
							 $db->insert($info);
						/////////////////////////////////////////////////////////////////						
						 unset($arr);
						$arr['users_id']= $_REQUEST['users_id'];
						$arr['subject']= 'Loan accepted';
						$arr['description']= 'Loan accepted';
						$arr['currency_id']= $_REQUEST['currency_id'];
						$arr['debit'] = 0.0;
						$arr['credit'] = $_REQUEST['amount'];
						$arr['refference']= 'Loan accepted';
						$arr['date_time_created']   = date("Y-m-d H:i:s");
						add_transaction($db,$arr); 
						
						
						$requester = get_users_info($db,$_SESSION['users_id']);
                        $code = get_currency_code($db,$_REQUEST['currency_id']);
 
						//////////////////////////send email/////////////////////
						//send email to sender
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						
						// Additional headers
						//$headers .= 'To: '.$data['email'].'' . "\r\n";
						$headers .= 'From: Sovereign Money <'.$requester[0]['email'].'>' . "\r\n";
						//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
						//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
						
						// Mail it
						$subject = "Your requested Loan has been ".$_REQUEST['status']; 
						$message_body  = "Dear ".$requester[0]['first_name']." ".$requester[0]['last_name'].",<br>
							Your loan request  of amount ".$code." ".$_REQUEST['amount']." has been approved.<br>
							Thank You <br>
							Sovereign Money";
						
						mail($requester[0]['email'], $subject, $message_body, $headers); 
						
						$msg = "Updated has been completed sucessfully"; 
					 }
				}
				else
				{
				  $msg = "Updated has been completed sucessfully"; 	
				}
				
				include("loans_request_list.php");						   
				break;
		 case "select_users":
			$_SESSION['selected_users_id'] = $_REQUEST['selected_users_id'];
			Header("Location:../loans_request");
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
				include("loans_request_list.php");
				break; 
        case "search_loans_request":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("loans_request_list.php");
				break;  								   
						
	     default :    
		       include("loans_request_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'loans_request'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
