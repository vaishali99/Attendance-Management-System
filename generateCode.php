<?php 
$n=10; 
function generateCode($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
	
    return $randomString; 
} 

session_start(); //starts the session
if($_SESSION['user']){ //checks if user is logged in
}
else{
	header("location:index.php"); // redirects if user is not logged in
}
$user = $_SESSION['user'];

$con = mysqli_connect("localhost", "root","") or die(mysqli_error());
mysqli_select_db($con,"Attend") or die("Cannot connect to database");

$query = mysqli_query($con,"SELECT * from users WHERE username='$user'");
$exists = mysqli_num_rows($query); //Checks if username exists

$table_users = "";
$table_id = "";

if($exists > 0) //IF there are no returning rows or no existing username
{
	while($row = mysqli_fetch_assoc($query)) //display all rows from query
	{
		$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		$table_id = $row['id']; // the first password row is passed on to $table_users, and so on until the query is finished
	}
}	

$query2 = mysqli_query($con, "SELECT * from subjects where t_id = '$table_id'");
$exists2 = mysqli_num_rows($query2); 

$subjects_sub_code = "";
$subjects_sub_name = "";
$subjects_sem = "";
$subjects_total_classes = "";

if($exists2 > 0) //IF there are no returning rows or no existing username
{
	while($row = mysqli_fetch_assoc($query2)) //display all rows from query
	{
		$subjects_sub_code = $row['sub_code'];
		$subjects_sub_name = $row['sub_name'];
		$subjects_sem = $row['sem'];
		$subjects_total_classes = $row['total_classes'];
	}
}	

$c = generateCode($n);
echo $c;

mysqli_query($con, "UPDATE code SET gcode = '$c' WHERE sub_code = '$subjects_sub_code'");


$startTime = strtotime("now");
$endTime = strtotime("now+10 seconds");

while(strtotime("now") < $endTime) {
	echo " ";
}

Print '<script>window.location.assign("teacher.php");</script>';

mysqli_query($con, "UPDATE code SET gcode = NULL WHERE sub_code = '$subjects_sub_code'");
mysqli_query($con, "UPDATE subjects SET total_classes = '$subjects_total_classes'+1 where sub_code='$subjects_sub_code'");


?> 