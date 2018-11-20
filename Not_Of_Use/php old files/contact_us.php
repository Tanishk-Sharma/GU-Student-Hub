<?php
echo '<head>
<title>Contact Us</title>
<link rel="stylesheet" type="text/css" href="notice-board.css" /> 
</head>
<body>';
	
	include('fatal_message.php');

	if(!isset($_SESSION))
	session_start();

	if($_SESSION['logout']==1)
	error_message("<font color=\"red\" face=\"Rockwell\">Please Login to Continue.","homepage-new.php");
	else
	{
	echo '<div id="container">
	
	
	<div id="header">
	<table width=100%>
	<tr>
	<td align="left"><a href="homepage-login.php"><img src="logo-small.jpg"></a></td>
	<td><h1><font face="Rockwell" color="red" >Contact Us</font></h1></td>
	<td align="right"><a href="logout.php?logout_yes=1">Logout</a></td></tr>
	</table>
	</div>
	
	<div id="main">
	<div id="sidebar">
	<ul type=none>
	<li><a href="homepage-login.php">Home</a></li><br>
	<li><a href="About.php">About</a></li><br>
	<li><a href="contact_us.php">Contact Us</a></li><br>
	</div>
	

	<div id="content">
	<p><font color="red">For Any Enquiry, Please Contact any of the following people:<br><br>
Tanishk Sharma : 180949048901
</font></p>
	</div>
	</div>
	<div id="footer">
	<font color="white"><p align="right"">Site Created By:<br>Tanishk Sharma</p></font>
	
	</div>
	</div>

</body>';
	}
	?>
