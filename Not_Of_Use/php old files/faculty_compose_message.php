	<?php
	echo '<head>
<title>Compose Message</title>
<link rel="stylesheet" type="text/css" href="notice-board.css" /> 
</head>
<body bgcolor="black">';

	include('fatal_message.php');

	if(!isset($_SESSION))
	session_start();
	$_SESSION['page']='faculty_messages';
	if($_SESSION['logout']==1)
	error_message("<font color=\"red\" face=\"Rockwell\">Please Login to Continue.","homepage-new.php");
	else
	{		
	echo '<div id="container">
	
	
	<div id="header">
	<table width=100%>
	<tr>
	<td align="left"><a href="homepage-login.php"><img src="logo-small.jpg"></a></td>
	<td><h1><font face="Rockwell" color="red" >Compose New Message</font></h1></td>
	<td align="right"><a href="logout.php?logout_yes=1">Logout</a></td></tr>
	<table>
	
	
	</div>
	
	<div id="main">
	<div id="sidebar">
	<ul type=none>
	<font face="Rockwell" color="red">
	<li><a href="homepage-login.php">Home</a></li><br>
	<li><a href="faculty_compose_message.php">Compose Message</a></li><br>
	<li><a href="About.php">About</a></li><br>
	<li><a href="contact_us.php">Contact Us</a></li>
	</font>
	</ul><br>
	</div>

	<div id="content">
	<p><font face="Imprint MT Shadow" size="5" color="white"><center>Welcome. Please Follow These Instructions:<br>Your Message can consist of either of the following:</center>
	<ul>
	<li>Text</li>
	<li>Image</li>
	</ul>
	<br>
	<form action="check_new_post.php" method="POST">
	Your Message Will Contain:<br>
	<select name="selection">
	<option value="text_only">1. Text Only</option>
	<option value="image_only">2. Image Only</option>
	<option value="both">3. Both</option>
	</select><br><br><br><br>
	
	<center><input type="submit" value="Next" name="submit"></center>
	</form>
	

	</div>
	</div>
	</div>
	
</body>';
	}
