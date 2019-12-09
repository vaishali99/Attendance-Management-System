<?php
	session_start();
	$id = $_POST['id'];
	$sub_code = $_POST['sub_code'];
	$sub_name = $_POST['sub_name'];
	
	$con = mysqli_connect("localhost", "root","") or die(mysqli_error()); 
	mysqli_select_db($con,"Attend") or die("Cannot connect to database"); 
	
	$query = mysqli_query($con, "Select * from users where id='$id'");
	$exists = mysqli_num_rows($query);
	
	if($exists>0)
	{
		$query2 = mysqli_query($con, "Select * from attendance where s_id='$id' and sub_code='$sub_code'");
		$exists2 = mysqli_num_rows($query2);
		$att = "";
		
		if($exists>0)
		{
			while($row = mysqli_fetch_assoc($att))
			{
				$att = $row['classes_attended'];
				mysqli_query($con, "INSERT INTO attendance (s_id, sub_code, classes_attended) VALUES('$s_id','$sub_code','$att+1')");
			}			
		}
	}
	else
	{
		Print '<script>alert("Incorrect Data!");</script>';
		Print '<script>window.location.assign("admin.php");</script>';
	}

?>