<?php
include('fatal_message.php');
echo '<head>
<title>Create New Post</title>
<link rel="stylesheet" type="text/css" href="notice-board.css" /> 
</head>
<body bgcolor="black">';

	if(!isset($_SESSION))
	session_start();

	$_SESSION['page']='notice_board';
	
	if($_SESSION['logout']==1)
	error_message("<font color=\"red\" face=\"Rockwell\">Please Login to Continue.","homepage-new.php");
	else 
	{
	echo '<div id="container">
	
	
	<div id="header">
	<table width=100%>
	<tr>
	<td align="left"><a href="homepage-login.php"><img src="logo-small.jpg"></a></td>
	<td><h1><font face="Rockwell" color="red" >Create New Post</font></h1></td>
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
	<p><font face="Imprint MT Shadow" size="5" color="white"><center>Hi! Here You can Create A New Post!<br>Your Post can consist of either of the following:</center>
	<ul>
	<li>Text</li>
	<li>Image</li>
	</ul>
	<br>
	Your Text May Contain Contact Info, Venue, Date, etc, Or You can just cover it up in the Image.
	Let\'s Begin:</p>
	<form action="check_new_post.php" method="POST">
	Your Post Will Contain:<br>
	<select name="selection">
	<option value="text_only">1. Text Only</option>
	<option value="image_only">2. Image Only</option>
	<option value="both">3. Both</option>
	</select>
	<center><input type="submit" value="Next" name="submit"></center>
	</form>
	</div>
	</div>
	</div>
	
</body>';
	}
	?>