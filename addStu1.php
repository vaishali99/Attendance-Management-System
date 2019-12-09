<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$id = $_POST['id'];
	$sem = $_POST['sem'];
	
	$con = mysqli_connect("localhost", "root","") or die(mysqli_error()); //Connect to server
	mysqli_select_db($con,"Attend") or die("Cannot connect to database"); //Connect to database
	
	$query = mysqli_query($con, "Select * from users where username='$username'");
	$exists = mysqli_num_rows($query);
	
	if($exists<1)
	{
		mysqli_query($con, "INSERT INTO users (username, id, password, user_cat) VALUES('$username','$id','$password','s')");
		mysqli_query($con, "INSERT INTO student (s_id, sem) VALUES('$id','$sem')");
		$att = mysqli_query($con, "select * from subjects where sem = '$sem'");
		$exists2 = mysqli_num_rows($att);
		$sub_code = "";
		
		if($exists2>0)
		{
			while($row = mysqli_fetch_assoc($att))
			{
				$sub_code = $row['sub_code'];
				mysqli_query($con, "INSERT INTO attendance (s_id, sub_code, classes_attended) VALUES('$id','$sub_code','0')");
			}			
		}
	
		Print '<script>alert("Student Added!");</script>';
		Print '<script>window.location.assign("admin.php");</script>';
	}
	else
	{
		Print '<script>alert("Username Already Exists!");</script>';
		Print '<script>window.location.assign("admin.php");</script>';
	}

?>