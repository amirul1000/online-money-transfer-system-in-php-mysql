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
				$info['table']    = "orders";
				$data['users_id']   = $_REQUEST['users_id'];
                $data['shipping_address_id']   = $_REQUEST['shipping_address_id'];
                $data['billing_information_id']   = $_REQUEST['billing_information_id'];
                $data['shipping_cost']   = $_REQUEST['shipping_cost'];
                $data['total_amount']   = $_REQUEST['total_amount'];
                $data['date_created']   = $_REQUEST['date_created'];
                $data['delivery_status']   = $_REQUEST['delivery_status'];
                
				
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
				
				include("../orders/orders_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "orders";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$users_id    = $res[0]['users_id'];
					$shipping_address_id    = $res[0]['shipping_address_id'];
					$billing_information_id    = $res[0]['billing_information_id'];
					$shipping_cost    = $res[0]['shipping_cost'];
					$total_amount    = $res[0]['total_amount'];
					$date_created    = $res[0]['date_created'];
					$delivery_status    = $res[0]['delivery_status'];
					
				 }
						   
				include("../orders/orders_editor.php");						  
				break;  
        case 'delete': 
			   //get order info		
				$info["table"] = "orders";
				$info["fields"] = array("orders.*"); 
				$info["where"]   = "1  AND id='".$_REQUEST['id']."'";
				$arr =  $db->select($info);
		        //delete order
				$Id               = $_REQUEST['id'];
				$info['table']    = "orders";
				$info['where']    = "id='$Id'";
				$db->delete($info);
				//delete billing info
				$info['table']    = "billing_information";
				$info['where']    = "id='".$arr[0]['billing_information_id']."'";
				$db->delete($info);
				//delete shipping info
				$info['table']    = "shipping_address";
				$info['where']    = "id='".$arr[0]['shipping_address_id']."'";
				$db->delete($info);
				//delete items
				$info['table']    = "items";
				$info['where']    = "orders_id='$Id'";
				$db->delete($info);
				include("../orders/orders_list.php");						   
				break; 
		 case "change_delivery_status":
		        $info['table']    = "orders";
                $data['delivery_status']   = $_REQUEST['delivery_status'];
				$info['data']     =  $data;
				if(!empty($_REQUEST['id']))
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					$db->update($info);
				}
				include("../orders/orders_list.php");						   
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
				include("../orders/orders_list.php");
				break; 
        case "search_orders":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("../orders/orders_list.php");
				break;  								   
						
	     default :    
		       include("../orders/orders_editor.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {
	   $info['table']    = "orders";
	   $info['fields']   = array("max(id) as maxid");   	   
	   $info['where']    =  "1=1";
	  
	   $resmax  =  $db->select($info);
	   if(count($resmax)>0)
	   {
		 $max = $resmax[0]['maxid']+1;
	   }
	   else
	   {
		$max=0;
	   }	  
	   return $max;
 } 
/*
  get image by ProductID
*/	   
function getImage($db,$products_id)
{
	   unset($info);
	$info["table"] = "products";
	$info["fields"] = array("products.*"); 
	$info["where"]   = "1 AND id='".$products_id."'";
	$arr =  $db->select($info);
	
	return $arr[0]['file_image1'];
}
?>
