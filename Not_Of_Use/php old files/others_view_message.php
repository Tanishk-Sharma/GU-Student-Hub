<?php
include('fatal_message.php');
echo '<head>
<title>A Wise Word..</title>
<link rel="stylesheet" type="text/css" href="a-wise-word.css" /> 
</head>
<body>
<div id="container">';
	
	

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
	<td><h1><font face="Rockwell" color="red" >A Wise Word..</font></h1></td>
	<td align="right"><a href="logout.php?logout_yes=1">Logout</a></td></tr>
	</table>
	</div>
	
	<div id="main">
	<div id="sidebar">
	<ul type=none>
	<font face="Rockwell" color="red">
	<li><a href="homepage-login.php">Home</a></li><br>
	<li><a href="others_view_message.php">View Messages</a></li><br> 
	<li><a href="About.php">About</a></li><br>
	<li><a href="contact_us.php">Contact Us</a></li>
	</font>
	</ul><br>
	</div>
	

	<div id="content">';
	$batch_names_file=fopen("batch_names_file.txt","r") or die("Sorry! File Not Found.");
	while(!feof($batch_names_file))
	{
		$batch_name=fgets()
	}
	
	echo '</div>
	</div>
	<div id="footer">
	<font color="white"><p align="right"">Site Created By:<br>Tanishk Sharma</p></font>
	
	</div>
	</div>
	</body>';
	}

?>