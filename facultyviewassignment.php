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
            var a = document.myform.sem.value;
            
            var strURL = "AssignmentViewAjax.php"+"?sem="+a;
            
            var xmlHttpObj = new XMLHttpRequest();
            
            if(xmlHttpObj)
            {
                xmlHttpObj.onreadystatechange = function()
                {
                    if(xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200)
                    {
                        document.getElementById('subject').innerHTML = xmlHttpObj.responseText;
                    }
                }
                
                xmlHttpObj.open("GET",strURL,true);
                xmlHttpObj.send();
            }
            
        }
        
        
        function AjaxAssignment()
        {
            var a = document.myform.sub.value;
            
            var strURL = "AssignmentViewAjax.php"+"?sub="+a;
            
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
		<span class="navbar-brand text-dark active"><img src="<?php echo $_SESSION['FacultyProfile']; ?>" class="rounded-circle" height="30px" width='30px' alt=' ' />
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
					<a href="#" class="nav-link dropdown-toggle active" id="AssignmentDropdown" data-bs-toggle='dropdown' aria-expanded='false'>
						<b>View Assignment</b>
					</a>
					<ul class="dropdown-menu" aria-labelledby='AssignmentDropdown'>
						<li>
            				<a class="dropdown-item" href="facultyaddassignment.php">Add Assignment</a>
            			</li>
            			<li>
            				<a class="dropdown-item disabled" href="#">View Assignment</a>
            			</li>
					</ul>
				</li>

				<li class="nav-item"><a href="facultynotice.php" class="nav-link"><b>Notice</b></a></li>
				
				<li class="nav-item"><a href="facultysyllabus.php" class="nav-link"><b>Syllabus</b></a></li>
				
				<li class="nav-item"><a href="facultytimetable.php" class="nav-link"><b>Time Table</b></a></li>
				
				<li class="nav-item"><a href="facultylogout.php" class="nav-link"><b>Logout</b></a></li>
			</ul>
		</div>
		
		</div>
	</nav>

<br/>


<!-- View Attendence -->
<form action="#" method="post" name="myform" >

<div class="container">
		<fieldset class="mb-3">
		<legend align="center">Assignment</legend>
		<table class="table" border="2px" align="center" cellpadding="4px" style="width: 55%;">

			<tr align="center">
				<th>Choose Semester :&nbsp;</th>
                <th>
					<select name='sem' onchange="AjaxDemofun()" style='width: 75%;'>
            			<option disabled="true" selected="true">~~ Select Semester ~~</option>
            			<option value="1" disabled="true">First</option>
            			<option value="2" disabled="true">Second</option>
            			<option value="3">Third</option>
            			<option value="4">Forth</option>
            			<option value="5">Fifth</option>
            			<option value="6">Sixth</option>
            			<option value="7">Seventh</option>
            			<option value="8">Eighth</option>
                    </select>
				</th>	
			</tr>
            
            <tr align="center" id='subject'></tr>
            
            </table>
	</fieldset>
</div>

<div class="container" align="center" id="result"></div>

</form>

<div class="container-fluid">

<?php
extract($_GET);

$link = mysqli_connect('localhost','root','','csedeptdb');

if(isset($id) and isset($total))
{
    if($id !=0 and $total !=0)
    {
        $qry = "select * from assignment where aid=$id";
        $resultset = mysqli_query($link,$qry);
        $r = mysqli_fetch_array($resultset);
    
    
        $q = "select * from subject where code='$r[scode]'"; 
        $result = mysqli_query($link,$q);
        $sn = mysqli_fetch_array($result);
    
        
        $qry1 = "select * from submit_assignment where aid=$id";
        $resultset1 = mysqli_query($link,$qry1);
        
    
        $str="<fieldset><legend class='h5 mb-4' align='center'>CSE $sn[semester]th SEM $sn[sname] Assignment</legend><div class='row justify-content-center'>";
        
        
        while($r1 = mysqli_fetch_assoc($resultset1))
        {
            $q1 = "select * from student where rollno='$r1[rollno]'";
            $rset = mysqli_query($link,$q1);
            
            $nm = mysqli_fetch_array($rset);
            
            $date = date('d-M-Y',strtotime("$r1[sdate]"));
            
            $card=<<<TEST
            <div class="col-lg-5 col-md-5">
                <div class="card mb-3">
                    <div class='card-header'>
                        <h5 class="card-title"> Name : $nm[name] </h5>
                        <h5 class="card-title"> Roll Number : $nm[rollno] </h5>
                        <span align='right'><small class="text-muted">Submittion date : $date </small></span>
                    </div>
                    <div class="card-body">
                      <h6 align='center'>Qutionstions :</h6>
                      <pre class="card-text">$r[description]</pre>
                      <hr/>
                      <h6 align='center'>Submitted Answers :</h6>
                      <pre class="card-text">$r1[description]</pre>
                    </div>
                    <div class='card-footer'>
                    <a href='$r1[file]' download='$r1[file]' class='btn btn-block btn-success shadow' style='width: 100%;'>Download Submited File</a>
                    </div>
                </div>
            </div>
TEST;

        $str = $str.$card;
        }
        
        $str .="</div><fieldset>";
        
        echo $str;
    }
    else
    {
        echo "<script type='text/javascript'> alert('No Submission Here'); </script>";
    }
}

?>

</div>

<br>

<!-- Footer -->
<?php include_once('footer.html'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>