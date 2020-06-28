<?php
       session_start();
       include("../common/lib.php");
	   include("../lib/class.db.php");
	   include("../common/config.php");
	   include("../cart/paypal_pro.lib.php");	   
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     	//paypal pro transaction
	      case "order" :  
				global $httptrnsaction;
			   if(card_payment_submit()==true)
			   {
				  if($httptrnsaction['ACK']=="Success")
				  {
					$TRANSACTIONID = $httptrnsaction['TRANSACTIONID'];
					order_add($db);
					$message = " <font color=\"red\">Order has been completed successfully</font>";
					unset($_SESSION['cart']);	
				  }
			   }
			   else
				{
				   $message = "Please fix your credit card and billing information <br>
						   <font color=\"red\">".str_replace("%2e"," ",str_replace("%20"," ",$httptrnsaction['L_LONGMESSAGE0']))."</font>";
					 
				 }
	        include("../cart/cart_list.php");
		   break;	
		 case "update":
		          //Update Quantity at cart
				   $count = count($_SESSION['cart']);					   
				   for($i=0;$i<$count;$i++)
				   {
					 
					 if($_REQUEST['item_number']==$_SESSION['cart'][$i]['item_number']  && $_REQUEST['item_name']==$_SESSION['cart'][$i]['item_name'])
					 {
						  $_SESSION['cart'][$i]['quantity'] =$_REQUEST['quantity'];
					   break;	 
					 }
				  }
				include("../cart/cart_list.php");
				break;	
		  case "remove":
		            //Remove item from cart
				       $removeflag = false;
				       $count = count($_SESSION['cart']);					   
					   for($i=0;$i<$count;$i++)
					   {
					     
					     if($_REQUEST['item_number']==$_SESSION['cart'][$i]['item_number']  && $_REQUEST['item_name']==$_SESSION['cart'][$i]['item_name'])
						 {
						  $remove_position=$i;
						  $removeflag = true;
						  break;
						 }
					  }
					  if($removeflag == true)
					  {
					  for($i=$remove_position;$i<$count-1;$i++)
					   {
					    $_SESSION['cart'][$i]['os0'] = $_SESSION['cart'][$i+1]['os0'];
						$_SESSION['cart'][$i]['os1'] = $_SESSION['cart'][$i+1]['os1'];
						$_SESSION['cart'][$i]['item_name'] = $_SESSION['cart'][$i+1]['item_name'];
						$_SESSION['cart'][$i]['item_number'] = $_SESSION['cart'][$i+1]['item_number'];
						$_SESSION['cart'][$i]['quantity'] = $_SESSION['cart'][$i+1]['quantity'];
						$_SESSION['cart'][$i]['amount'] = $_SESSION['cart'][$i+1]['amount'];
						$_SESSION['cart'][$i]['shipping_charge'] = $_SESSION['cart'][$i+1]['shipping_charge'];
					   } 
					   unset($_SESSION['cart'][$i]);
					   }
		        include("../cart/cart_list.php");
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
				include("../cart/cart_list.php");
				break;
	     default :    
		       include("../cart/cart_list.php");         
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
/*
  order add
*/
function order_add($db)
{
	//add shipping address
	   unset($info);
	   unset($data);
	$info['table']    = "shipping_address";
	$data['ship_first_name']   = $_REQUEST['ship_first_name'];
	$data['ship_last_name']   = $_REQUEST['ship_last_name'];
	$data['ship_adress1']   = $_REQUEST['ship_adress1'];
	$data['ship_adress2']   = $_REQUEST['ship_adress2'];
	$data['ship_zip_code']   = $_REQUEST['ship_zip_code'];
	$data['ship_city']   = $_REQUEST['ship_city'];
	$data['ship_state']   = $_REQUEST['ship_state'];
	$data['ship_country']   = $_REQUEST['ship_country'];	
	$info['data']     =  $data;	
	$db->insert($info);
	$shipping_address_id = $db->lastInsert(true);
	//add billing information
       unset($info);
	   unset($data);
	$info['table']    = "billing_information";
	$data['first_name']   = $_REQUEST['first_name'];
	$data['last_name']   = $_REQUEST['last_name'];
	$data['country']   = $_REQUEST['country'];
	$data['adress1']   = $_REQUEST['adress1'];
	$data['adress2']   = $_REQUEST['adress2'];
	$data['city']   = $_REQUEST['city'];
	$data['state']   = $_REQUEST['state'];
	$data['zip_code']   = $_REQUEST['zip_code'];
	$info['data']     =  $data;	
	$db->insert($info);		
	$billing_information_id = $db->lastInsert(true);	
	//add order
       unset($info);
	   unset($data);
	$info['table']    = "orders";
	$data['users_id']   = $_SESSION['users_id'];
	$data['shipping_address_id']   = $shipping_address_id;
	$data['billing_information_id']   = $billing_information_id;
	$data['shipping_cost']   = $_REQUEST['shipping_cost'];
	$data['total_amount']   = $_REQUEST['payment_amuont'];
	$data['date_created']   = date("Y-m-d H:i:s");
	$data['delivery_status']   = 'pending';
	$info['data']     =  $data;	
	$db->insert($info);				
	$orders_id = $db->lastInsert(true);
	//add item
	$count = count($_SESSION['cart']);					
	for($i=0;$i<$count;$i++)
	{
	    	unset($info);
	        unset($data);
		$info['table']    = "items";
		$data['orders_id']   = $orders_id;
		$data['os0']   = $_SESSION['cart'][$i]['os0'];
		$data['item_name']   = $_SESSION['cart'][$i]['item_name'];
		$data['item_number']   = $_SESSION['cart'][$i]['item_number'];
		$data['quantity']   = $_SESSION['cart'][$i]['quantity'];
		$data['amount']   = $_SESSION['cart'][$i]['amount'];
		$info['data']     =  $data;	
		$db->insert($info);					
			
	}
}
function get_quantity($db,$ProductID)
{
      unset($info);
	$info["table"] = "products";
	$info["fields"] = array("products.*"); 
	$info["where"]   = "1 AND ProductID='".$ProductID."'";
	$arr =  $db->select($info);
	
	return $arr[0]['Quantity']; 
	
}
?>
