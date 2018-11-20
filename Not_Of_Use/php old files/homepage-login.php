<?php


	if(!isset($_SESSION))
	session_start();
if($_SESSION['logout']==1){
	include('fatal_message.php');
	error_message("<font color=\"red\" face=\"Rockwell\">Please Login to Continue.", "homepage-new.php");
}
else 
{
	//NAME TO BE DISPLAYED BELOW 'WELCOME'
$name=substr($_SESSION['username'],0,strpos($_SESSION['username'],'@'));
if(strlen($name)>=15)
	$name=substr($name,0,14);
	echo '<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="notice-board.css" />
</head>


	<body bgcolor="black">

	<center>

	<table cellpadding=18px>

	<tr>
	<td><font face="Jokerman" size="5" color="red"><p align="left">Welcome</p></font><br><font face="Rockwell" color="red" size="6"><p align="right">'.$name.'</p></font></td>
	<td><a href="About.php"><img src="6923206-original12.jpg" width=656px height=256px alt="Galgotias University"></a></td>.
	<td>
	<table width=100%><tr>
	<td align="right"><a href="logout.php?logout_yes=1" style="text-decoration:none;">Logout</a></td></tr>
	<tr><td align="left"><font face="Jokerman" size="6" color="red" >'.date("M\ j\ Y").'</font></td>
	</tr>
	</table>
	
	<tr>
	<td><a href="notice-board.php"><img src="button2.jpg" alt="Notice-Board"></a></td>
	<td><center><a href="a_wise_word.php"><img src="button3.jpg" alt="A-Wise-Word"></a></center></td>
	<td><img src="button4.jpg" alt="My-Notes"></td>
	</tr>

	</table>

	</center>
	</body>
	</html>';
}
?>