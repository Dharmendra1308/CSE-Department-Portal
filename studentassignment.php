<?php
session_start();

if(!(isset($_SESSION['StudentId'])))
{
    header("location:studentlogin.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>CSE Deparment Portal</title>

    <style type="text/css">
    	
    	.h1
    	{
    		size: 10px;
    		color: darkblue;
    		opacity: initial;
    		text-align: center;
    		padding-top: 0px;
    		padding-bottom: 0px;

    	}

    	.mydiv
    	{
        	background-color: lightcoral;
        	opacity: initial;
    	}

    </style>
    
    <script type="text/javascript">
        
        function AssignmentAjax()
        {
            var a = document.myform.sub.value;
            
            var strURL = "StudentAssignmentAjax.php?sub="+a;
            
            var xmlHttpObj = new XMLHttpRequest();
            
            if(xmlHttpObj)
            {
                xmlHttpObj.onreadystatechange = function()
                {
                    if(xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200)
                    {
                        document.getElementById('result').innerHTML = xmlHttpObj.responseText;
                    }
                }
                
                xmlHttpObj.open("GET",strURL,true);
                xmlHttpObj.send();
            }
            
        }
        
    </script>
    
</head>
<body class="bg-secondary bg-opacity-25">

	<!-- Header -->
	<header>
	<h1 class="h1"><b>COMPUTER SCIENCE DEPARMENT PORTEL</b></h1>
	</header>

	<!-- Navigation Bar -->    
	<nav class="nav navbar navbar-expand-lg bg-primary bg-opacity-75 navbar-dark sticky-top">

		<div class="container-fluid col-12 ">
		<span class="navbar-brand text-dark active"><img src="<?php echo $_SESSION['StudentProfile']; ?>" class="rounded-circle" height="30px" width='30px' alt=' ' />
        &nbsp; Welecome <b> <?php echo $_SESSION['StudentName']; ?> </b> &nbsp; &nbsp; </span>
		
		<button type="button" class="navbar-toggler" data-bs-toggle='collapse' data-bs-target='#menu'>
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="studentprofile.php" class="nav-link"><b>Profile</b></a></li>

				<li class="nav-item"><a href="studentattendence.php" class="nav-link"><b>Attendence</b></a></li>

				<li class="nav-item"><a href="#" class="nav-link active"><b>Assignment</b></a></li>

				<li class="nav-item"><a href="studentnotice.php" class="nav-link"><b>Notice</b></a></li>
				
				<li class="nav-item"><a href="studentsyllabus.php" class="nav-link"><b>Syllabus</b></a></li>
				
				<li class="nav-item"><a href="studenttimetable.php" class="nav-link"><b>Time Table</b></a></li>
				
				<li class="nav-item"><a href="studentlogout.php" class="nav-link"><b>Logout</b></a></li>
			</ul>
		</div>
		
		</div>
	</nav>

<br/>


<!-- View Assignment -->

<form action="#" name="myform" method="post" enctype="multipart/form-data">

<div class="container">
    <fieldset >
        <legend align="center">Assignment</legend>
		<table class="table" border="2px" align="center" cellpadding="4px" style="width: 50%;">

			<tr align="center">
				<th>Choose Semester :&nbsp;</th>
                <th>
                    	
<?php

    $str=<<<TEST
        <select name='sub' onchange="AssignmentAjax()" style='width: 65%;'>
        <option disabled="true" selected="true">~~ Select Subject ~~</option>
TEST;

    $sem = $_SESSION['StudentSemester'];

    $link = mysqli_connect('localhost','root','','csedeptdb');
    $qry = "select * from subject where semester=$sem";
    $resultset = mysqli_query($link,$qry);

    while($r = mysqli_fetch_assoc($resultset))
    {
        $str .= "<option value='$r[code]'> $r[sname] </option>";
    }

    $str .= "</select>";
    
    echo $str;

?>
				</th>	
			</tr>
		</table>
	</fieldset>


<div class="container-fluid" id="result"></div>

<?php
 
 extract($_REQUEST);
 
 if(isset($id) and isset($code))
 {
    $q="select * from subject where code='$code'";
    $result = mysqli_query($link,$q);
    $r = mysqli_fetch_assoc($result); 
    
    $q1="select * from assignment where aid=$id and scode='$code'";
    $result1 = mysqli_query($link,$q1);
    $r1 = mysqli_fetch_assoc($result1);
    
    $date = date('d-m-Y',strtotime("$r1[ldate]"));
    
    $str=<<<TEST
    <fieldset >
	<legend align="center" style='font-family: times;'> $r[sname] Assignment </legend>
	<table class="table" border="2px" align="center" cellpadding="4px" style="width: 65%;">
    <tr align='center'><th>Assignment Id : <span>$id</span></th><th>Last Date : <span>$date</span></th></tr>
    <tr><th colspan='2'>
    <h5 align='center' style='font-family: arial;'>Assignment Questions :</h5>
    <pre style='padding-left: 10px; font-family: courier;'>$r1[description] </pre>
    </th></tr>
    <tr align='center'><th colspan='2'>
    <lable for='Answer'>Answer</lable>
    <textarea id='Answer' name='ans' row='10' cols='100' required='true' style='height: 200px;'></textarea>
    </th></tr>
    <tr align='center'><th colspan='2'> 
    .pdf or .txt file related to Assignment Solution : &nbsp;
    <span><input type='file' name='Afile' accept='.pdf, .txt' /></span>
    </th></tr>
    <tr align='center'><th colspan='2'>
    <input type='submit' name='SubA' value='Submit Assignment' class='btn btn-block' style='background-color: #88B04B; width: 100%;' />
    </tr>
TEST;
    
    $str.="</table></fieldset>";
    
    echo $str;
 }

?>

</form>
</div>


<?php
extract($_REQUEST);

$rn = $_SESSION['StudentRollNo'];

if(isset($SubA))
{
    $q2 = "select * from submit_assignment where rollno='$rn' and aid=$id";
    $result2 = mysqli_query($link,$q2);
    $n = mysqli_num_rows($result2);
    
    if(!$n)
    {
        
        $q = "select * from assignment where aid=$id";
        $result = mysqli_query($link,$q);
        $r = mysqli_fetch_array($result);
        
        $x = (int)$r['stotal']; 
        $x = $x+1;
       
        $q1 = "select * from subject where code='$code'";
        $result1 = mysqli_query($link,$q1);
        $r1 = mysqli_fetch_array($result1);
        
        $a = $r1['sname'];
        
        $path = ImgPath($rn,$a,$id);
        
        $qry1 = "insert into submit_assignment values('$rn',$id,'$r[semester]','$code',curdate(),'$ans','$path')";
        $resultset1 = mysqli_query($link,$qry1);
        
        $qry2 = "update assignment set stotal=$x where aid=$id";
        $resultset2 = mysqli_query($link,$qry2);
        
        if($resultset1 and $resultset2)
        {
            echo "<script type='text/javascript'> alert('Assignment Submited Successfully'); window.location='studentassignment.php'; </script>";
        }
    }
    else
    {
        echo "<script type='text/javascript'> alert('Assignment Already Submited');</script>";
    }
    
    
    
}

function ImgPath($x,$y,$z)
{
    $file = $_FILES['Afile'];
    
    $type = explode('.',$file['name']);
    $len = count($type);
   	$ext = $type[$len-1];
    
   	if($file['error']==0)
   	{
  		$tempPath = $file['tmp_name'];
  		$finalPath = $_SERVER['DOCUMENT_ROOT'].'CSEDeparment/SubmitedAssignment/'.$x.$y.$z.'.'.$ext;
    
  		move_uploaded_file($tempPath,$finalPath);
    
  		return 'SubmitedAssignment/'.$x.$y.$z.'.'.$ext;
    
   	}
    else
    {
        return ' ';
    }
    	
}
    
?>




<br><br>

<!-- Footer -->
<?php include_once('footer.html'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>