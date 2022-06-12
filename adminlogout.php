<?php

session_start();

if (isset($_SESSION['AdminId'])) 
{
	session_destroy();
	header("location:adminlogin.php");	
}

?>