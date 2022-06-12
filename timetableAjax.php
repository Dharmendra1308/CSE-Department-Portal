<?php

extract($_GET);

echo "<br/ ><center><h3>CSE ".$sem." Sem Time Table</h3></center><br />";
    
$sem = (integer) $sem;
    
$link = mysqli_connect('localhost','root','','csedeptdb');
    
$qry = "select * from student_timetable where Semester=$sem";
    
$resultset = mysqli_query($link,$qry);
    
$str=<<<TEST
        <table class='bg-secondary bg-opacity-25 table table-bordered' align='center' cellpading='4px'>
        <tr align='center'><th>Period</th><th>MonDay</th><th>TuesDay</th><th>WednesDay</th><th>ThursDay</th><th>Friday</th><th>SaturDay</th></tr>
TEST;

while($r = mysqli_fetch_array($resultset))
{
    $str .="<tr align='center'><th>$r[1]</td>";
    for($i = 2; $i<8; $i++)
    {
        $qry1 = "select * from subject where code='$r[$i]'";
        $resultset1 = mysqli_query($link,$qry1);
        
        $code = mysqli_fetch_row($resultset1);
        
        $str .="<td><b> $code[2] </b><br />";
        
        $code[4] = (int)$code[4];
        
        $qry2 = "select * from faculty where id=$code[4]";
        $resultset2 = mysqli_query($link,$qry2);
        
        $name = mysqli_fetch_row($resultset2);
        
        $str .="<i> $name[1] </i></td>";
    }
    $str .="</tr>";
}
    
$str .="</table>";
    
echo $str;
    
mysqli_close($link);

?>