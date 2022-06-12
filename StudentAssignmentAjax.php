<?php
session_start();

if(!(isset($_SESSION['StudentId'])))
{
    header("location:studentlogin.php");
}

$link = mysqli_connect('localhost','root','','csedeptdb');

extract($_REQUEST);

if(isset($sub))
{
    $qry = "select * from assignment where scode='$sub' order by ldate";
    $resultset = mysqli_query($link,$qry);

    $q = "select * from subject where code='$sub'"; 
    $result = mysqli_query($link,$q);
    $sn = mysqli_fetch_assoc($result);
    
    $str="<fieldset><legend class='h5 mb-4' align='center'>CSE $sn[semester]th SEM $sn[sname] Assignment</legend><div class='row justify-content-center'>";
    
    
    while($r = mysqli_fetch_assoc($resultset))
    {
        
        $date = date('d-M-Y',strtotime("$r[ldate]"));
        
        $card=<<<TEST
        <div class="col-lg-5 col-md-5">
        <div class="card mb-3">
            <div class='card-header'>
            <h5 class="card-title" align='center'> Assignment id : $r[aid] </h5>
            </div>
            <div class="card-body">
              <p class="card-text mb-2" align='right'>
                <small class="text-muted">Last date : $date </small>
              </p>
              <pre class="card-text">$r[description]</pre>
            </div>
            <div class='card-footer'>
            <a href='studentassignment.php?id=$r[aid]&code=$r[scode]' class='btn btn-block btn-success shadow' style='width: 100%;'>Submit Assignment</a>
            </div>
        </div>
        </div>
TEST;
        $str = $str.$card;
    }
    
    $str .="</div></fieldset>";
    
    echo $str;
}
mysqli_close($link);

?>