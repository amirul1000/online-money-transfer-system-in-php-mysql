<?php
  /*
     get user info
  */
  function get_users_info($db,$id)
	  {
		  
			$info["table"] = "users";
			$info["fields"] = array("users.*"); 
			$info["where"]   = "1  AND id='".$id."'";
			$arr =  $db->select($info);
			
			return $arr;
	  }
	  
   /*
     get user info by email
  */
  function get_users_id_by_email($db,$email)
	  {
		  
			$info["table"] = "users";
			$info["fields"] = array("users.*"); 
			$info["where"]   = "1  AND email='".$email."'";
			$arr =  $db->select($info);
			
			return $arr[0]['id'];
	  }
	  
	  
  /*
    get_currency_id
  */ 	  
  function get_currency_id($db,$code)
  {
		$info["table"] = "currency";
		$info["fields"] = array("currency.*"); 
		$info["where"]   = "1 AND code='".$code."'";
	    $arr =  $db->select($info);
		
		return $arr[0]['id'];	
						
  }
  
  /*
    get_currency_code
  */ 	  
  function get_currency_code($db,$id)
  {
		$info["table"] = "currency";
		$info["fields"] = array("currency.*"); 
		$info["where"]   = "1 AND id='".$id."'";
	    $arr =  $db->select($info);
		
		return $arr[0]['code'];	
						
  }
  /*
    add transaction
  */	  
  function add_transaction($db,$arr)
  {
		$info['table']    = "transactions";
		$data['users_id']   = $arr['users_id'];
		$data['subject']   = $arr['subject'];
		$data['description']   = $arr['description'];
		$data['currency_id']   = $arr['currency_id'];
		$data['debit']   = $arr['debit'];
		$data['credit']   = $arr['credit'];
		$data['refference']   = $arr['refference'];
		$data['date_time_created']   = $arr['date_time_created'];
		//$info['debug']     = true;
		$info['data']     =  $data;
			 $db->insert($info);
		
  }
  
/*
 get_total_deposits
*/
function get_total_deposits($db,$users_id)
{
	$info["table"] = "deposits";
	$info["fields"] = array("sum(deposits.amount) as total"); 
	if($users_id>0)
	{
		$info["where"]   = "1  AND users_id='".$users_id."'";
	}
	else if($users_id=='all')
	{
	  	$info["where"]   = "1";	
	}
	$arr =  $db->select($info);
    if(empty($arr[0]['total']))
	{
		return 0.0;
	}
    return $arr[0]['total']; 	
}

/*
 get_total_loans
*/
function get_total_loans($db,$users_id)
{
	$info["table"] = "loans";
	$info["fields"] = array("sum(loans.credit-loans.debit) as total"); 
	if($users_id>0)
	{
		$info["where"]   = "1  AND users_id='".$users_id."'";
	}
	else if($users_id=='all')
	{
	  	$info["where"]   = "1";	
	}
	$arr =  $db->select($info);
    if(empty($arr[0]['total']))
	{
		return 0.0;
	}
    return $arr[0]['total']; 	
}
/*
 get_total_credited_loans
*/
function get_total_credited_loans($db,$users_id)
{
	$info["table"] = "loans";
	$info["fields"] = array("sum(loans.credit) as total"); 
	if($users_id>0)
	{
		$info["where"]   = "1  AND users_id='".$users_id."'";
	}
	else if($users_id=='all')
	{
	  	$info["where"]   = "1";	
	}
	$arr =  $db->select($info);
    if(empty($arr[0]['total']))
	{
		return 0.0;
	}
    return $arr[0]['total']; 	
}
/*
 get_total_debitted_loans
*/
function get_total_debitted_loans($db,$users_id)
{
	$info["table"] = "loans";
	$info["fields"] = array("sum(loans.debit) as total"); 
	if($users_id>0)
	{
		$info["where"]   = "1  AND users_id='".$users_id."'";
	}
	else if($users_id=='all')
	{
	  	$info["where"]   = "1";	
	}
	$arr =  $db->select($info);
    if(empty($arr[0]['total']))
	{
		return 0.0;
	}
    return $arr[0]['total']; 	
}




/*
  get_balance
*/
function get_balance($db,$users_id)  
{
	$info["table"] = "transactions";
	$info["fields"] = array("sum(transactions.credit-transactions.debit) as total"); 
	if($users_id>0)
	{
		$info["where"]   = "1  AND users_id='".$users_id."'";
	}
	else if($users_id=='all')
	{
	  	$info["where"]   = "1";	
	}
	$arr =  $db->select($info);
    if(empty($arr[0]['total']))
	{
		return 0.0;
	}
    return $arr[0]['total']; 	
}

/*
  get_transactions_credit
*/
function get_transactions_credit($db,$users_id)  
{
	$info["table"] = "transactions";
	$info["fields"] = array("sum(transactions.credit) as total"); 
	if($users_id>0)
	{
		$info["where"]   = "1  AND users_id='".$users_id."'";
	}
	else if($users_id=='all')
	{
	  	$info["where"]   = "1";	
	}
	$arr =  $db->select($info);
    if(empty($arr[0]['total']))
	{
		return 0.0;
	}
    return $arr[0]['total']; 	
}

/*
  get_transactions_debit
*/
function get_transactions_debit($db,$users_id)  
{
	$info["table"] = "transactions";
	$info["fields"] = array("sum(transactions.debit) as total"); 
	if($users_id>0)
	{
		$info["where"]   = "1  AND users_id='".$users_id."'";
	}
	else if($users_id=='all')
	{
	  	$info["where"]   = "1";	
	}
	$arr =  $db->select($info);
    if(empty($arr[0]['total']))
	{
		return 0.0;
	}
    return $arr[0]['total']; 	
}

/*
 transfer_funds
*/
function get_transfer_funds($db,$users_id)
{
	$info["table"] = "transfer_funds";
	$info["fields"] = array("sum(transfer_funds.amount) as total"); 
	if($users_id>0)
	{
		$info["where"]   = "1  AND from_users_id='".$users_id."'";
	}
	else if($users_id=='all')
	{
	  	$info["where"]   = "1";	
	}
	$arr =  $db->select($info);
    if(empty($arr[0]['total']))
	{
		return 0.0;
	}
    return $arr[0]['total']; 	
}

function get_signup_bonus($db)
{
	$info["table"] = "signup_bonus";
	$info["fields"] = array("signup_bonus.*"); 
	$info["where"]   = "1";
	$arr =  $db->select($info);
	
	return $arr[0]['bonus_amount'];

}

function get_total_withdraw($db,$users_id)  
{
	$info["table"] = "withdraw";
	$info["fields"] = array("sum(withdraw.amount) as total"); 
	if($users_id>0)
	{
		$info["where"]   = "1  AND users_id='".$users_id."'";
	}
	else if($users_id=='all')
	{
	  	$info["where"]   = "1";	
	}
	$arr =  $db->select($info);
    if(empty($arr[0]['total']))
	{
		return 0.0;
	}
    return $arr[0]['total']; 	
}
?>































