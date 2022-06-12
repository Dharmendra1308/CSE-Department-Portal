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

				<li class="nav-item"><a href="studentattendence.php" class="nav-link"><b>Attendence</b></a></li>

				<li class="nav-item"><a href="studentassignment.php" class="nav-link"><b>Assignment</b></a></li>

				<li class="nav-item"><a href="#" class="nav-link active"><b>Notice</b></a></li>
				
				<li class="nav-item"><a href="studentsyllabus.php" class="nav-link"><b>Syllabus</b></a></li>
				
				<li class="nav-item"><a href="studenttimetable.php" class="nav-link"><b>Time Table</b></a></li>
				
				<li class="nav-item"><a href="studentlogout.php" class="nav-link"><b>Logout</b></a></li>
			</ul>
		</div>
		
		</div>
	</nav>

<br/>


<!-- Notice -->
<div class="container">

<?php

$link = mysqli_connect('localhost','root','','csedeptdb');

$qry = "select * from notice order by udate desc";

$resultset = mysqli_query($link,$qry);

$n = mysqli_num_rows($resultset);

$notice=<<<TEST
<dl>
	<br><br>
<dt>Notice :-</dt>
<br>
<dd>
<ul type="disc">
TEST;

if($n != 0)
{
	$x = 0;

	while ($r = mysqli_fetch_array($resultset))
	{
		if($x<10)
		$notice .= "<li> $r[description] <span class='badge badge-primary text-success'> $r[udate] </span> </li>";
		$x++;
	}

	$notice .= "</ul></dl>";

	echo $notice;
}
else
	echo "<font size='4' class='text-danger'><b>No Notice available</b></font>";

?>

</div>

<br><br>

<!-- Footer -->
<?php include_once('footer.html'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>