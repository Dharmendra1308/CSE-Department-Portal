<?php
extract($_GET);


	if ($sem == '3rd') 
	{   
        if(file_exists('Syllabus/cse3syllabus.txt'))
        {
            echo "<h2 align='center'>CSE ".$sem." SEMESTER</h2><br>";
        
            $arr3 = file('Syllabus/cse3syllabus.txt');
            
    		foreach ($arr3 as $value3) 
    		{
    			echo $value3;
    		}
		}
        else
		{
			echo "<div class='container text-success h5'>CSE ".$sem." Semester Syllabus Not found</div>";
		}
	}
	else if ($sem == '4th') 
	{
        if(file_exists('Syllabus/cse4syllabus.txt'))
        {
            echo "<h2 align='center'>CSE ".$sem." SEMESTER</h2><br>";
        
            $arr4 = file('Syllabus/cse4syllabus.txt');
            
    		foreach ($arr4 as $value4) 
    		{
    			echo $value4;
    		}
        }
		else
		{
			echo "<div class='container text-success h5'>CSE ".$sem." Semester Syllabus Not found</div>";
		}
	}
	else if ($sem == '5th') 
	{
        if(file_exists('Syllabus/cse5syllabus.txt'))
        {
            echo "<h2 align='center'>CSE ".$sem." SEMESTER</h2><br>";
        
            $arr5 = file('Syllabus/cse5syllabus.txt');
            
    		foreach ($arr5 as $value5) 
    		{
    			echo $value5;
    		}
        }
		else
		{
			echo "<div class='container text-success h5'>CSE ".$sem." Semester Syllabus Not found</div>";
		}
	}
	else if ($sem == '6th') 
	{
		if(file_exists('Syllabus/cse6syllabus.txt'))
        {
            echo "<h2 align='center'>CSE ".$sem." SEMESTER</h2><br>";
        
            $arr6 = file('Syllabus/cse6syllabus.txt');
            
    		foreach ($arr6 as $value6) 
    		{
    			echo $value6;
    		}
        }
		else
		{
			echo "<div class='container text-success h5'>CSE ".$sem." Semester Syllabus Not found</div>";
		}
	}
	else if ($sem == '7th') 
	{
		if(file_exists('Syllabus/cse7syllabus.txt'))
        {
            echo "<h2 align='center'>CSE ".$sem." SEMESTER</h2><br>";
        
            $arr7 = file('Syllabus/cse7syllabus.txt');
            
    		foreach ($arr7 as $value7) 
    		{
    			echo $value7;
    		}
        }
		else
		{
			echo "<div class='container text-success h5'>CSE ".$sem." Semester Syllabus Not found</div>";
		}
	}
	else if ($sem == '8th') 
	{
        
        if(file_exists('Syllabus/cse8syllabus.txt'))
        {
            echo "<h2 align='center'>CSE ".$sem." SEMESTER</h2><br>";
        
            $arr8 = file('Syllabus/cse8syllabus.txt');
        
    		foreach ($arr8 as $value8) 
    		{
    			echo $value8;
    		}
        }
		else
		{
			echo "<div class='container text-danger h5' style='text-align:center;'>CSE ".$sem." Semester Syllabus Not found</div>";
		}
	}

?>