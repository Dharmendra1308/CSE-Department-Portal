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
            				<a class="dropdown-item " href="adminaddnotice.php">Add Notice</a>
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

				<li class="nav-item"><a href="adminprofile.php" class="nav-link"><b>Profile</b></a></li>
				
				<li class="nav-item"><a href="adminlogout.php" class="nav-link"><b>Logout</b></a></li>
			</ul>
		</div>
		
		</div>
	</nav>

<br/>


<!-- More Detail -->
<?php
extract($_GET);

$link = mysqli_connect('localhost','root','','csedeptdb');

if(isset($c))
{
    $qry = "delete from student where id=$ID and rollno='$RN'";
    $result = mysqli_query($link,$qry);
    mysqli_close($link);

    if($result)
    {
        echo "<div class='h3 text-success' style='font-weight:bold; text-align:center;'> Id = $ID and Roll No. = $RN Deleted.</div>";
    }  
    
}


if(isset($id) and isset($rollno))
{
    $qry = "select * from student where id=$id and rollno='$rollno'";
    $result = mysqli_query($link,$qry);
    $r = mysqli_fetch_array($result);
    
    mysqli_close($link);
    
    $str=<<<TEST
    <div class="container">
    <table class='bg-secondary bg-opacity-25 shadow table table-bordered mb-4' align='center' cellpading='4px' style="width: 70%;">
    <tr><th>ID</th><th>Roll No.</th><th>Name</th><th>Mail</th><th>Mobile</th><th>Adhar</th><th>Batch</th><th>Remove</th></tr>
    <tr align='center'><td>$r[id]</td><td>$r[rollno]</td><td>$r[name]</td><td>$r[mail]</td><td>$r[mobile]</td><td>$r[adhar]</td><td>$r[batch]</td><td><a href='moredetail.php?ID=$r[id]&RN=$r[rollno]&c=1'>Remove</a></td></tr>
    </table>
    </div>
TEST;

    echo $str;
}

?>

<br>

<!-- Footer -->
<?php include_once('fixedfooter.html'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>
