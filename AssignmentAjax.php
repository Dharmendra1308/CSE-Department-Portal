<?php
session_start();

if(!(isset($_SESSION['FacultyId'])))
{
    header("location:facultylogin.php");
}

$link = mysqli_connect('localhost','root','','csedeptdb');

extract($_REQUEST);

if(isset($sem))
{
    $sem = (int) $sem;
    $id = $_SESSION['FacultyId'];
    
    $qry = "select * from subject where semester=$sem and facultyid='$id'";
    $resultset = mysqli_query($link,$qry);
    
    $n = mysqli_num_rows($resultset);
    
    $str =<<<TEST
    <th>Choose Subject :&nbsp;</th>
    <th><select name='sub' style='width: 75%;' onchange='AjaxAssignment()'>
    <option disabled="true" selected="true">~~ Select Subject ~~</option>
TEST;
    
    if($n)
    {
        while($r = mysqli_fetch_assoc($resultset))
        {
            $str .="<option value='$r[code]'>$r[sname]</option>";
        }
    }
    
    $str .="</th></select>";
    echo $str;
}


if(isset($sub))
{
    $qry = "select * from subject where code='$sub'";
    $resultset = mysqli_query($link,$qry);
    
    $r = mysqli_fetch_assoc($resultset);
    
    $str=<<<TEST
        <th colspan='2'>
            <lable for='assignment'> $r[sname] &nbsp; Questions : </lable>
            <textarea id='assignment' name='ques' rows='5' cols='100' style='width:90%;' required='true' >
            </textarea>
        </th>
TEST;
    
    echo $str;
}

mysqli_close($link);

?>