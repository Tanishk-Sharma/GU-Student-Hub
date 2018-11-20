<?php
include('fatal_message.php');
include('posts_handler.php');
echo '<head>
<title>Notice-Board!</title>
<link rel="stylesheet" type="text/css" href="notice-board.css" /> 
</head>
<body>';
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
	<td><h1><font face="Rockwell" color="red" >Notice-Board!</font></h1></td>
	<td align="right"><a href="logout.php?logout_yes=1">Logout</a></td></tr>
	</table>
	</div>
	
	<div id="main">
	<div id="sidebar">
	<ul type=none>
	<li><a href="homepage-login.php">Home</a></li><br>
	<li><a href="upload.php">Create a Post</a></li><br>
	<li><a href="About.php">About</a></li><br>
	<li><a href="contact_us.php">Contact Us</a></li><br>
	</div>
	

	<div id="content">';
	$page_to_read=empty($_GET['page'])?counting_files():$_GET['page'];

	function display_records($page_to_read)
	{
	$record=array('indicator','date','username','text','img_path');//template for record array
	$myfile=fopen('C:\\wamp\\www\\New folder\\notice_records\\'.$page_to_read,"r") or die("Sorry, File Not Found...");
	$post_separator="----------------------------------------------------------";
	$i=0;
	$flag=0;//indicator for text input
		while(!feof($myfile))
	{	
		$line=trim(fgets($myfile));
		if(strcmp($line,$post_separator)!=0)//record separator
		{
		$record[$i]=$line;
		while($flag==0 && $i>=3)// Taking multiline text
		{	
			$checker=substr($record[3],-6);// the </pre> tag at the end of message
			if(strcmp($checker,'</pre>')==0)
			{
				$flag=1;
				break;
			}
			else
			{
				$record[3]=$record[3]."<br>".trim(fgets($myfile));
				continue;
			}
		}

		$i++;
		continue;
		}
		
		//RECORD COMPILED, NOW DISPLAYING THE RECORD:
		
		if(strcmp($record[0],'(txt)')==0)
			echo '<hr><font color="red"><p align="right">'.$record[1].'</p></font><font color="red" size="5"><u><i><p align="left">'.$record[2].' </i></u></font><font color="red">says:</p>'.$record[3].'</font>';
		
		if(strcmp($record[0],'(img)')==0)
			echo '<hr><font color="red"><p align="right">'.$record[1].'</p></font><font color="red" size="5"><u><i><p align="left">'.$record[2].' </i></u></font><font color="red">says:</p><br><center><a href=\'notice_images\\'.$record[4].'\' target="_blank"><img style="max-width:950px; max-height:350px;" src=\'notice_images\\'.$record[4].'\'></a><br><br></font></center>';
		
		if(strcmp($record[0],'(both)')==0)
			echo '<hr><font color="red"><p align="right">'.$record[1].'</p></font><font color="red" size="5"><u><i><p align="left">'.$record[2].' </i></u></font><font color="red">says:</p>'.$record[3].'</font><br><center><a href=\'notice_images\\'.$record[4].'\' target="_blank"><img style="max-width:950px; max-height:350px;" src=\'notice_images\\'.$record[4].'\'></a></img><br><br></font></center>';
		//--------REINITIALIZING VARIABLES FOR THE NEXT RECORD-------
		$flag=0;
		$i=0;
	}
	
	fclose($myfile);
	}
	display_records($page_to_read);
	$position_of_dot=strpos($page_to_read,".");
    $filename_only=substr($page_to_read,0,$position_of_dot);
	
	if(strcmp($page_to_read,'1.txt')!=0)		
	{
		if((strcmp($page_to_read,counting_files())==0))
			echo '<br><br><center><font face="Lucida Calligraphy"><i><u>
		<p><a href="notice-board.php?page='.($filename_only-1).'.txt">Next Page</a></p></u></i></font></center>';
		else
			echo '<br><br><center><font face="Lucida Calligraphy"><i><u><p><a href="notice-board.php?page='.($filename_only+1).'.txt">Previous Page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="notice-board.php?page='.($filename_only-1).'.txt">Next Page</a></p></u></i></font></center>';
	}
	else
	{
		if((strcmp($page_to_read,counting_files())==0))
			echo '<br><br><center><font color="red"><p>--------------x--------------</p></font>
			<font face="Lucida Calligraphy" color="red"><i><u><p>
			End Of Posts</p></u></i></font></center>';
		
		else
			echo '<br><br><center><font face="Lucida Calligraphy" color="red"><i><u><p><a href="notice-board.php?page='.($filename_only+1).'.txt">Previous Page</a></p></u></i></font><font color="red"><p>--------------x--------------</p></font>
			<font face="Lucida Calligraphy" color="red"><i><u><p>
			End Of Posts</p></u></i></font></center>';
		unset($_GET['page']);
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
