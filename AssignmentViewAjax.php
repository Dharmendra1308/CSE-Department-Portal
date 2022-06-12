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
    $qry = "select * from assignment where scode='$sub' order by ldate asc";
    $resultset = mysqli_query($link,$qry);
    
    $q = "select * from subject where code='$sub'";
    $result = mysqli_query($link,$q);
    
    $subject = mysqli_fetch_array($result);
    
    $str=<<<TEST
    <fieldset>
    <legend align='center'>$subject[name] Assignment</legend>
    <table class="table" border="2px" align="center" cellpadding="4px" style="width: 55%;">
    <tr align='center'><th>Id</th><th>Last Date</th><th>Total Submission</th><th>View Submission</th></tr>
TEST;

    while($r = mysqli_fetch_assoc($resultset))
    {
        $date = date('d-m-Y',strtotime("$r[ldate]"));
        $str.="<tr align='center'><th>$r[aid]</th><td>$date</td><th>$r[stotal]</th><td><a href='facultyviewassignment.php?id=$r[aid]&total=$r[stotal]' class='btn text-sucess'>View</a></td></tr>";
    }
    
    $str.="</table></fieldset>";
    
    echo $str;
}

mysqli_close($link);

?>