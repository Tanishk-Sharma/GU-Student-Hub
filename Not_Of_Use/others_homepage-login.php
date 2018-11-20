<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
echo '<html>
	<head><title>Homepage</title></head>


	<body bgcolor="black">

	<center>

	<table cellpadding=18px>

	<tr>
	<td><font face="Jokerman" size="5" color="red"><p align="left">Welcome</p><br><p align="right">'.$_SESSION['username'].'</p></font></td>
	<td><a href="About.html"><img src="6923206-original12.jpg" width=656px height=256px alt="Galgotias University"></a></td>.
	<td>
	<table width=100%><tr>
	<td align="right"><a href="logout.php?logout_yes=1" style="text-decoration:none;">Logout</a></td></tr>
	<tr><td align="left"><font face="Jokerman" size="6" color="red" >'.date("M\ j\ Y").'</font></td>
	</tr>
	</table>
	
	<tr>
	<td><a href="notice-board.php"><img src="button2.jpg" alt="Notice-Board"></a></td>
	<td><center><a href="others_a_wise_word.php"><img src="button3.jpg" alt="A-Wise-Word"></a></center></td>
	<td><img src="button4.jpg" alt="My-Notes"></td>
	</tr>

	</table>

	</center>
	</body>

</html>';

?>