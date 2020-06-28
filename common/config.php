<?php 

   $host     = "localhost"; 
   $database = "soveign_money";
   $user     = "root";
   $password = "secret";
   
   $db  = new Db($host,$user,$password,$database);
   
   $GLOBALS['DB'] = $db;

?>
