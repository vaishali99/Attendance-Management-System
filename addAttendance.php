<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['user']; //assigns user value
	$code = $_POST['code'];
	//echo $code;
	
	$con = mysqli_connect("localhost", "root","") or die(mysqli_error());
	mysqli_select_db($con,"Attend") or die("Cannot connect to database");

	$query = mysqli_query($con,"SELECT * from users WHERE username='$user'");
	$exists = mysqli_num_rows($query);
	$table_users = "";
	$table_id = "";

	if($exists > 0) 
	{
		while($row = mysqli_fetch_assoc($query))
		{
			$table_users = $row['username'];
			$table_id = $row['id'];
		}
	}	
	//echo $table_users."<br>";
	//echo $table_id."<br>";

	$query1 = mysqli_query($con,"SELECT * from student WHERE s_id='$table_id'");
	$exists1 = mysqli_num_rows($query1);

	$table_sem = "";

	if($exists1 > 0) 
	{
		while($row = mysqli_fetch_assoc($query1))
		{
			$table_sem = $row['sem'];
		}
	}	
	//echo $table_sem."<br>";

	$query2 = mysqli_query($con, "SELECT * from subjects where sem = '$table_sem'");
	$exists2 = mysqli_num_rows($query2); 

	$subjects_sub_code = "";
	$total_classes = "";

	if($exists2 > 0) 
	{
		while($row = mysqli_fetch_assoc($query2)) 
		{
			$subjects_sub_code = $row['sub_code'];
			$total_classes = $row['total_classes'];
		}
	}
	//echo $subjects_sub_code."<br>";
	
	$query3 = mysqli_query($con, "SELECT * from code where sub_code='$subjects_sub_code'");
	$exists3 = mysqli_num_rows($query3); 

	$c = "";

	if($exists3 > 0) 
	{
		while($row = mysqli_fetch_assoc($query3)) 
		{
			$c = $row['gcode'];
			//Print $c;
			$query4 = mysqli_query($con, "SELECT * from attendance where sub_code='$subjects_sub_code' and s_id='$table_id'");
			$exists4 = mysqli_num_rows($query4); 

			if($exists4 > 0) 
			{
				while($row = mysqli_fetch_assoc($query4)) 
				{
					$classes_attended = $row['classes_attended'];
				}
			}

			if($code == $c)
			{
				mysqli_query($con, "UPDATE attendance SET classes_attended = '$classes_attended'+1 WHERE (s_id='$table_id' and sub_code = '$subjects_sub_code')");
			}
			
	}
	}
	//echo $c."<br>";
	
	Print '<script>window.location.assign("home.php");</script>';

?>