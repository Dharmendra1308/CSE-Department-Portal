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
		<span class="navbar-brand text-dark"><img src="images/mbm.png" height="30px" />
		<b> &nbsp; Computer Science Deparment &nbsp; &nbsp; </b></span>
		
		<button type="button" class="navbar-toggler" data-bs-toggle='collapse' data-bs-target='#menu'>
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="landingpage.php" class="nav-link"><b>Home</b></a></li>
				<li class="nav-item"><a href="notice.php" class="nav-link"><b>Notice</b></a></li>
				<li class="nav-item"><a href="#" class="nav-link active"><b>Faculty</b></a></li>
				<li class="nav-item"><a href="syllabus.php" class="nav-link"><b>Syllabus</b></a></li>
				<li class="nav-item"><a href="timetable.php" class="nav-link"><b>Time Table</b></a></li>
				<li class="nav-item">
					<a href="https://www.jnvuiums.in/(S(z3t5leeoeautoqvse243ansv))/main.aspx" class="nav-link" target="_blank"><b>University Website</b></a>
				</li>
				<li class="nav-item"><a href="https://mbmalumni.org/" class="nav-link" target="_blank"><b>Alumni Page</b></a></li>
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<b>Login</b>
					</a>
					
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            			<li><a class="dropdown-item" href="adminlogin.php">Admin</a></li>
            			<li><a class="dropdown-item" href="facultylogin.php">Faculty</a></li>
			            <li><a class="dropdown-item" href="studentlogin.php">Student</a></li>
          			</ul>
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


<!-- Faculty -->
	<div class="container p-3 justify-content-center">
		
		<div class="container-fluid bg-opacity-50 mx-auto d-block mb-4" style="width: 440px;">
			<i class="fa fa-wa fa-users"></i> &nbsp;
			<b>FACULTY OF COMPUTER SCIENCE DEPARMENT</b>
		</div>
	
   		<div class="row">


	<?php
		$link = mysqli_connect('localhost','root','','csedeptdb');
                
        $qry = "select * from faculty where post != 'Admin'";
                
        $resultset = mysqli_query($link,$qry);
                
        while($r = mysqli_fetch_array($resultset))
        {
            $str=<<<TEST
            <div class='col-lg-4 col-md-6'>
            <div class='container-fluid shadow mb-4 p-3 border border-white'>
            <div class='row'>
            <div class='col-8'>
            <b class='text-success text-center'> $r[name] </b><br/>
            <i class='fa fa-fw fa-user'></i>
            <font class='text-muted' size='3px'><b> $r[post] </b></font><br/>
            </div>
            <div class='col-4'>
            <img src='$r[profile]' alt='No Image' class='rounded-circle mx-auto d-block' height='50px' width='50px' />
            </div>
            </div>
            <div class='row'>
            <div class='col-12'>
            <i class='fa fa-fw fa-envelope'></i>
            <a href='mailto:$r[mail]' style='text-decoration:none;'> $r[mail] </a>
            </div>
            </div>
            </div>
            </div>
TEST;
                    
            echo $str;
        }
                
        mysqli_close($link);
			
    ?>
    
   		</div>
		</div>
	
	</div>

	<br><br>

<!-- Footer -->
<?php include_once('footer.html'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>