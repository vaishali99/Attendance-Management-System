<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: Arial, Helvetica, sans-serif;
                background-color: rgb(233, 233, 255);
            }
            
            button {
                display: inline-block;
				width: 300px;
                padding: 8px 20px;
                border: 1px solid black;
                background-color: rgb(170, 200, 214);
                color: rgb(0, 0, 0);
                margin: 8px 30px;
                border: none;
                cursor: pointer;
            }

            button:hover {
                opacity: 0.8;
            }

            .container {
                padding: 16px;
            }
        </style>
    </head>
	<?php
		session_start(); //starts the session
		if($_SESSION['user']){ //checks if user is logged in
		}
		else{
			header("location:index.php"); // redirects if user is not logged in
		}
		$a_user = $_SESSION['user']; //assigns user value
		$con = mysqli_connect("localhost", "root","") or die(mysqli_error()); //Connect to server
		mysqli_select_db($con,"Attend") or die("Cannot connect to database"); //connect to database
		$query = mysqli_query($con,"SELECT * from users WHERE username='$a_user'");
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
		
		$query2 = mysqli_query($con,"SELECT * from subjects WHERE t_id='$table_id'");
		$exists2 = mysqli_num_rows($query2);
		$sub_name = "";
		$sub_code = "";
		
		if($exists2 > 0) 
		{
			while($row = mysqli_fetch_assoc($query2))
			{
				$sub_name = $row['sub_name'];
				$sub_code = $row['sub_code'];
			}
		}	
		
	?>
	<body style="background-color:rgb(229,255,204); color:black">
		<a href="index.php" style="color:rgb(0,0,102)">Click here to logout</a><br><br><br><br>  
 		
		<h1 style="margin: 0px 50px;"><?php Print "$a_user"?></h1><br><br>
		<h3 style="margin: 0px 50px;"><?php Print "$sub_name"?></h3><br><br><br><br><br>
		
		<form action="addAtt1.php" method="POST">
		<div class="container">
			<table border="0.5" >
				<tr>
					<td><label for="id">ID</label></td>
					<td><input type="text" name="id" id="id" style="width: 300px;"></td>
				</tr>
				<tr>
					<td><label for="sub_name">Subject Name</label></td>
					<td><input type="sub_name" name="sub_name" id="sub_name" style="width: 300px;"></input></td>
				</tr>
				<tr>
					<td><label for="sub_code">Subject Code</label></td>
					<td><input type="sub_code" name="sub_code" id="sub_code" style="width: 300px;"></input></td>
				</tr>

				<tr>
				<td><input type="submit" value="Submit" style="margin-left: 300%; margin-top: 10%;"/>				
				</tr>
			</table>

		</div>
		</form>

    </body>
</html>