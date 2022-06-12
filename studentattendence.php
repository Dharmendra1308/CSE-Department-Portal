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
    
</head>
<body class="bg-secondary bg-opacity-25">

<form action="#" method="post" name="myform">

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

				<li class="nav-item"><a href="#" class="nav-link active"><b>Attendence</b></a></li>

				<li class="nav-item"><a href="studentassignment.php" class="nav-link"><b>Assignment</b></a></li>

				<li class="nav-item"><a href="studentnotice.php" class="nav-link"><b>Notice</b></a></li>
				
				<li class="nav-item"><a href="studentsyllabus.php" class="nav-link"><b>Syllabus</b></a></li>
				
				<li class="nav-item"><a href="studenttimetable.php" class="nav-link"><b>Time Table</b></a></li>
				
				<li class="nav-item"><a href="studentlogout.php" class="nav-link"><b>Logout</b></a></li>
			</ul>
		</div>
		
		</div>
	</nav>

<br/>


<!-- View Attendence -->
<div class="container-fluid">
	<div class="row p-4 justify-content-center">
        <div class="col-4">
            <b class="h4">Choose Date : </b>
            <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>" />
        </div> 

    </div>  
         
    <div class="row mb-5 p-4 justify-content-center">
			<input type="submit" name="next" value="Next" class="btn btn-block btn-primary shadow p-0" style='width:20%;' >
	</div>

</form>

<?php

extract($_POST);
           
if(isset($next) && $date)
{   
    $ssem = $_SESSION['StudentSemester'];
    $srollno = $_SESSION['StudentRollNo'];
    $sname = $_SESSION['StudentName'];
    
    $link = mysqli_connect('localhost','root','','csedeptdb');
    
    $qry = "select * from absenttable where doc='$date' and semester=$ssem";
    $result = mysqli_query($link,$qry);
    $n = mysqli_num_rows($result);
    
    if($n)
    {
        echo "<center><b class='h3 text-success'>Hello $sname , Your CSE $ssem Semester Attandance : ".date('d-m-Y',strtotime($date))." </b></center><br />";
        
        $q1 = "select * from absentstudent where rollno='$srollno' and doc='$date' and semester=$ssem";
        $result1 = mysqli_query($link,$q1);
    	    	
       	$r = mysqli_fetch_array($result1);
        $rn = mysqli_num_rows($result1);
            
        $str= <<<TEST
        <table class='bg-secondary bg-opacity-50 table table-bordered mb-4' align='center' style='width: 75%;' cellpading='4px'>
        <tr align='center'><th>Roll Number</th><th>Name</th><th>Status</th></tr>
TEST;
        if($rn)
        {
            $str .= "<tr align='center'><th> $srollno </th><th> $sname </th><th><font class='text-danger'>Absent</font></th></tr>";
        }
        else
        {
            $str .= "<tr align='center'><th> $srollno </th><th> $sname </th><th><font class='text-success'>Present</font></th></tr>";
        }
        
        $str .= "</table>";
                
        echo $str;
                
        mysqli_close($link);
        
    }
    else
    {
        echo "<center class='h3 text-danger'>CSE $ssem semester : Attendence Not marked. ".date('d-m-Y',strtotime($date))."</center>";
    }
}
else
{
    echo "<br><center class='text-danger h5'>Please Select Date and Press button</center>";
}

?>

</div>


<br><br>

<!-- Footer -->
<?php include_once('fixedfooter.html'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>