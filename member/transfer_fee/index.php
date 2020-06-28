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
				$info['table']    = "transfer_fee";
				$data['currency_id']   = $_REQUEST['currency_id'];
                $data['fee_amount']   = $_REQUEST['fee_amount'];
                
				
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
				
				include("transfer_fee_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "transfer_fee";
					$info['fields']   = array("*");   	   
					$info['where'] = "id='".$Id."' AND users_id='".$_SESSION['users_id']."'";
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$currency_id    = $res[0]['currency_id'];
					$fee_amount    = $res[0]['fee_amount'];
					
				 }
						   
				include("transfer_fee_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "transfer_fee";
				$info['where'] = "id='".$Id."' AND users_id='".$_SESSION['users_id']."'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("transfer_fee_list.php");						   
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
				include("transfer_fee_list.php");
				break; 
        case "search_transfer_fee":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("transfer_fee_list.php");
				break;  								   
						
	     default :    
		       include("transfer_fee_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'transfer_fee'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
