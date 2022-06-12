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

        // $str .="<td><b> $code[2] </b><br />";


$str .=<<<XYZ
<td>
<center>
<select name="sub" class="shadow p-1 mb-3">
<option disabled="true" selected="true"> Select Subject </option>
XYZ;
     
        $qry1 = "select * from subject where semester=$sem";
        $resultset1 = mysqli_query($link,$qry1);   

        while ($code = mysqli_fetch_row($resultset1)) {
            // code...
            $str .= "<option value='$code[1]'> $code[2] </option>";
        }

$str .=<<<XYZ
</select></center>

<center>
<select name="fid" class="shadow p-1 mb-3">
<option disabled="true" selected="true"> Select Faculty </option>
XYZ;
        
        $qry2 = "select * from faculty where id>1000";
        $resultset2 = mysqli_query($link,$qry2);

        while ($name = mysqli_fetch_row($resultset2)) {
            // code...
            $str .= "<option value='$name[0]'> $name[1] </option>";
        }


    }
    $str .="</select></center> </td></tr>";
}
    
$str .="</table>";
    
echo $str;
    
mysqli_close($link);

?>