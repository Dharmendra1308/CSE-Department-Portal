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
    
</head>
<body class="bg-secondary bg-opacity-25">

<form action="#" method="post" name="myform" >

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
					<a href="#" class="nav-link dropdown-toggle active" id="AttendenceDropdown" data-bs-toggle='dropdown' aria-expanded='false'>
						<b>View Attendence</b>
					</a>
					<ul class="dropdown-menu" aria-labelledby='AttendenceDropdown'>
						<li>
            				<a class="dropdown-item" href="facultymarkattendence.php">Mark Attendence</a>
            			</li>
            			<li>
            				<a class="dropdown-item disabled" href="#">View Attendence</a>
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
				
				<li class="nav-item"><a href="facultysyllabus.php" class="nav-link"><b>Syllabus</b></a></li>
				
				<li class="nav-item"><a href="facultytimetable.php" class="nav-link"><b>Time Table</b></a></li>
				
				<li class="nav-item"><a href="facultylogout.php" class="nav-link"><b>Logout</b></a></li>
			</ul>
		</div>
		
		</div>
	</nav>

<br/>


<!-- View Attendence -->
<div class="container-fluid">
	<div class="row p-4 justify-content-center">
		
		<div class="col-4">
			<b class="h4">Choose Semester :</b>
            <select name='sem'>
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
		</div>
		
        <div class="col-4">
            <b class="h4">Choose Date : </b>
            <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>" />
        </div> 

    </div>  
         
    <div class="row mb-5 p-4 justify-content-center">
			<input type="submit" name="next" value="Next" class="btn btn-block btn-primary shadow p-0" style='width:20%;' >
	</div>

</form>

<form name="frm" method="post" action="#">

<?php

extract($_POST);
           
if(isset($next) && isset($sem) && $date)
{   
    $sem = (int) $sem;
    $_SESSION['Semester'] = $sem;
    
    $link = mysqli_connect('localhost','root','','csedeptdb');
    
    $qry = "select * from absenttable where doc='$date' and semester=$sem";
    $result = mysqli_query($link,$qry);
    $n = mysqli_num_rows($result);
    
    if($n)
    {
        echo "<center><b class='h3 text-success'>CSE $sem Semester Student Attandance : ".date('d-m-Y',strtotime($date))." </b></center><br />";
        
        $q1 = "select * from absentstudent where doc='$date' and semester=$sem";
        $result1 = mysqli_query($link,$q1);
        
        $arr = array();
    	    	
       	while($r = mysqli_fetch_assoc($result1))
       	{
      		array_push($arr,$r['rollno']);
       	}
        
        $qry = "select * from student where semester=$sem";
   	    $resultset = mysqli_query($link,$qry);
            
       	if($date == date('Y-m-d'))
   	    {
   	        $str= <<<TEST
            <table class='bg-secondary bg-opacity-50 table table-bordered mb-4' align='center' cellpading='4px'>
            <tr><th>Roll Number</th><th>Name</th><th>Mark only Absentees.</th></tr>
TEST;
            while($rs = mysqli_fetch_array($resultset))
            {
                $str .= "<tr><th> $rs[rollno] </th><th> $rs[name] </th>";
    
                if( in_array("$rs[rollno]",$arr) )
                {
                    $str .= "<th><input type='checkbox' name='ch[]' value='$rs[rollno]' checked /></th></tr>";
                }
                else
                {
                    $str .= "<th><input type='checkbox' name='ch[]' value='$rs[rollno]'/></th></tr>";
                }
            }
            
            $str .= "</table><center><input type='submit' name='save' value='Submit' class='btn btn-block btn-success shadow p-1' style='width:25%;' /></center>";
    	       
            echo $str;
                
            mysqli_close($link);
        }
        else
        {
            $str= <<<TEST
            <table class='bg-secondary bg-opacity-50 table table-bordered mb-4' align='center' cellpading='4px'>
            <tr><th>Roll Number</th><th>Name</th><th>Mark only Absentees.</th></tr>
TEST;
            while($rs = mysqli_fetch_array($resultset))
            {
                $str .= "<tr><th> $rs[rollno] </th><th> $rs[name] </th>";
    
                if( in_array("$rs[rollno]",$arr) )
                {
                    $str .= "<th><input type='checkbox' checked disabled /> &nbsp; Absent</th></tr>";
                }   
                else
                {
                    $str .= "<th><input type='checkbox' disabled /></th></tr>";
                }
            }
                
            $str .= "</table>";
                
            echo $str;
                
            mysqli_close($link);
        }
    }
    else
    {
        echo "<center class='h3 text-danger'>CSE $sem semester : Attendence Not marked. ".date('d-m-Y',strtotime($date))."</center>";
    }
}
else
{
    echo "<br><center class='text-danger h5'>Please Select Semester and Date.</center>";
}

?>

</form>

</div>


<?php

extract($_POST);
    
$x = 0;


$link = mysqli_connect('localhost','root','','csedeptdb');

if(isset($save))
{   
    $sem = $_SESSION['Semester'];
    
    $q2 = "delete from absentstudent where doc=curdate() and semester=$sem";
    mysqli_query($link,$q2);
    
    $q1 = "delete from absenttable where doc=curdate() and semester=$sem";
    mysqli_query($link,$q1);
        
    if(isset($ch))
    {   
        foreach ($ch as $value) 
        {
            $qry = "insert into absentstudent values('".$value."',curdate(),$sem)";
            mysqli_query($link,$qry);
            $x++;          
        }
        
        $q = "insert into absenttable values($x,curdate(),$sem)";
        mysqli_query($link,$q);
            
        mysqli_close($link);
        echo "<center class='text-success h3'>CSE $sem semester Attendence Successfully Updated. &nbsp;".date('d-m-Y')."</center>";
    }
    else
    {
        $q = "insert into absenttable values($x,curdate(),$sem)";
        mysqli_query($link,$q);
            
        mysqli_close($link);
        echo "<center class='text-success h3'>CSE $sem semester Attendence Successfully Updated. All Student are present. &nbsp;".date('d-m-Y')."</center>";
    }
}  


?>


<br>

<!-- Footer -->
<?php include_once('footer.html'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>