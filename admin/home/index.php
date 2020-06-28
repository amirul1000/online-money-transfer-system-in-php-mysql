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
	  case "select_users":
			$_SESSION['selected_users_id'] = $_REQUEST['selected_users_id'];
			Header("Location:../home");
	       break;  
      default:
	       include("home_view.php");
			
   }
?>