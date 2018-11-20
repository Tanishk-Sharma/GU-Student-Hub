<?php
	if(!isset($_SESSION))
	session_start();
	if($_SESSION['logout']==1){
		include('fatal_message.php');
		error_message("<font color=\"red\" face=\"Rockwell\">Please Login to Continue.", "homepage-new.php");
	}else {
		//NAME TO BE DISPLAYED BELOW 'WELCOME'
		$name=substr($_SESSION['username'],0,strpos($_SESSION['username'],'@'));
		if(strlen($name)>=15)
			$name=substr($name,0,14);
		echo '
				<html>
				<head>
					<title>Homepage</title>
					<link rel="stylesheet" type="text/css" href="notice-board.css" />
					<style>
					.words{
						font-family: "Jokerman";
						font-size: 35px;
						color: red;
					}
					.words2{
						font-family: "Times New Roman", Times, serif;
						font-size: 25px;
						color: red;
					}
					</style>
				</head>


					<body bgcolor="black">

					<center>

					<table cellpadding=18px>
					<!--newwww -->
					
					<!--newwww -->
					<tr>
					<td><font face="Jokerman" size="5" color="red"><p align="left">Welcome</p></font><br><font face="Rockwell" color="red" size="6"><p align="right">'.$name.'</p></font></td>
					<td><a href="About.php"><img src="6923206-original12.jpg" width=656px height=256px alt="Galgotias University"></a></td>.
					<td>
					<table width=100%>
					<tr>
					<td align="right"><a href="logout.php?logout_yes=1" style="text-decoration:none;">Logout</a></td>
					</tr>
					<tr>
					<td align="left"><font face="Jokerman" size="6" color="red" >'.date("M\ j\ Y").'</font></td>
					</tr>
					</table>
					<tr>
					<th class="words">Available: </th><th class="words">Unavailable</th>
					</tr>
					<tr>
					<td>
					<ul>
					<li class="words2">Projectors (Only few left!)</li>
					<li class="words2">Tripod Stands</li>
					<li class="words2">Markers</li>
					</ul>
					</td>
					<td>
					<ul>
					<li class="words2">Classrooms</li>
					<li class="words2">Seminar Halls</li>
					<li class="words2">Auditoriums</li>
					</ul>
					</td>
					</tr>
					
					
					</table>

					</center>
					</body>
					</html>
					';
}
?>