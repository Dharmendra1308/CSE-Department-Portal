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

<form action="login.php" method="post">


	<!-- Header -->
	<header>
	<h1 class="h1"><b>COMPUTER SCIENCE DEPARMENT PORTEL</b></h1>
	</header>

	<!-- Navigation Bar -->
	<nav class="nav navbar navbar-expand-lg bg-primary navbar-dark sticky-top">

		<div class="container-fluid col-12 ">
		<span class="navbar-brand text-dark"><img src="images/mbm.png" height="30px" />
		<b> &nbsp; Computer Science Deparment &nbsp; &nbsp; </b></span>
		
		<button type="button" class="navbar-toggler" data-bs-toggle='collapse' data-bs-target='#menu'>
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="landingpage.html" class="nav-link"><b>Home</b></a></li>
				<li class="nav-item"><a href="notice.php" class="nav-link"><b>Notice</b></a></li>
				<li class="nav-item"><a href="faculty.php" class="nav-link"><b>Faculty</b></a></li>
				<li class="nav-item"><a href="syllabus.php" class="nav-link"><b>Syllabus</b></a></li>
				<li class="nav-item"><a href="#" class="nav-link"><b>Time Table</b></a></li>
				<li class="nav-item">
					<a href="https://www.jnvuiums.in/(S(z3t5leeoeautoqvse243ansv))/main.aspx" class="nav-link" target="_blank"><b>University Website</b></a>
				</li>
				<li class="nav-item"><a href="https://mbmalumni.org/" class="nav-link" target="_blank"><b>Alumni Page</b></a></li>
				<li class="nav-item">
					<a href="login.php" class="nav-link active"><b>Login</b></a>
				</li>
			</ul>
		</div>
		
		</div>
	</nav>


	<div class="container-fluid text-danger">
		<marquee onmouseout="start();" onmouseover="stop();" behavior="scroll" scrollamount="5">
			<b>Note :- The CSE department will be open from 08:00 AM to 05:00 PM in working Days.
				For Any query to mail on departmental mail.
			</b> &nbsp; 
			
			<a href="mailto:cse.mbm@jnvu.edu.in" target="_blank" class="text-success"> cse.mbm@jnvu.edu.in
			</a>
		</marquee>
	</div>

<br>


<!-- Login -->
<div class="container">

	<div class='container bg-primary bg-opacity-10 shadow p-3 mb-4'>
	<br>
	<center>
		<h3 class="text-success"> LOGIN USER </h3>
		<br>
	<div class="row mx-auto d-block">

	<span class="col-lg-4 col-md-4 col-sm-4">
	<input type="radio" name="r1" value='admin'><b class="text-dark"> Admin</b>
	</span>
	
	<span class="col-lg-4 col-md-4 col-sm-4">
	<input type="radio" name="r1" value='faculty'><b class="text-dark"> Faculty</b>
	</span>
	
	<span class="col-lg-4 col-md-4 col-sm-4">
	<input type="radio" name="r1" value='student'><b class="text-dark"> Student</b>
	</span>
	
	</div>
	
	<br><br>
	
	<input type="submit" name="next" value="Next" class="btn btn-block btn-warning shadow p-1 mb-5 rounded-pill" style="width:50%;" />
	</center>

	</div>
</div>

</form>

<div class="container">
<?php
extract($_POST);

if(isset($next) and !empty($r1))
{
    
    if($r1 == 'admin')
    {
        header('location:adminlogin.php');
    }
    else if($r1 == 'faculty')
    {
        echo "Faculty Here ...";
    }
    else if($r1 == 'student')
    {
        echo "Student Here ...";
    }
}
else
echo "<center class='text-danger h5'>Please Select one option</center>";

?>
</div>


<br><br>


	<!-- Footer -->
	<footer>
	<div class="container-fluid mydiv">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<br> &nbsp; &nbsp; &nbsp; &nbsp; <b> MBM Engineering College,Jodhpur (RAJASTHAN)</b><br>
			&nbsp; &nbsp; &nbsp; &nbsp; <b><i> Computer Science Deparment Portel </i></b><br>
			&nbsp; &nbsp; &nbsp; &nbsp; &copy;<i>2021 All Right resurverd</i>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				
				<br><b>Follow US</b><br>

				<a href="https://www.facebook.com/M.B.M.EngineeringCollegeJodhpur/" target="_blank">
					<i class="fa fa-facebook-square fa-2x"></i></a>
				&nbsp;&nbsp;&nbsp;
				<a href="#" target="_blank">
					<i class="fa fa-twitter-square fa-2x"></i></a>
				&nbsp;&nbsp;&nbsp;
				<a href="https://www.instagram.com/mbmjodhpur_official/" target="_blank">
					<i class="fa fa-instagram fa-2x"></i></a>
				&nbsp;&nbsp;&nbsp;
				<a href="#" target="_blank">
					<i class="fa fa-linkedin-square fa-2x"></i></a>
				&nbsp;&nbsp;&nbsp;
				<a href="http://www.jnvu.co.in/department/deptt-of-computer-science-engineering/" target="_blank">
					<i class="fa fa-google-plus-square fa-2x"></i></a>

				<br><br>
			</div>

		</div>
	</div>
	</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>