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
		<span class="navbar-brand text-dark active"><img src="<?php echo $_SESSION['AdminProfile']; ?>" class="rounded-circle" height="30px" width='30px' alt=' ' />
        &nbsp; Welecome <b> <?php echo $_SESSION['AdminName']; ?> </b> &nbsp; &nbsp; </span>
		
		<button type="button" class="navbar-toggler" data-bs-toggle='collapse' data-bs-target='#menu'>
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav">

				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle active" id="NoticeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
						<b>Add Notice</b>
					</a>
					<ul class="dropdown-menu" aria-labelledby="NoticeDropdown">
            			<li>
            				<a class="dropdown-item" href="adminviewnotice.php">View Notice</a>
            			</li>
            			<li>
            				<a class="dropdown-item disabled" href="#">Add Notice</a>
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
					<a href="#" class="nav-link dropdown-toggle" id="SyllabusDropdown" data-bs-toggle='dropdown' aria-expanded='false'>
						<b>Syllabus</b>
					</a>
					<ul class="dropdown-menu" aria-labelledby='SyllabusDropdown'>
						<li>
            				<a class="dropdown-item" href="adminviewsyllabus.php">View Syllabus</a>
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


<!-- Add Notice -->
<div class="container">

	<div class="h2 text-success" style="text-align: center;">Add Notice</div>

		<div class="row justify-content-center mb-3 ">
			<label for="noticeid" class="mb-2" >Notice Description : </label>
			<textarea id="noticeid" name="nd" rows="4" cols="100" style="width: 1120px;" required="true"></textarea>
		
			<br />
		</div>

		<div class="row justify-content-center mb-4">
			<span>Upload Date : &nbsp; <input type="date" name="ud" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>" /></span>
		</div>

		<div class="row justify-content-center">
			<input type="submit" name="addnotice" value="Add" class="btn btn-block btn-primary mb-3" style="width:20%;">
		</div>
	
</div>
</form>

<?php
extract($_REQUEST);

if(isset($addnotice) and !empty($nd))
{
    $nd = trim($nd);
    
    if($nd)
    {
        $link = mysqli_connect('localhost','root','','csedeptdb');
        
        $q = "select max(noticeid) from notice";
        $result = mysqli_query($link,$q);
        
        $x = mysqli_fetch_row($result);  
        
        $noticeid = $x[0]+1;
        
        $qry = "insert into notice values($noticeid,'$nd','$ud')";
        $r = mysqli_query($link,$qry);
        
        if($r)
        {
            echo "<font size='4' class='text-success h3'><center> Notice insert successful. </center></font>";
        }
        
        mysqli_close($link);        
    }
    else
    {
        echo "<font size='4' class='text-danger h3'><center>Please Enter Valid Notice Description. </center></font>";
    }
}

?>

<br>

<!-- Footer -->
<?php include_once('fixedfooter.html'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>