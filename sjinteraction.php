<?php
include('fatal_message.php');
echo '<head>
<title>Pass on the Torch</title>
<link rel="stylesheet" type="text/css" href="notice-board.css" /> 
</head>
<body>';
	if(!isset($_SESSION))
	session_start();
	$_SESSION['page']='pass_on_the_torch';
	if($_SESSION['logout']==1)
	error_message("<font color=\"red\" face=\"Rockwell\">Please Login to Continue.","homepage-new.php");
	else
	{
	echo '<div id="container">
	
	
	<div id="header">
	<table width=100%>
	<tr>
	<td align="left"><a href="homepage-login.php"><img src="logo-small.jpg"></a></td>
	<td><h1><font face="Rockwell" color="red" >Pass on the Torch!</font></h1></td>
	<td align="right"><a href="logout.php?logout_yes=1">Logout</a></td></tr>
	</table>
	</div>
	
	<div id="main">
	<div id="sidebar">
	<ul type=none>
	<li><a href="homepage-login.php">Home</a></li><br>
	<li><a href="orientation.php">Orientation</a></li><br>
	<li><a href="classes.php">Classes</a></li><br>
	<li><a href="About.php">About</a></li><br>
	</div>
	

	<div id="content">';
	echo'
	<!--<div id="footer">
	<font color="white"><p align="right"">Site Created By:<br>Tanishk Sharma</p></font>
	
	</div>-->
	</div>

</body>';
	}
	?>
