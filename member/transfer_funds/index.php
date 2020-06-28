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
		  
		        ////////////////////User info//////////////////////////
				$sender = get_users_info($db,$_SESSION['users_id']);
				$receiver = get_users_info($db,get_users_id_by_email($db,$_REQUEST['to_email']));
				$code = get_currency_code($db,$_REQUEST['currency_id']);

		        ////////////////////////////////////////////////////////////////
		  
		  
				$info['table']    = "transfer_funds";
				$data['from_users_id']   = $_SESSION['users_id'];
                $data['to_users_id']   = get_users_id_by_email($db,$_REQUEST['to_email']);
                $data['subject']   = $_REQUEST['subject'];
                $data['description']   = $_REQUEST['description'];
                $data['to_email']   = $_REQUEST['to_email'];
				$data['currency_id']   = $_REQUEST['currency_id'];
                $data['amount']   = $_REQUEST['amount'];
                $data['refference']   = "Transferred Fund - sender: ".$sender[0]['first_name']." ".$sender[0]['last_name']." ".$sender[0]['email']."
				                                           receiver: ".$receiver[0]['first_name']." ".$receiver[0]['last_name']." ".$receiver[0]['email'];
                $data['date_time_created']   = date("Y-m-d H:i:s");
                //$data['date_time_updated']   = $_REQUEST['date_time_updated'];
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
				
								
				/////////////////debit from users//////////////
					 unset($arr);
				$arr['users_id']= $_SESSION['users_id'];
				$arr['subject']= $_REQUEST['subject'];
				$arr['description']= $_REQUEST['description'];
				$arr['currency_id']= $_REQUEST['currency_id'];
				$arr['debit'] = $_REQUEST['amount'];
				$arr['credit'] = 0.0;
				$arr['refference']= 'Transfer funds';
				$arr['date_time_created']   = date("Y-m-d H:i:s");
				//$info['debug']     = true;
				add_transaction($db,$arr);
				
				/////////////////credit to users//////////////
					 unset($arr);
				$arr['users_id']= get_users_id_by_email($db,$_REQUEST['to_email']);
				$arr['subject']= $_REQUEST['subject'];
				$arr['description']= $_REQUEST['description'];
				$arr['currency_id']= $_REQUEST['currency_id'];
				$arr['debit'] = 0.0;
				$arr['credit'] = $_REQUEST['amount'];
				$arr['refference']= 'Transfer funds';
				$arr['date_time_created']   = date("Y-m-d H:i:s");
				//$info['debug']     = true;
				add_transaction($db,$arr);

                //////////////////////////send email/////////////////////
				//send email to sender
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				
				// Additional headers
				//$headers .= 'To: '.$data['email'].'' . "\r\n";
				$headers .= 'From: Sovereign Money <'.$sender[0]['email'].'>' . "\r\n";
				//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
				//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
				
				// Mail it
				$subject = "You transfered a fund"; 
				$message_body  = "Dear ".$sender[0]['first_name']." ".$sender[0]['last_name'].",<br>
				    You trnsfered a fund of amount ".$code." ".$_REQUEST['amount']." to 
					".$receiver[0]['first_name']." ".$receiver[0]['last_name']."<br>
					Thank You <br>
					Sovereign Money";
				
				mail($sender[0]['email'], $subject, $message_body, $headers); 

				//send email to receiver
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				
				// Additional headers
				//$headers .= 'To: '.$data['email'].'' . "\r\n";
				$headers .= 'From: Sovereign Money <'.$receiver[0]['email'].'>' . "\r\n";
				//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
				//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
				
				// Mail it
				$subject = "You received a fund"; 
				$message_body  = "Dear ".$receiver[0]['first_name']." ".$receiver[0]['last_name'].",<br>
				    You recived a fund of amount ".$code." ".$_REQUEST['amount']." from 
					".$sender[0]['first_name']." ".$sender[0]['last_name']."<br>
					Thank You <br>
					Sovereign Money";
				
				mail($sender[0]['email'], $subject, $message_body, $headers); 
				
				$message = "Your fund has been sent successfully";
				
				include("transfer_funds_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "transfer_funds";
					$info['fields']   = array("*");   	   
					$info['where'] = "id='".$Id."' AND users_id='".$_SESSION['users_id']."'";
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$from_users_id    = $res[0]['from_users_id'];
					$to_users_id    = $res[0]['to_users_id'];
					$subject    = $res[0]['subject'];
					$description    = $res[0]['description'];
					$to_email    = $res[0]['to_email'];
					$amount    = $res[0]['amount'];
					$refference    = $res[0]['refference'];
					$date_time_created    = $res[0]['date_time_created'];
					$date_time_updated    = $res[0]['date_time_updated'];
					
				 }
						   
				include("transfer_funds_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "transfer_funds";
				$info['where'] = "id='".$Id."' AND users_id='".$_SESSION['users_id']."'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("transfer_funds_list.php");						   
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
				include("transfer_funds_list.php");
				break; 
        case "search_transfer_funds":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("transfer_funds_list.php");
				break;  								   
						
	     default :    
		       include("transfer_funds_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'transfer_funds'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
