<?php
	session_start();
	$id = $_POST['id'];
	
	$con = mysqli_connect("localhost", "root","") or die(mysqli_error()); //Connect to server
	mysqli_select_db($con,"Attend") or die("Cannot connect to database"); //Connect to database
	
	$query = mysqli_query($con, "Select * from users where id='$id'");
	$exists = mysqli_num_rows($query);
	
	if($exists>0)
	{
		mysqli_query($con, "DELETE from users where id='$id'");
		mysqli_query($con, "DELETE from student where id='$id'");
		Print '<script>alert("User Deleted!");</script>';
		Print '<script>window.location.assign("admin.php");</script>';
	}
	else
	{
		Print '<script>alert("Incorrect Data!");</script>';
		Print '<script>window.location.assign("admin.php");</script>';
	}

?>