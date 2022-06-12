<?php

session_start();

if(!(isset($_SESSION['AdminId'])))
{
    header("location:adminlogin.php");
}

$link = mysqli_connect('localhost','root','','csedeptdb');

extract($_GET);

$sem = (int)$sem;

$qry = "select * from student where semester=$sem and batch='$batch'";
$resultset = mysqli_query($link,$qry);

$n = mysqli_num_rows($resultset);


if($n)
{
    echo "<div class='h3 text-success mb-3' style='font-weight:bold; text-align:center;'>CSE Batch : $batch ".$sem."th Semester Student List.</div>";
    
    $str=<<<TEST
    <table class='bg-secondary bg-opacity-25 shadow table table-bordered mb-4' align='center' cellpading='4px' >
    <tr align='center'><th>ID</th><th>Roll No.</th><th>Name</th><th>Mail</th><th>Mobile</th><th>Adhar</th><th>Remove</th></tr>
TEST;

    while($r=mysqli_fetch_array($resultset))
    {
        $str.="<tr align='center'><td>$r[id]</td><td>$r[rollno]</td><td>$r[name]</td><td>$r[mail]</td><td>$r[mobile]</td><td>$r[adhar]</td><td><a href='adminviewstudent.php?id=$r[id]&rn=$r[rollno]' class='btn text-danger' style='font-family:Constantia;' onclick='return fun()' >Remove</a></td></tr>";
    }

    $str .="</table>";
    
    echo $str;
}
else
{
    echo "<div class='h3 text-danger' style='font-weight:bold; text-align:center;'>CSE $batch ".$sem."th semester Students not Exist.</div>";
}
    
    mysqli_close($link);
?>