<?php
session_start();

if(!(isset($_SESSION['FacultyId'])))
{
    header("location:facultylogin.php");
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
	    
	    function AjaxDemofun()
	    {
	        var a = document.frm.sem.value;
	            
	        var strURL = "syllabusAjax.php"+"?sem="+a;
	            
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

<form name="frm">

	<!-- Header -->
	<header>
	<h1 class="h1"><b>COMPUTER SCIENCE DEPARMENT PORTEL</b></h1>
	</header>

	<!-- Navigation Bar -->    
	<nav class="nav navbar navbar-expand-lg bg-primary bg-opacity-75 navbar-dark sticky-top">

		<div class="container-fluid col-12 ">
		<span class="navbar-brand text-dark active"><img src="<?php echo $_SESSION['FacultyProfile']; ?>" class="rounded-circle" height="30px" width='30px' alt=' '/>
        &nbsp; Welecome <b> <?php echo $_SESSION['FacultyName']; ?> </b> &nbsp; &nbsp; </span>
		
		<button type="button" class="navbar-toggler" data-bs-toggle='collapse' data-bs-target='#menu'>
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="facultyprofile.php" class="nav-link"><b>Profile</b></a></li>

				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="AttendenceDropdown" data-bs-toggle='dropdown' aria-expanded='false'>
						<b>Attendence</b>
					</a>
					<ul class="dropdown-menu" aria-labelledby='AttendenceDropdown'>
						<li>
            				<a class="dropdown-item" href="facultymarkattendence.php">Mark Attendence</a>
            			</li>
            			<li>
            				<a class="dropdown-item" href="facultyviewattendence.php">View Attendence</a>
            			</li>
					</ul>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="AssignmentDropdown" data-bs-toggle='dropdown' aria-expanded='false'>
						<b>Assignment</b>
					</a>
					<ul class="dropdown-menu" aria-labelledby='AssignmentDropdown'>
						<li>
            				<a class="dropdown-item" href="facultyaddassignment.php">Add Assignment</a>
            			</li>
            			<li>
            				<a class="dropdown-item" href="facultyviewassignment.php">View Assignment</a>
            			</li>
					</ul>
				</li>

				<li class="nav-item"><a href="facultynotice.php" class="nav-link"><b>Notice</b></a></li>
				
				<li class="nav-item"><a href="#" class="nav-link active"><b>Syllabus</b></a></li>
				
				<li class="nav-item"><a href="facultytimetable.php" class="nav-link"><b>Time Table</b></a></li>
				
				<li class="nav-item"><a href="facultylogout.php" class="nav-link"><b>Logout</b></a></li>
			</ul>
		</div>
		
		</div>
	</nav>

<br/>


<!-- Syllabus -->
<div class="container">

	<div class='container p-3 mb-5'>
	<br>
	
	<center>
	<select name='sem' class="shadow p-1 mb-5" onchange="AjaxDemofun()">
		<option disabled="true" selected="true">~~ Select Semester ~~</option>
		<option value="1nd" disabled="true">First</option>
		<option value="2nd" disabled="true">Second</option>
		<option value="3rd">Third</option>
		<option value="4th">Forth</option>
		<option value="5th">Fifth</option>
		<option value="6th">Sixth</option>
		<option value="7th">Seventh</option>
		<option value="8th">Eighth</option>
	</select>
	</center>

	</div>

</form>

<br>

<div class="container" id="result">

</div>

</div>

<br><br>

<!-- Footer -->
<?php include_once('footer.html'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>