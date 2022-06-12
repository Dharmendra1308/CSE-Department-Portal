<?php
session_start();

if(!(isset($_SESSION['AdminId'])))
{
    header("location:adminlogin.php");
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
            var a = document.myform.sem.value;
            
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

	<!-- Header -->
	<header>
	<h1 class="h1"><b>COMPUTER SCIENCE DEPARMENT PORTEL</b></h1>
	</header>

	<!-- Navigation Bar -->    
	<nav class="nav navbar navbar-expand-lg bg-primary bg-opacity-75 navbar-dark sticky-top">

		<div class="container-fluid col-12 ">
		<span class="navbar-brand text-dark active"><img src="<?php echo $_SESSION['AdminProfile']; ?>" class="rounded-circle" height="30px" width='30px' alt=' ' />
        &nbsp; Welecome <b> <?php echo $_SESSION['AdminName']; ?> </b> &nbsp; &nbsp; </span>
		
		<button type="button" class="navbar-toggler" data-bs-toggle='collapse' data-bs-target='#menu'>
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav">

				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="NoticeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
						<b>Notice</b>
					</a>
					<ul class="dropdown-menu" aria-labelledby="NoticeDropdown">
            			<li>
            				<a class="dropdown-item" href="adminviewnotice.php">View Notice</a>
            			</li>
            			<li>
            				<a class="dropdown-item" href="adminaddnotice.php">Add Notice</a>
            			</li>
          			</ul>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="FacultyDropdown" data-bs-toggle='dropdown' aria-expanded='false'>
						<b>Faculty</b>
					</a>
					<ul class="dropdown-menu" aria-labelledby='FacultyDropdown'>
						<li>
            				<a class="dropdown-item" href="adminviewfaculty.php">View Faculty</a>
            			</li>
            			<li>
            				<a class="dropdown-item" href="adminaddfaculty.php">Add Faculty</a>
            			</li>
					</ul>
				</li>
				
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="StudentDropdown" data-bs-toggle='dropdown' aria-expanded='false'>
						<b>Student</b>
					</a>
					<ul class="dropdown-menu" aria-labelledby='StudentDropdown'>
						<li>
            				<a class="dropdown-item" href="adminviewstudent.php">View Student</a>
            			</li>
            			<li>
            				<a class="dropdown-item" href="adminaddstudent.php">Add Student</a>
            			</li>
					</ul>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle active" id="SyllabusDropdown" data-bs-toggle='dropdown' aria-expanded='false'>
						<b>View Syllabus</b>
					</a>
					<ul class="dropdown-menu" aria-labelledby='SyllabusDropdown'>
						<li>
            				<a class="dropdown-item disabled" href="#">View Syllabus</a>
            			</li>
            			<li>
            				<a class="dropdown-item" href="adminaddsyllabus.php">Add Syllabus</a>
            			</li>
					</ul>
				</li>


				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="TimeTableDropdown" data-bs-toggle='dropdown' aria-expanded='false'>
						<b>Time Table</b>
					</a>
					<ul class="dropdown-menu" aria-labelledby='TimeTableDropdown'>
						<li>
            				<a class="dropdown-item" href="adminviewtimetable.php">View TimeTable</a>
            			</li>
            			<li>
            				<a class="dropdown-item" href="adminaddtimetable.php">Update TimeTable</a>
            			</li>
					</ul>
				</li>

				<li class="nav-item"><a href="adminprofile.php" class="nav-link"><b>Profile</b></a></li>
				
				<li class="nav-item"><a href="adminlogout.php" class="nav-link"><b>Logout</b></a></li>
			</ul>
		</div>
		
		</div>
	</nav>

<br/>


<!-- Add Syllabus -->

<form action="#" method="post" name="myform">

<div class="container">

		<div class="row justify-content-center mb-2">
			<div class="h2 text-success col-6 mb-3" style="text-align: center;">View Syllabus</div>
		</div>	

		<div class="row justify-content-center">

			<div class="col-6 mb-3">
				<b class="h5">Choose Semester : </b>
	            <select name='sem' onchange="AjaxDemofun()" >
				<option disabled="true" selected="true">~~ Select Semester ~~</option>
				<option value="1st" disabled="true">First</option>
				<option value="2nd" disabled="true">Second</option>
				<option value="3rd">Third</option>
				<option value="4th">Forth</option>
				<option value="5th">Fifth</option>
				<option value="6th">Sixth</option>
				<option value="7th">Seventh</option>
				<option value="8th">Eighth</option>
				</select>
			</div>

    	</div>

</div>

<div class="container" id="result"></div>

</form>

<br>

<!-- Footer -->
<?php include_once('footer.html'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>