<?php
//Register a New User!
include('fatal_message.php');
include('check_username_password.php');
include('encrypt.php');
include('congrats.php');
$email=trim($_POST['email']);
$password=trim($_POST['pword']);
$retype_password=trim($_POST['repword']);
$key=trim($_POST['key']);

$errors_so_far=0;
if(empty($email) || empty($password) || empty($key) || empty($retype_password))
{
	error_message("Sorry! You left a Mandatory Field Blank.","faculty_register.html");
	$errors_so_far++;
	
}	
if(strcmp($key,"1331")!=0){
	error_message("Sorry! The Entered Key is Invalid.","faculty_register.html");
	$errors_so_far++;
}
	
if(check_username_password($email,$password)==1){
	error_message("Sorry! Username already exists.","faculty_register.html");
	$errors_so_far++;	
}
if(strlen($email)<5 || strlen($password)<5)
{
	error_message("Sorry! Username And Password Must contain at least 5 Characters.","faculty_register.html");
	$errors_so_far++;
}
	if(check_username_password($email,$password)==2){
	error_message("Sorry! Username and Password cannot contain Spaces.","faculty_register.html");
	$errors_so_far++;
	
	
}
if(strcmp($password,$retype_password)!=0)
{
error_message("Sorry, Your Entered Passwords Do Not Match.","faculty_register.html");
}
if(strcmp($password,$retype_password)==0 && ($errors_so_far==0))
{
$myfile=fopen("faculty_users.txt","a") or die("Error! Can't Find File!");
fwrite($myfile,encrypt($email)." ".encrypt($password).PHP_EOL);
fclose($myfile);
congrats_message("Thanks For Registering!!<br>Please Login Now with Entered Information.","homepage-new.php");
}

?>