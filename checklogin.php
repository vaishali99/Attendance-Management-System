<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$type = $_POST['type'];
	$con = mysqli_connect("localhost", "root","") or die(mysqli_error()); //Connect to server
	mysqli_select_db($con,"Attend") or die("Cannot connect to database"); //Connect to database
	$query = mysqli_query($con,"SELECT * from users WHERE username='$username'"); //Query the users table if there are matching rows equal to $username
	$exists = mysqli_num_rows($query); //Checks if username exists
	$table_users = "";
	$table_password = "";
	$table_type = "";
	echo $table_type;
	if($exists > 0) //IF there are no returning rows or no existing username
	{
		while($row = mysqli_fetch_assoc($query)) //display all rows from query
		{
			$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
			$table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
			$table_type = $row['user_cat'];
		}
		if(($username == $table_users) && ($password == $table_password)) // checks if there are any matching fields
		{
				if($password == $table_password)
				{
					$_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
					if($type == $table_type)
					{
						if($type == 's')
						{
							header("location: home.php"); // redirects the user to the authenticated home page							
						}
						else if($type == 't')
						{
							header("location: teacher.php");
						}
						else if($type == 'a')
						{
							header("location: admin.php");
						}
					}
					else
					{
						Print '<script>alert("Incorrect Type!");</script>'; //Prompts the user
						Print '<script>window.location.assign("index.php");</script>'; // redirects to login.php
					}
				}
				
		}
		else
		{
			Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
			Print '<script>window.location.assign("index.php");</script>'; // redirects to login.php
		}
	}
	else
	{
		Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
		Print '<script>window.location.assign("index.php");</script>'; // redirects to login.php
	}
?>