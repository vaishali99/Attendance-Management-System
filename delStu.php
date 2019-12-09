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
	
	<body style="background-color:rgb(229,255,204); color:black">
		<form action="delStu1.php" method="POST">
			<div class="container" align="center" style="margin-top: 15%;>
				<table border="0.5" >
					
					<tr>
						<td><label for="id">ID</label></td>
						<td><input type="text" name="id" id="id" style="width: 300px;"></td>
					</tr>
					<tr>
						<td><input type="submit" value="Submit" />				
					</tr>
				</table>
			</div>
		</form>
    </body>
</html>