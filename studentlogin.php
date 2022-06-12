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

<form action="#" method="post">

	<!-- Header -->
	<header>
	<h1 class="h1"><b>COMPUTER SCIENCE DEPARMENT PORTEL</b></h1>
	</header>

	<!-- Navigation Bar -->
	<nav class="nav navbar navbar-expand-lg bg-primary bg-opacity-75 navbar-dark sticky-top">

		<div class="container-fluid col-12 ">
		<span class="navbar-brand text-dark"><img src="images/mbm.png" height="30px" />
		<b> &nbsp; Computer Science Deparment &nbsp; &nbsp; </b></span>
		
		<button type="button" class="navbar-toggler" data-bs-toggle='collapse' data-bs-target='#menu'>
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav">
				
				<li class="nav-item"><a href="landingpage.php" class="nav-link"><b>Home</b></a></li>
				
				<li class="nav-item"><a href="notice.php" class="nav-link"><b>Notice</b></a></li>
				
				<li class="nav-item"><a href="faculty.php" class="nav-link"><b>Faculty</b></a></li>
				
				<li class="nav-item"><a href="syllabus.php" class="nav-link"><b>Syllabus</b></a></li>
				
				<li class="nav-item"><a href="timetable.php" class="nav-link"><b>Time Table</b></a></li>
				
				<li class="nav-item">
					<a href="https://www.jnvuiums.in/(S(z3t5leeoeautoqvse243ansv))/main.aspx" class="nav-link" target="_blank"><b>University Website</b></a>
				</li>
				
				<li class="nav-item"><a href="https://mbmalumni.org/" class="nav-link" target="_blank"><b>Alumni Page</b></a></li>
				
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<b>Student</b>
					</a>
					
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            			<li><a class="dropdown-item" href="adminlogin.php">Admin</a></li>
            			<li><a class="dropdown-item" href="facultylogin.php">Faculty</a></li>
			            <li><a class="dropdown-item active disabled" href="studentlogin.php">Student</a></li>
          			</ul>
				</li>
			</ul>
		</div>
		
		</div>
	</nav>

<br/>


<div class="container-fluid text-danger mb-4 d-flex justify-content-center">
	<b class="h3"> Please fill the <i class="text-success"> Student </i> RollNo. , Password and Passout Year. </b>
</div>


<!-- Student Login -->
<div class="container-fluid">
	<div class='container p-3 mx-auto'>
		
		<div class="h1 text-primary d-flex justify-content-center mb-4"> FOR STUDENT </div>
		
		<div class="row justify-content-center mb-2">
		
		<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-4">
			<b>Enter User Id : &nbsp;</b>
		</div>
		<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-4">
			<input type="text" name="uid" placeholder="Enter Roll Number" maxlength="10" required="true">
		</div>
		
		</div>

		<div class="row justify-content-center mb-2">
		
		<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-4">
			<b>Enter Password : &nbsp;</b>
		</div>
		<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-4">
			<input type="password" name="pwd" placeholder="Enter Password" required="true">
		</div>
		
		</div>

		<div class="row justify-content-center mb-3">
		
		<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-4">
			<b>Enter Passout Year : &nbsp;</b>
		</div>
		<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-4">
			<input type="tel" name="yr" placeholder="Enter Passout Year" maxlength="4" required="true" min="2022">
		</div>
		
		</div>

		<center>
		<input type="submit" name="login" value="Login" class="btn btn-block btn-warning rounded-pill mb-3" style="width:50%;" />
		</center>

	</div>
</div>

</form>

<br>

<div class="container-fluid">
<?php
extract($_POST);

if(isset($login))
{
    $link = mysqli_connect('localhost','root','','csedeptdb');
    
    $qry = "select * from student where rollno='$uid' and password='$pwd' and batch='$yr'";
    
    $resultset = mysqli_query($link,$qry);
    
    $nr = mysqli_num_rows($resultset);
    
    if($nr)
    {

        $r = mysqli_fetch_assoc($resultset);

        session_start();
        
        $_SESSION['StudentId']=$r[id];
        $_SESSION['StudentRollNo']=$r[rollno];
        $_SESSION['StudentName']=$r[name];
        $_SESSION['StudentProfile']=$r[profile];
        $_SESSION['StudentSemester']=$r[semester];
        
        header("location:studentlanding.php");
    }
    else
    {
        echo "<center class='text-gray-dark h5'>Student Not found Please Enter valid Details</center>";
    }
    
    mysqli_close($link);
    
}

?>

</div>

<br/><br/>


	<div class="container-fluid text-danger">
		<marquee onmouseout="start();" onmouseover="stop();" behavior="scroll" scrollamount="5">
			<b>Note :- The CSE department will be open from 08:00 AM to 05:00 PM in working Days.
					For Any query to mail on departmental mail.
			</b> &nbsp; 
				
			<a href="mailto:cse.mbm@jnvu.edu.in" target="_blank" class="text-success"> cse.mbm@jnvu.edu.in
			</a>
		</marquee>
	</div>

<!-- Footer -->
<?php include_once('footer.html'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>