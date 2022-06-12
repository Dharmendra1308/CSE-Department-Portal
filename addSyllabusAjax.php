<?php

extract($_GET);

if(isset($sem))
{
	echo "<div class='h4 text-dark mb-3' style='text-align:center;'>CSE $sem Syllabus.</div>";
    
    $str=<<<TEST
    <div class='container'>
    <div class='row justify-content-center'>

    	<div class="col mb-3">
			<label for="subjectid" >Enter Subject Name : </label>
			<textarea id="subjectid" name="sname" rows="1" cols="100" style="width: 1120px;" required="true"></textarea>
		</div>

		<div class="col mb-4">
			<label for="topicid" >Enter Syllabus Topics : </label>
			<textarea id="topicid" name="topics" rows="5" cols="100" style="width: 1120px;" required="true"></textarea>
		</div>

		<input type="submit" name="addsyllabus" value="Add" class="btn btn-block btn-primary" style="width:20%;">
	
	</div>
	</div>
TEST;

    echo $str;
}

?>