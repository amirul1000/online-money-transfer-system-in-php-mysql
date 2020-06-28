<?php
	session_start();
	ob_start();
	include("../../common/lib.php");
	include("../../lib/class.db.php");
	include("../../common/config.php");
    include("../../common_lib/common_lib.php");

	
	$cmd = $_REQUEST['cmd'];
	
	switch($cmd)
	{
	
		case "login":
			$info["table"]     = "users";
			$info["fields"]   = array("*");
			$info["where"]    = " 1=1 AND email  LIKE BINARY '".clean($db,$_REQUEST["email"])."' AND password  LIKE BINARY '".clean($db,$_REQUEST["password"])."'";			
			$res  = $db->select($info);
			if(count($res)>0)
			{
				$_SESSION["users_id"]   = $res[0]["id"];
				$_SESSION["email"]      = $res[0]["email"];
				$_SESSION["first_name"] = $res[0]["first_name"];
				$_SESSION["last_name"]  = $res[0]["last_name"];
				$_SESSION["user_type"]       = $res[0]["user_type"];
				$_SESSION["is_merchant"]    = $res[0]["is_merchant"];
				$_SESSION['file_picture']   = $res[0]["file_picture"];
				
				Header("Location: ../home/index.php");
			}
			else
			{
				$message="Login fail,Please verify your userid or password";
				include("login_editor.php");
			}
			break;
		case "register_view":	
			   include("register_editor.php");
			   break;
		case "register":	
				$first_name = trim($_REQUEST["first_name"]);
				$last_name = trim($_REQUEST["last_name"]);
				$email = trim($_REQUEST["email"]);
				$password = trim($_REQUEST["password"]);
				$user_type = 'client';
				
					unset($info);
					unset($data);
				$info["table"] = "users";
				$info["fields"] = array("users.*"); 
				$info["where"]   = "1 AND  email='".$email."'";	
				$res =  $db->select($info);
				
				if(count($res)==0)
				{
					
					/////////////invite freinds bonus//////////
					 unset($info);
				     unset($data);
					$info["table"] = "invite_friends";
					$info["fields"] = array("invite_friends.*"); 
					$info["where"]   = "1  AND invited_email='".$email."'";
					$arr =  $db->select($info);
					if(count($arr)>0)
					 {
						$Id               = $arr[0]['id']; 
						$from_users_id    = $arr[0]['from_users_id'];
						/*$invited_email    = $res[0]['invited_email'];
						$sending_date_time    = $res[0]['sending_date_time'];
						$joining_date_time    = $res[0]['joining_date_time'];
						$joining_status    = $res[0]['joining_status']; */
						
						////////////////////update invite freinds/////////////////
						  unset($info);
						  unset($data);
						$info['table']    = "invite_friends";
						$data['joining_date_time']   = date("Y-m-d H:i:s");
						$data['joining_status']   = 'completed';
						$info['data']     =  $data;
						$info['where'] = "id=".$Id;
						//$info['debug']     = true;
						$db->update($info);
						//////////////////////////////////////////////////////////
						
							unset($arr);
						$arr['users_id']= $from_users_id;
						$arr['subject']= 'Invite freinds,earn $10 worth of coins';
						$arr['description']= 'Invite freinds,earn $10 worth of coins';
						$arr['currency_id']= get_currency_id($db,'USD');
						$arr['debit'] = 0.0;
						$arr['credit'] = 10;
						$arr['refference']= 'Invite freinds,earn $10 worth of coins';
						$arr['date_time_created']   = date("Y-m-d H:i:s");
						//$info['debug']     = true;
						add_transaction($db,$arr);
						
						//send email to earner
						$userinfo = get_users_info($db,$from_users_id);
						
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						
						// Additional headers
						//$headers .= 'To: '.$data['email'].'' . "\r\n";
						$headers .= 'From: Sovereign Money <'.$userinfo[0]['email'].'>' . "\r\n";
						//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
						//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
						
						// Mail it
						$subject = "Invite freinds earning"; 
						$message_body  = "Dear ".$userinfo[0]['first_name']." ".$userinfo[0]['last_name'].",<br>
							You win  a Invite freinds earning $10<br>
							Thank You <br>
							Sovereign Money";
						mail($userinfo[0]['email'], $subject, $message_body, $headers); 
					 }					
					/////////////////////////////////////////////////
					
					   unset($info);
					   unset($data);
					$info['table']    = "users";
					$data['first_name']   = $first_name;
					$data['last_name']   = $last_name;
					$data['email']   = $email;
					$data['password']   = $password;
					$data['user_type']   = $user_type;
					$info['data']     =  $data;
					 $db->insert($info);
					$users_id = $db->lastInsert($result); 
					 
					 //signup bosnus
					 $bonus_amount = get_signup_bonus($db);
					 	 unset($arr);
					$arr['users_id']= $users_id;
					$arr['subject']= 'Signup bonus';
					$arr['description']= 'Signup bonus';
					$arr['currency_id']= get_currency_id($db,'USD');
					$arr['debit'] = 0.0;
					$arr['credit'] = $bonus_amount;
					$arr['refference']= 'Signup bonus';
					$arr['date_time_created']   = date("Y-m-d H:i:s");
					//$info['debug']     = true;
					add_transaction($db,$arr);
					
					
					//////////////////////////send email/////////////////////
					//send email to sender
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					// Additional headers
					//$headers .= 'To: '.$data['email'].'' . "\r\n";
					$headers .= 'From: Sovereign Money <'.$email.'>' . "\r\n";
					//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
					//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
					
					// Mail it
					$subject = "Sign up Bonus ".$bonus_amount; 
					$message_body  = "Dear ".$first_name." ".$last_name.",<br>
						You win  a sign up Bonus ".$code." ".$bonus_amount.".<br>
						Thank You <br>
						Sovereign Money";
					mail($email, $subject, $message_body, $headers); 

					 
					$message = "Registration has been completed successfully";	  	
				}
				else
				{
				 	$message = "Error-Duplicate username";
				}	
		
		
			   include("register_editor.php");
			   break;
		case "logout":
			session_destroy();
			unset($_SESSION["users_id"]);
			unset($_SESSION["email"]);
			unset($_SESSION["first_name"]);
			unset($_SESSION["last_name"]);
			unset($_SESSION["user_type"]);
	
			Header("Location:../../");
			break;
		case "forget_editor":
			include("forget_editor.php");
			break;
		case "forget_pass":
		      $info["table"]     = "users";
				$info["fields"]   = array("*");
				$info["where"]    = " 1=1 AND email  LIKE BINARY '".$_REQUEST["email"]."'";
				$res  = $db->select($info);
				if(count($res)>0)
				{
					$first_name    = $res[0]["first_name"];
					$last_name     = $res[0]["last_name"];
					$email         = $res[0]["email"];
					$password      = $res[0]["password"];
					
					$subject = "Recovery Password from contractortrackerapp";
					
					$body = "Dear $first_name $last_name,<br>
							Your Login information is like below:<br> 
							 Email:$email<br> 
							 password:$password<br><br>
							 
							 Thanks,<br>
							 Contractortrackerapp Team";
					//send email
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: contractortrackerapp <info@contractortrackerapp.com>' . "\r\n";
						
					mail($_REQUEST["email"], $subject, $body, $headers);
					$message ="An email has been sent to your E-mail address";	
				}
				else
				{
				   $message = "No email is found with this address";	
				}
				include("forget_editor.php");
				break;
		default :
			include("login_editor.php");
	}
	/*
	  check user plan exits
	*/
	function clean($db,$str) {
				$str = @trim($str);
				if(get_magic_quotes_gpc()) {
					$str = stripslashes($str);
				}
				$str = stripslashes($str);
				$str = str_replace("'","",$str);
				$str = str_replace('"',"",$str);
				//$str = str_replace("-","",$str);
				$str = str_replace(";","",$str);
				$str = str_replace("or 1","",$str);
				$str = str_replace("drop","",$str);
				
				return mysqli_real_escape_string($db->linkid,$str);
		}		
?>