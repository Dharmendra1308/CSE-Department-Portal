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
    
    function fun()
    {
        alert("Are you sure...");
    }
    
    </script>
    
</head>
<body class="bg-secondary bg-opacity-25">

<form action="#" method="post" name="myform" enctype="multipart/form-data">

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
				<li class="nav-item"><a href="#" class="nav-link active"><b>Profile</b></a></li>

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
				
				<li class="nav-item"><a href="facultysyllabus.php" class="nav-link"><b>Syllabus</b></a></li>
				
				<li class="nav-item"><a href="facultytimetable.php" class="nav-link"><b>Time Table</b></a></li>
				
				<li class="nav-item"><a href="facultylogout.php" class="nav-link"><b>Logout</b></a></li>
			</ul>
		</div>
		
		</div>
	</nav>

<br/>


<!-- Faculty Profile -->
<div class="container-fluid">
	<div class="container shadow mb-5 p-3 justify-content-center border border-white">
		<div class="row">
		<div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-xs-12">
			<?php
                $facultyid = $_SESSION['FacultyId'];
                
                $link = mysqli_connect('localhost','root','','csedeptdb');
                
				$qry = "select * from faculty where id=$facultyid";

				$resultset = mysqli_query($link,$qry);

				$r = mysqli_fetch_array($resultset);
$str=<<<TEST
				<table class="table table-striped table-bordered border-secondary table-hover">
					<tbody>
						<tr><td>Faculty Id</td>
							<td><input type="text" name="uid" value="$r[id]" readonly="true"></td>
						</tr>
                        <tr><td>Faculty Name</td>
							<td><input type="text" name="unm" value="$r[name]" required='true'></td>
						</tr>
                        <tr><td>Faculty DOB</td>
							<td><input type="date" name="udob" value="$r[dob]" required='true'></td>
						</tr>
                        <tr><td>Faculty Mail Id</td>
							<td><input type="mail" name="umail" value="$r[mail]" required='true'></td>
						</tr>
                        <tr><td>Faculty Mobile</td>
							<td><input type="tel" name="umobile" value="$r[mobile]" maxlength=10 required='true'></td>
						</tr>
                        <tr><td>Faculty Adhar</td>
							<td><input type="telephone" name="uadhar" value="$r[adhar]" required='true'></td>
						</tr>
                        <tr><td>Faculty Post</td>
							<td>
								<input type="text" name="upost" value="$r[post]" list='listid' required='true'>
								<datalist id="listid">
									<option>HOD</option>
									<option>Admin</option>
									<option>Professor</option>
									<option>Associate Professor</option>
									<option>Assistant Professor</option>
									<option>Manager</option>
								</datalist>
							</td>
						</tr>
                        <tr><td>Faculty Qualification</td>
                        <td>
							<select name="uqual" required='true'>
                            <option value="$r[qual]" selected>$r[qual]</option>
                            <option value="B.E.">B.E.</option>
                            <option value="B.Tech.">B.Tech.</option>
                            <option value="M.E.">M.E.</option>
                            <option value="M.Tech.">M.Tech.</option>
                            <option value="Ph.D">PhD</option>
                            <option value="MCA">MCA</option>
                            </select>
                        </td>
						</tr>
                        <tr><td>Faculty Specification</td>
							<td><input type="textarea" name="uspec" value="$r[spec]" required='true'></td>
						</tr>
                        <tr><td>Faculty Password</td>
							<td><input type="text" name="upassword" value="$r[password]" required='true'></td>
						</tr>
					</tbody>
				</table>
TEST;
                
                mysqli_close($link);
                
                echo $str;
			?>
		</div>
		
		<div class="col-xl-3 col-lg-3 col-md-2 col-sm-12 col-xs-12">
			<img src="<?php echo $_SESSION['FacultyProfile']; ?>" class="rounded-circle" height="200px" width="200px" alt='No Profile Image'/>

			<br><br><br>

			<input type="file" name="uprofile" accept=".jpg, .png">

		</div>

		</div>
        
        <div class="row justify-content-center mt-3 mb-2 mr-5 ml-5">
        	<input type="submit" name="udata" value="Save" class="btn btn-block btn-success shadow p-1 mb-2" onclick="fun()"/>
        </div>
        
	</div>
</div>

</form>

<?php
extract($_POST);

if(isset($udata))
{
	$path = ImgPath();

	$_SESSION['FacultyProfile'] = $path;

    $link = mysqli_connect('localhost','root','','csedeptdb');
    
    $qry1 = "update faculty set name='$unm',dob='$udob',mail='$umail',mobile='$umobile',adhar='$uadhar',post='$upost',qual='$uqual',spec='$uspec',password='$upassword',profile='$path' where id=$uid";

    $resultset1 = mysqli_query($link,$qry1);
    
    $x = mysqli_num_rows($resultset1);
    
    mysqli_close($link);
    
    if($x == 0)
    {
        header('location:facultyprofile.php');
    }
    else
    {
        header('location:facultyprofile.php');
    }
}

function ImgPath()
{
	$file = $_FILES['uprofile'];

	$type = explode('.',$file['name']);
	$len = count($type);
	$ext = $type[$len-1];

	if($file['error']==0)
	{
		$tempPath = $file['tmp_name'];
		$finalPath = $_SERVER['DOCUMENT_ROOT'].'CSEDeparment/FacultyProfile/'.$_SESSION['FacultyId'].'.'.$ext;

		move_uploaded_file($tempPath,$finalPath);

		return 'FacultyProfile/'.$_SESSION['FacultyId'].'.'.$ext;

	}
	else
	{
		return $_SESSION['FacultyProfile'];
	}
}

?>

<br>

<!-- Footer -->
<?php include_once('footer.html'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>