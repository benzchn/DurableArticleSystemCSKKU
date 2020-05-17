<?php  
 //logout.php  
 session_start();
 unset($_SESSSION['user_name']); // clear session
// unset($_SESSION['pwd']);
 session_destroy();  
 header("location:../index.php");  
 ?>  