<head>
<title>Notice-Board!</title>
<link rel="stylesheet" type="text/css" href="notice-board.css" /> 
</head>
<body>

	<div id="container">
		
	<?php
	include('fatal_message.php');

	if(!isset($_SESSION))
	session_start();

	if($_SESSION['logout']==1)
	error_message("<font color=\"red\" face=\"Rockwell\">Please Login to Continue.","homepage-new.php");
	else
	{
	echo '<div id="header">
	<table width=100%>
	<tr>
	<td align="left"><a href="homepage-login.php"><img src="logo-small.jpg"></a></td>
	<td><h1><font face="Rockwell" color="red">About the Site</font></h1></td>
	<td align="right"><a href="logout.php?logout_yes=1">Logout</a></td></tr>
	<table>
	</div>
	
	<div id="main">
	<div id="sidebar">
	<ul type=none>
	<li><a href="homepage-login.php">Home</a></li><br>
	<li><a href="About.php">About</a></li><br>
	<li><a href="contact_us.php">Contact Us</a></li>
	</ul><br>
	</div>
	

	<div id="content">
	<p>Welcome to The Galgotias University Student site! This is Where All the Fun Begins!!</br></br>
-> The Site Offers The Feature to Check Out What\'s New going on in the University through the \'Notice-Board\' Page!</br></br>
-> Being in Touch with the faculty has never been easier!</br> The User has The option to View what their respective faculty have to say about the subject, Provide Hints and Solutions, Give Question of the Days and so on... through the \'A Wise Word\' Page!</br></br>
->Last, But not the Least! Study Material uploaded By the Faculty to aid the Students in their endeavour to Succeed! Users can Easily Download these files to view them later!</br></br>
</br></br>
For Further Info, Please View Contact Us <a href="contact_us.php"><u>here</u></a></p>
	</div>
	</div>
	<div id="footer">
	<font color="white"><p align="right"">Site Created By:<br>Tanishk Sharma</p></font>
	
	</div>
	</div>

</body>';
	}
?>
