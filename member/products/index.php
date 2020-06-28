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
				$info['table']    = "products";
				$data['users_id']   = $_SESSION['users_id'];
                $data['category_id']   = $_REQUEST['category_id'];
                $data['model']   = $_REQUEST['model'];
                $data['title']   = $_REQUEST['title'];
                $data['product_condition']   = $_REQUEST['product_condition'];
                $data['sale_type']   = $_REQUEST['sale_type'];
                $data['quantity']   = $_REQUEST['quantity'];
                $data['price']   = $_REQUEST['price'];
                $data['discount']   = $_REQUEST['discount'];
                $data['shipping_cost']   = $_REQUEST['shipping_cost'];
                $data['description']   = $_REQUEST['description'];
                $data['product_details']   = $_REQUEST['product_details'];
                $data['size']   = $_REQUEST['size'];
                $data['weight']   = $_REQUEST['weight'];
                $data['color']   = $_REQUEST['color'];
                $data['company_name']   = $_REQUEST['company_name'];
                $data['agreement_year']   = $_REQUEST['agreement_year'];
                $data['made_in']   = $_REQUEST['made_in'];
                $data['shipping_desc']   = $_REQUEST['shipping_desc'];
                $data['delivery_desc']   = $_REQUEST['delivery_desc'];
                $data['payment_desc']   = $_REQUEST['payment_desc'];
                $data['return_desc']   = $_REQUEST['return_desc'];
                     
				if(strlen($_FILES['file_image1']['name'])>0 && $_FILES['file_image1']['size']>0)
				{
					
					if(!file_exists("../../products_images"))
					{ 
					   mkdir("../../products_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_image1']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_image1']['name'])));
					}
					$filePath="../../products_images/".$file;
					move_uploaded_file($_FILES['file_image1']['tmp_name'],$filePath);
					$data['file_image1']="products_images/".trim($file);
				}
                     
				if(strlen($_FILES['file_image2']['name'])>0 && $_FILES['file_image2']['size']>0)
				{
					
					if(!file_exists("../../products_images"))
					{ 
					   mkdir("../../products_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_image2']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_image2']['name'])));
					}
					$filePath="../../products_images/".$file;
					move_uploaded_file($_FILES['file_image2']['tmp_name'],$filePath);
					$data['file_image2']="products_images/".trim($file);
				}
                $data['product_type']   = $_REQUEST['product_type'];
                
				
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
				
				include("products_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "products";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$users_id    = $res[0]['users_id'];
					$category_id    = $res[0]['category_id'];
					$model    = $res[0]['model'];
					$title    = $res[0]['title'];
					$product_condition    = $res[0]['product_condition'];
					$sale_type    = $res[0]['sale_type'];
					$quantity    = $res[0]['quantity'];
					$price    = $res[0]['price'];
					$discount    = $res[0]['discount'];
					$shipping_cost    = $res[0]['shipping_cost'];
					$description    = $res[0]['description'];
					$product_details    = $res[0]['product_details'];
					$size    = $res[0]['size'];
					$weight    = $res[0]['weight'];
					$color    = $res[0]['color'];
					$company_name    = $res[0]['company_name'];
					$agreement_year    = $res[0]['agreement_year'];
					$made_in    = $res[0]['made_in'];
					$shipping_desc    = $res[0]['shipping_desc'];
					$delivery_desc    = $res[0]['delivery_desc'];
					$payment_desc    = $res[0]['payment_desc'];
					$return_desc    = $res[0]['return_desc'];
					$file_image1    = $res[0]['file_image1'];
					$file_image2    = $res[0]['file_image2'];
					$product_type    = $res[0]['product_type'];
					
				 }
						   
				include("products_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "products";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("products_list.php");						   
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
				include("products_list.php");
				break; 
        case "search_products":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("products_list.php");
				break;  								   
						
	     default :    
		       include("products_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'products'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
