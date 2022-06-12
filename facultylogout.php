<?php

session_start();

if(isset($_SESSION['FacultyId']))
{
	session_destroy();
    header("location:facultylogin.php");
}

?>