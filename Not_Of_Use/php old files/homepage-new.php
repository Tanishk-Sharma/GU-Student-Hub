<?php

	if(!isset($_SESSION))
	session_start();

	if(isset($_SESSION['username']))//STILL LOGGED IN...
	include('homepage-login.php');
	else
	{
	echo '<html>
<head><title>My Homepage</title>
<link rel="stylesheet" type="text/css" href="homepagestyle.css" /> 
</head>
<body bgcolor="black" link="yellow" alink="red">
<center>
	<table>
	<tr>
		<td>
		<img src="6923206-original12.jpg" alt="Galgotias University">
		</td>
	
		<td>
			<table cellpadding=40px width=336px>
				<tr bgcolor=#6495ED >
					<td align="left">
					<p align="center">
					<font size="7" color="darkgreen" face="Jokerman">
					Login
					</font>
					</p>
					</td>
				</tr>
				
				<tr>
			
				<table bgcolor=#008B8B width=333px cellpadding=5px>
				<form action="login.php" method="POST">
					<tr>
					<td align="right">
					
						<img src="usernamepic.png" width="50" height="50">
					</td><td>
						<input name="username" type="text" placeholder="Username or Email" autofocus>
					</td>	
						
					</tr>
					
					<tr>
						
							<td align="right">
								<img src="passwordpic.png" width="50" height="50">
							</td><td>
								<input name="password" type="password" placeholder="Password" method="POST">
							</td>	
						
					</tr>
					
					<tr>
					<td></td>
						<td align="center">
							<font face="Rockwell">Login As:<select name="login_select">
							<option value="others">Others
							<option value="faculty">Faculty
							</select>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="image" src="gobutton.png" alt="Submit" width="70" height="70">
						</td>
					</tr>
					<tr>
						<td></td><td>
							<p><br><br><br><br><font color="blue" face="Rockwell">New Here? <a href="register_as_what.html">Sign Up!</a></font></p>
						</td>
					</tr>
				 
				 </table>
				 </tr>
				 </table>
		</td>
				
				</tr>
			</table>
	
</center>
</body>
</html>';
}
?>