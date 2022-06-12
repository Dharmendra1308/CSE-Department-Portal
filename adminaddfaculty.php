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
					<a href="#" class="nav-link dropdown-toggle active" id="FacultyDropdown" data-bs-toggle='dropdown' aria-expanded='false'>
						<b>Add Faculty</b>
					</a>
					<ul class="dropdown-menu" aria-labelledby='FacultyDropdown'>
						<li>
            				<a class="dropdown-item" href="adminviewfaculty.php">View Faculty</a>
            			</li>
            			<li>
            				<a class="dropdown-item disabled" href="#">Add Faculty</a>
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


<!-- Add Faculty -->
<?php

$link = mysqli_connect('localhost','root','','csedeptdb');
$qry = "select max(id) from faculty";
$resultset = mysqli_query($link,$qry);

$r = mysqli_fetch_row($resultset);

$_SESSION['NewFacultyId'] = $r[0]+1; 


?>

<form action="#" method="post" name="myform">
<div class="container">

	<div class="h2 text-success mb-3" style="text-align: center;">Add Faculty</div>

		<div class="container mb-3 justify-content-center">
			<table class='bg-secondary bg-opacity-25 shadow table table-bordered mb-4' align='center' cellpading='4px' style="width: 70%;">
	            <tr align="center">
	            	<th>ID </th>
	            	<th><input type="tel" name="id" readonly="true" value="<?php echo $_SESSION['NewFacultyId']; ?>" style="width:75%;"></th>
	            </tr>
	            <tr align="center">
	            	<th>Name </th>
	            	<th><input type="text" name="nm" required="true" placeholder="Enter Faculty Full Name" style="width:75%;"></th>
	            </tr>
	            <tr align="center">
	            	<th>DOB </th>
	            	<th><input type="date" name="dob" required="true" placeholder="Enter date of birth" max="<?php echo date('Y-m-d') ?>" style="width:75%;"></th>
	            </tr>
	            <tr align="center">
	            	<th>Mail </th>
	            	<th><input type="mail" name="mail" required="true" placeholder="Enter mail id" style="width:75%;"></th>
	            </tr>
	            <tr align="center">
	            	<th>Mobile </th>
	            	<th><input type="tel" name="mobile" required="true" placeholder="Enter Mobile No." maxlength="10" style="width:75%;"></th>
	            </tr>
	            <tr align="center">
	            	<th>Adhar </th>
	            	<th><input type="tel" name="adhar" required="true" placeholder="Enter Adhar No." maxlength="12" style="width:75%;"></th>
	            </tr>
	            <tr align="center">
	            	<th>Post </th>
	            	<th>
	            		<input type="text" name="post" required="true" placeholder="Enter Post" list="postid" style="width:75%;">
	            		<datalist id='postid'>
	            			<option>HOD</option>
	            			<option>Professor</option>
	            			<option>Associate Professor</option>
	            			<option>Assistant Professor</option>
	            		</datalist>
	            	</th>
	            </tr>
	            <tr align="center">
	            	<th>Qualification </th>
	            	<th>
	          		<select name="qual" required="true" style="width:75%;">
	          			<option selected="true" disabled="true">~~ SELECT QUALIFICATION ~~</option>
	            		<option value="M.E.">M.E.</option>
	            		<option value="M.Tech.">M.Tech.</option>
	            		<option  value="Ph.D.">Ph.D</option>
	            		<option value="B.E.">B.E.</option>
	            		<option value="B.E.">B.Tech.</option>
	            		<option value="MCA">MCA</option>
	            		<option value="MBA">MBA</option>
	            	</select>
	            	</th>
	            </tr>
	            <tr align="center">
	            	<th>Specification </th>
	            	<th><input type="textarea" name="spec" required="true" placeholder="Enter Specification" cols='70' style="width:75%;"></th>
	            </tr>
	            <tr align="center">
	            	<th>Password </th>
	            	<th><input type="text" name="pwd" required="true" placeholder="Enter Password" value="faculty@123" style="width:75%;"></th>
	            </tr>
	            <tr align="center">
	            	<th colspan="2">
	            		<input type="submit" name="subbtn" value="Add" class="btn btn-block btn-primary bg-opacity-25 btn-outline-light" style="width:90%; font-weight: bold;" />
	            	</th>
	            </tr>

	        </table>
		</div>
	
</div>
</form>

<?php

unset($_SESSION['NewFacultyId']);

extract($_REQUEST);

if(isset($subbtn))
{
    $q = "select * from faculty where adhar='$adhar'";
    $result = mysqli_query($link,$q);
    
    $n = mysqli_num_rows($result);
    
    if(!$n)
    {
        $qry1 = "insert into faculty (id,name,dob,mail,mobile,adhar,post,qual,spec,password) values($id,'$nm','$dob','$mail','$mobile','$adhar','$post','$qual','$spec','$pwd')";
        $result1 = mysqli_query($link,$qry1);
        
        if($result1)
        {
            header("location:adminaddfaculty.php?id=$id&name=$nm&pass=$pwd");
        }
        mysqli_close($link);
    }
    else
    {
    	header("location:adminaddfaculty.php?c=1");
    }
}

if(isset($id) and isset($name) and isset($pass))
{
	echo "<hr />";
    echo "<div style='text-align:center; font-weight:bold;'>$name , Id = $id and Password = $pass </div>";
    echo "<div class='h3 text-success' style='font-weight:bold; text-align:center;'>Faculty Successfull Inserted.</div>";
    echo "<hr />";
}

if(isset($c))
{
    echo "<div class='h3 text-danger' style='font-weight:bold; text-align:center;'>Faculty Already Exist.</div>";
    mysqli_close($link);
}

?>

<br>

<!-- Footer -->
<?php include_once('footer.html'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>