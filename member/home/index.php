<?php
    session_start();
   include("../../common/lib.php");
   include("../../lib/class.db.php");
   include("../../common/config.php");
   include("../../common_lib/common_lib.php");
   
   if(empty($_SESSION["users_id"]))
   {
       Header("Location: ../login/index.php");
   }
   
   $cmd = $_REQUEST['cmd'];
   
   switch($cmd)
   {
	   
	  //Invitation by email
           /* case 'invite_by_email':
                if ($_REQUEST['users_id']) {
                    if (get_session($db, $_REQUEST['users_id']) != $_REQUEST['session_id']) {
                        break;
                    }
                } else {
                    break;
                }
                $subject = "others.work Invitation ";
                $body = "Dear Sir,<br/>
                        You've invite from others.work to create an account FREE and earn money.<br/> <br/>
                        To create account please click <a href='http://yuhu.life/app/refferer.html?refferer_id=" . $_REQUEST['users_id'] . "&email=" . $_REQUEST['email'] . "'>here</a>
                        <br/><br/>";

                $mailto = $_REQUEST['email'];
                //Send Email
                sendMail($mailto, $subject, $body);

                echo json_encode(array('status' => 'success', 'msg' => "You've successfully send invitation by email."));
                break;

            //affiliate reffer info save
            case 'reffer':
                $userInfo = get_user_info($db, $_REQUEST['refferer']);
                $info = array();
                $data = array();
                $info['table'] = "affiliate";
                $data['who_invite'] = $userInfo[0]['email'];
                $data['whome_envite'] = $_REQUEST['email'];
                $data['who_invite_users_id'] = $_REQUEST['refferer'];
                $data['created'] = date("Y-m-d H:i:s");
                $info['data'] = $data;
                $db->insert($info);

                echo json_encode(array('status' => 'success'));
                break;*/
			case "invite_by_email":	
			       unset($info);
				   unset($data);
			    $info["table"] = "invite_friends";
				$info["fields"] = array("invite_friends.*"); 
				$info["where"]   = "1  AND invited_email='".$_REQUEST['invited_email']."'";
				$arr =  $db->select($info);
				if(count($arr)>0)
				 {
					 echo json_encode(array('status'=>'success','msg'=>'Invitation already has been sent to this email'));
					 break;
				 }
				 
				   unset($info);
				   unset($data);
				$info["table"] = "users";
				$info["fields"] = array("users.*"); 
				$info["where"]   = "1  AND users.email='".$_REQUEST['invited_email']."'";
				$arr =  $db->select($info);
				if(count($arr)>0)
				 {
					 echo json_encode(array('status'=>'success','msg'=>'This email already is registered with us'));
					 break;
				 }
				 			
			       unset($info);
				   unset($data);
				$info['table']    = "invite_friends";
				$data['from_users_id']   = $_SESSION['users_id'];
                $data['invited_email']   = $_REQUEST['invited_email'];
                $data['sending_date_time']   = date("Y-m-d H:i:s");//$_REQUEST['sending_date_time'];
                //$data['joining_date_time']   = $_REQUEST['joining_date_time'];
                $data['joining_status']   = 'pending';//$_REQUEST['joining_status'];
				$info['data']     =  $data;
				$status = $db->insert($info);
				
				if($status==true)
				 {
					 
					$userinfo = get_users_info($db,$_SESSION['users_id']);
					 //////////////////////////send email/////////////////////
					//send email to sender
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
					// Additional headers
					//$headers .= 'To: '.$data['email'].'' . "\r\n";
					$headers .= 'From: Sovereign Money <'.$_REQUEST['invited_email'].'>' . "\r\n";
					//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
					//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
					
					// Mail it
					$subject = "Invitation from Sovereign Money"; 
					$message_body  = "Dear Valued Customer,<br>
						".$userinfo[0]['first_name']." ".$userinfo[0]['last_name']." has been sent you a joining invitation.
						Join with Sovereign Money and win $10 Bonus.<br>
						<a href=\"http://sovereign.money/member/login/\">Join</a><br>
						Thank You <br>
						Sovereign Money";
					mail($_REQUEST['invited_email'], $subject, $message_body, $headers); 
					 
					 
					echo json_encode(array('status'=>'success','msg'=>'Invitation has been sent successfully'));
				 }
              break;
      default:
	       include("home_view.php");
			
   }
?>