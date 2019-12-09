<html>
	<head>
		<title>Home</title>
	</head>
	
	<body style="background-color:rgb(229,255,204); color:black">
	<a href="index.php" style="color:rgb(0,0,102)">Click here to logout</a><br/><br/>
	<br><br>
		<?php
			session_start(); //starts the session
			if($_SESSION['user']){ //checks if user is logged in
			}
			else{
				header("location:index.php"); // redirects if user is not logged in
			}
			$s_user = $_SESSION['user']; //assigns user value
		?>
		
		<h1 style="margin: 0px 50px;"><?php Print "$s_user"?></h1><br><br>
		
		<div align="left" style="margin: 0px 50px;">
			<?php 

				$con = mysqli_connect("localhost", "root","") or die(mysqli_error()); 
				mysqli_select_db($con,"Attend") or die("Cannot connect to database"); 
				$query = mysqli_query($con,"SELECT * from users WHERE username='$s_user'");
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
				$query2 = mysqli_query($con, "SELECT * from student where s_id='$table_id'");
				$exists2 = mysqli_num_rows($query2); 
				$student_sem = "";

				if($exists2 > 0) 
				{
					while($row = mysqli_fetch_assoc($query2)) 
					{
						$student_sem = $row['sem'];
					}
				}
				
				$query3 = mysqli_query($con, "SELECT * from subjects where sem='$student_sem'");
				$exists3 = mysqli_num_rows($query3); 
				$subjects_sub_code = "";
				$subjects_sub_name = "";
				$subjects_total_classes = "";

				if($exists3 > 0) 
				{
					Print '<select style="height: 30px; width: 500px;">';				
					while($row = mysqli_fetch_assoc($query3)) 
					{
						$subjects_sub_code = $row['sub_code'];
						$subjects_sub_name = $row['sub_name'];
						$subjects_total_classes = $row['total_classes'];
						
						Print '<option id="'.$subject_sub_name.'">'.$subjects_sub_name.'</option>';
					}
					Print '</select>';
				}
				
			?>
			<br>
			<form action="addAttendance.php" method="POST">			
				<h3>Code: <input type="code" name="code" id="code" style="margin-top: 10px; height: 30px; width: 450px;"></input>    </h3><br/>
				<input type="submit" value="submit" style="margin-top:10px; height: 30px; width: 120px; margin-left: 31%;"></input>
			</form>		
		</div>
		
		<h2 align="center">My Attendance</h2>
		
		<table align="center" border="1px" width="80%">
			<tr>
				<th>subject</th>
				<th>total no. of classes</th>
				<th>classes attended</th>
			</tr>
			<?php		
				$query3 = mysqli_query($con, "SELECT * from subjects where sem='$student_sem'");
				$exists3 = mysqli_num_rows($query3); 
				$subjects_sub_code = "";
				$subjects_sub_name = "";
				$subjects_total_classes = "";

				$query4 = mysqli_query($con,"SELECT * from attendance WHERE s_id='$table_id'");
				$exists4 = mysqli_num_rows($query4);
				$classes_attended = "";

				if(($exists3 > 0) && ($exists4 > 0)) 
				{
					while(($row1 = mysqli_fetch_assoc($query3)) && ($row2 = mysqli_fetch_assoc($query4))) 
					{
						$subjects_sub_code = $row1['sub_code'];
						$subjects_sub_name = $row1['sub_name'];
						$subjects_total_classes = $row1['total_classes'];

						$classes_attended = $row2['classes_attended'];
						Print "<tr>";
						Print '<td align="center">'. $subjects_sub_name . "</td>";	
						Print '<td align="center">'. $subjects_total_classes . "</td>";
						Print '<td align="center">'. $classes_attended . "</td>";
						Print "</tr>";									
					}
				}								
				
			?>
		</table>
		
	</body>
</html>