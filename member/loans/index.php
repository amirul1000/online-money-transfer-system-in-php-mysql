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
				$info['table']    = "loans";
				$data['users_id']   = $_REQUEST['users_id'];
                $data['subject']   = $_REQUEST['subject'];
                $data['description']   = $_REQUEST['description'];
                $data['currency_id']   = $_REQUEST['currency_id'];
                $data['debit']   = $_REQUEST['debit'];
                $data['credit']   = $_REQUEST['credit'];
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
					$info['where'] = "id='".$Id."' AND users_id='".$_SESSION['users_id']."'";
					
					$db->update($info);
				}
				
				include("loans_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "loans";
					$info['fields']   = array("*");   	   
					$info['where'] = "id='".$Id."' AND users_id='".$_SESSION['users_id']."'";
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$users_id    = $res[0]['users_id'];
					$subject    = $res[0]['subject'];
					$description    = $res[0]['description'];
					$currency_id    = $res[0]['currency_id'];
					$debit    = $res[0]['debit'];
					$credit    = $res[0]['credit'];
					$refference    = $res[0]['refference'];
					$date_time_created    = $res[0]['date_time_created'];
					$date_time_updated    = $res[0]['date_time_updated'];
					
				 }
						   
				include("loans_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "loans";
				$info['where'] = "id='".$Id."' AND users_id='".$_SESSION['users_id']."'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("loans_list.php");						   
				break; */
				
		 case "request_a_loan":		       
		        $info['table']    = "loans_request";
				$data['users_id']   = $_SESSION['users_id'];
                //$data['action_by_users_id']   = $_REQUEST['action_by_users_id'];
                $data['subject']   = $_REQUEST['subject'];
                $data['description']   = $_REQUEST['description'];
                $data['currency_id']   = $_REQUEST['currency_id'];
                $data['amount']   = $_REQUEST['amount'];
                $data['refference']   = 'Loan request';
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
					 echo json_encode(array('status'=>'success','msg'=>'Loan request has been sent successfully'));
				 }
				break;	
		 case "return_loan":
		        $info['table']    = "loans";
				$data['users_id']   = $_SESSION['users_id'];
                $data['subject']   = $_REQUEST['subject'];
                $data['description']   = $_REQUEST['description'];
                $data['currency_id']   = $_REQUEST['currency_id'];
                $data['debit']   = $_REQUEST['debit'];
                $data['credit']   = 0.0;
                $data['refference']   = 'Loan returned';
                if(empty($_REQUEST['id']))
				{
                    $data['date_time_created']   = date("Y-m-d H:i:s");
				}
				else
				{
                	$data['date_time_updated']   = date("Y-m-d H:i:s");
				}
				$info['data']     =  $data;
				$status = $db->insert($info);				
				 //////////////////////////////////////////
				  unset($arr);
				$arr['users_id']= $_SESSION['users_id'];
				$arr['subject']= 'Loan returned';
				$arr['description']= 'Loan returned';
				$arr['currency_id']= $_REQUEST['currency_id'];
				$arr['debit'] = $_REQUEST['debit'];
				$arr['credit'] = 0.0;
				$arr['refference']= 'Loan returned';
				$arr['date_time_created']   = date("Y-m-d H:i:s");
				//$info['debug']     = true;
				add_transaction($db,$arr);
				if($status==true)
				 {
					 echo json_encode(array('status'=>'success','msg'=>'You have sucessfully returned the loan'));
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
				include("loans_list.php");
				break; 
        case "search_loans":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("loans_list.php");
				break;  								   
						
	     default :    
		       include("loans_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'loans'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
