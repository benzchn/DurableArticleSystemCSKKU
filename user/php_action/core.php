<?php 

if (!session_id()) session_start();

require_once 'db_connect.php';

// echo $_SESSION['userId'];

if(!$_SESSION['user_name']) {
	header('location: index.php');	
} 
?>