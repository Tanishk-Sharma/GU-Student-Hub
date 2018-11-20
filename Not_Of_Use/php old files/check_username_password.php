<?php
//Function to check if username already exists, and spaces in username & password
include('decrypt.php');
function check_username_password($entered_username,$entered_password)
{	
	$user_exists=0; //Flag Variable. Assumed as Unique User.
	if(strstr($entered_username," ") || strstr($entered_password," "))//CHECKING SPACES
		return 2;
		//NO SPACES IN USERNAME, NO NEED NOT WORRY ABOUT NOT CHECKING FOR UNIQUE USERNAME OR NOT AFTER CHECKING SPACES, AS SPACED ONES WON'T BE PRESENT
		//----------------------------------------------------------------------------------------------------------------------------------
		//NOW CHECKING IF USERNAME EXISTS; CHECKING DONE IN BOTH FACULTY AND OTHER USERS RECORDS

	$myfile_others=fopen("other_users.txt","r") or die("Error! File Not Found!");

	$myfile_faculty=fopen("faculty_users.txt","r") or die("Error! File Not Found!");
	while(!feof($myfile_others) && !feof($myfile_faculty))
	{ 
	$allinfo_others=trim(fgets($myfile_others));
	$username_from_others=trim(substr($allinfo_others,0,strpos($allinfo_others," ")));
	
	if(strcasecmp($entered_username,decrypt($username_from_others))==0 && !empty($entered_username))//CHECKING IF USERNAME ALREADY EXISTS IN OTHERS_USERS.TXT
	$user_exists=1;
	
	$allinfo_faculty=trim(fgets($myfile_faculty));
	$username_from_faculty=trim(substr($allinfo_faculty,0,strpos($allinfo_faculty," ")));
	
	if(strcasecmp($entered_username,decrypt($username_from_faculty))==0 && !empty($entered_username))//CHECKING IF USERNAME ALREADY EXISTS IN FACULTY_USERS.TXT
	$user_exists=1;
	}	
	
	fclose($myfile_others);
	fclose($myfile_faculty);
	return($user_exists);
	}
?>