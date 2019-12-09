<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: Arial, Helvetica, sans-serif;
                background-color: rgb(233, 233, 255);
            }
            
            button:hover {
                opacity: 0.8;
            }

            .container {
                padding: 16px;
            }
        </style>
    </head>
	
	<body style="background-color:rgb(229,255,204); color:black">
		<form action="addStu1.php" method="POST">
			<div class="container" align="center" style="margin-top: 15%;">
				<table border="0.5" >
					<tr>
						<td><label for="username">User Name</label></td>
						<td><input type="text" name="username" id="username" style="width: 300px;"></td>
					</tr>
					<tr>
						<td><label for="id">ID</label></td>
						<td><input type="text" name="id" id="id" style="width: 300px;"></td>
					</tr>
					<tr>
						<td><label for="password">Password</label></td>
						<td><input type="password" name="password" id="password" style="width: 300px;"></input></td>
					</tr>
					<tr>
						<td><label for="sem">Sem</label></td>
						<td><input type="sem" name="sem" id="sem" style="width: 300px;"></input></td>
					</tr>
					
					<tr>
						<td><input type="submit" value="Submit" style="margin-left: 400%; margin-top: 10%;"/>				
					</tr>
				</table>
			</div>
		</form>
    </body>
</html>