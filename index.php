<?php
       session_start();
       include("common/lib.php");
	   include("lib/class.db.php");
	   include("common/config.php");
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
		 case "add_to_cart":
				  $count = count($_SESSION['cart']);
				   $flag= true;
				   for($i=0;$i<$count;$i++)
				   {
					 
					 if($_REQUEST['item_number']==$_SESSION['cart'][$i]['item_number']  && $_REQUEST['item_name']==$_SESSION['cart'][$i]['item_name'])
					 {
					   //$_SESSION['cart'][$i]['quantity'] =$_SESSION['cart'][$i]['quantity']+1;
					   $flag = false;
					   break;	 
					 }
				  }
				  
				  if($flag==true)
				  {
					$_SESSION['cart'][$count]['os0']= $_REQUEST['os0'];
					$_SESSION['cart'][$count]['os1']= $_REQUEST['os1'];
					$_SESSION['cart'][$count]['item_name']= $_REQUEST['item_name'];
					$_SESSION['cart'][$count]['item_number']= $_REQUEST['item_number'];
					$_SESSION['cart'][$count]['products_id']= $_REQUEST['products_id'];
					$_SESSION['cart'][$count]['quantity']= $_REQUEST['quantity'];	
					$_SESSION['cart'][$count]['amount']= $_REQUEST['amount'];	
					$_SESSION['cart'][$i]['shipping_charge']=$_REQUEST['shipping_charge'];
				
				  }
				include("home_view.php");	
			   break;		     
	     case "details":
		       include("product_detail.php");	
			   break;	         
	     default :  
		       include("home_view.php");		         
	   }
?>
