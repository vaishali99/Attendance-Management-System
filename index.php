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

input[type=text], input[type=password], input[type=type] {
  width: 130%;
  height: 6%;
  padding: 5% 5%;
  margin: 0% 0%;
  display: inline-block;
  border: 1px solid black;
  box-sizing: border-box;
}

span.segmented-control {
    background-color:rgb(233, 233, 255);
    display:inline-block;
    margin: 10px 500px;
    padding: 5px;
}

input[type=submit]{
	background-color: rgb(0,0,102);
  color: rgb(229,255,204);
  padding: 10px 10px;
  margin: 20px 0;
  border: none;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 15%;
  border-radius: 50%;
}

.container {
  padding: 15px;
  margin: 10px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  
}
</style>
        <title>Present-Percent</title>
    </head>
    <body>
	<h1 style="text-align: center">Welcome</h1>
<br><br>
        <form action="checklogin.php" method="POST">
			<div class="imgcontainer">
				<img src="img_avatar.png" alt="Avatar" class="avatar">
				<h1 style="color:rgb(0,0,102)">Present-Percent</h1>
			</div>

			<div class="container" align="center" style="margin-left: -10%">
			    <table border="0.5" >
            <tr>
                <td><label for="username">UserName</label></td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password"></input></td>
            </tr>
			<tr>
				<td><label for="type">Type</label></td>
                <td><input type="type" name="type" id="type"></input></td>
            </tr>
			
            <tr>
                <td><input type="submit" value="Submit" />				
            </tr>
        </table>
			</div>
		</form>
		   
    </body>
</html>