<?php
include('fatal_message.php');
echo '<head>
<title>Upload Text</title>
<link rel="stylesheet" type="text/css" href="notice-board.css" /> 
</head>
<body>';
	


	if(!isset($_SESSION))
	session_start();

	if($_SESSION['logout']==1)
	error_message('<font color="red" face="Rockwell">Please Login to Continue.','homepage-new.html');
	else
	{
		echo '<div id="container">
	
	
	<div id="header">
	<table width=100%>
	<tr>
	<td align="left"><a href="homepage-login.php"><img src="logo-small.jpg"></a></td>
	<td><h1><font face="Rockwell" color="red" >Upload Text</font></h1></td>
	<td align="right"><a href="logout.php?logout_yes=1">Logout</a></td></tr>
	<table>
	
	</div>
	
	<div id="main">
	<div id="sidebar">
	<ul type=none>
	
	<li><a href="homepage-login.php">Home</a></li><br>
	<li><a href="upload.php">Create a Post</a></li><br>
	<li><a href="About.php">About</a></li><br>
	<li><a href="contact_us.php">Contact Us</a></li><br>
	</div>
	

	<div id="content">
	<p><font face="Imprint MT Shadow" size="5" color="blue"><center>Ok! So <i>You</i> selected Both Text & Image For Your New Post!<br>Let\'s Get on With it then: </center>
	<h4>Step-I: Text</h4>
	<form action="both_post_1.php" method="post" align="center">
	<textarea name="post_text" rows=5 cols=100></textarea>
	<br>
	<input type="submit" value="Next!" name="submit" align="right">
	</form>
	

	</div>
	</div>
	</div>
	
</body>';
	}
	?>
