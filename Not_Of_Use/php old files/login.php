<?php
include('fatal_message.php');
include('decrypt.php');
$flag=0;//assuming login unsuccessful
$i=0;
$username=trim($_POST["username"]);
$password=trim($_POST["password"]);
if(strcmp($_POST['login_select'],'others')==0)
{
if(!empty($username) || !empty($password)) //Not left a FIELD blank
{
$myfile=fopen("other_users.txt","r") or die("Error! File Not Found!");

while(!feof($myfile))
{
		$record=explode(" | ",trim(fgets($myfile)));
		if(!empty($record[0])) //TROUBLESHOOTING: a new line was transferred onto the array as a blank record, causing problems. so checking is done.
		{
		$uname=decrypt($record[0]);
		$pword=decrypt($record[1]);
		
		if((strcmp($username,$uname)==0) && (strcmp($password,$pword)==0))
		{
			session_start();
			$_SESSION['username']=$uname;
			$_SESSION['login_type']='others';
			$_SESSION['batch_name']=strtoupper(decrypt($record[2]));
			$_SESSION['logout']=0;
		$flag=1;
		include('homepage-login.php');
		break;
		}
		}		
}
fclose($myfile);
}
		if($flag==0)
		error_message("<font color=\"orange\">Incorrect Info!</font>","homepage-new.php");
}

//---------------------------------------------------------------------------------------------------//

if(strcmp($_POST['login_select'],'faculty')==0)
{
if(!empty($username) || !empty($password))
{
$myfile=fopen("faculty_users.txt","r") or die("Error! File Not Found!");

while(!feof($myfile))
{
		$allinfo=trim(fgets($myfile));
		$spaceindex=strpos($allinfo," ");
		$uname=trim(substr($allinfo,0,$spaceindex));
		$spaceindex++;
		$pword=trim(substr($allinfo,$spaceindex));
		$uname=decrypt($uname);
		$pword=decrypt($pword);
		if((strcmp($username,$uname)==0) && (strcmp($password,$pword)==0))
		{
			session_start();
			$_SESSION['username']=$uname;
			$_SESSION['login_type']='faculty';
			$_SESSION['logout']=0;
		$flag=1;
		include('homepage-login.php');
		break;
		}
		
}
fclose($myfile);
}
		if($flag==0)
		error_message("<font color=\"blue\">Incorrect Info!</font>","homepage-new.php");	
}	
	


?>