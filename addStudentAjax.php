<?php
extract($_GET);

session_start();

if(!(isset($_SESSION['AdminId'])))
{
    header("location:adminlogin.php");
}

$id = $_SESSION['NewStudentId']; 

$str = $batch."CSE".$id;

echo $str;

?>