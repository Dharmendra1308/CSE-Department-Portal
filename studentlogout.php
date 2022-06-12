<?php

session_start();

if(isset($_SESSION['StudentId']))
{
	session_destroy();
	header("location:studentlogin.php");
}

?>