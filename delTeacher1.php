<?php
	session_start();
	$id = $_POST['id'];
	
	$con = mysqli_connect("localhost", "root","") or die(mysqli_error()); 
	mysqli_select_db($con,"Attend") or die("Cannot connect to database"); 
	
	$query = mysqli_query($con, "Select * from users where id='$id'");
	$exists = mysqli_num_rows($query);
	
	if($exists>0)
	{
		mysqli_query($con, "DELETE from users where id='$id'");

		$sub = mysqli_query($con, "select * from subjects where t_id = '$id'");
		$exists2 = mysqli_num_rows($sub);
		$sub_code = "";
		if($exists2>0)
		{
			while($row = mysqli_fetch_assoc($sub))
			{
				$sub_code = $row['sub_code'];
				mysqli_query($con, "DELETE from code where sub_code = '$sub_code'");
				mysqli_query($con, "DELETE from attendance where sub_code = '$sub_code'");
			}			
		}		
		
		mysqli_query($con, "DELETE from subjects where t_id='$id'");
		
		Print '<script>alert("User Deleted!");</script>';
		Print '<script>window.location.assign("admin.php");</script>';
	}
	else
	{
		Print '<script>alert("Incorrect Data!");</script>';
		Print '<script>window.location.assign("admin.php");</script>';
	}

?>