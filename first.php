<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;
    background-color: rgb(229,255,204);
  }
form {border: 3px solid black;}

h1{
  font-family: Verdana, Geneva, Tahoma, sans-serif;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 15%;
  border-radius: 50%;
}

button{
	background-color: rgb(0,0,102);
	color: white;
	width: 30%;
	margin-top: 5px;
}
	
.login{
	text-align:center;
	display: block;
}


/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
}
</style>
</head>
<body>
<br><br><br>
<form action="login.php" method="POST">
    <div class="imgcontainer">
        <img src="img_avatar.png" alt="Avatar" class="avatar">
        <h1 style="color:rgb(0,0,102)">Present-Percent</h1>
    </div>
	<br>
	<h2 style="margin-left:25%; color:rgb(0,0,102)">login as</h2>
	<br>
	<div class="login">
		<a href="login.php"><button><h3> student</button></a><br>
		<a href="login.php"><button><h3> teacher</button></a><br>
		<a href="login.php"><button><h3> admin</button></a><br>
	</div>
	<br>
</form>	

</body>
</html>
