<?php
//Register a New User!
include('fatal_message.php');
include('check_username_password.php');
include('encrypt.php');
include('congrats.php');
$email=trim($_POST['email']);
$password=trim($_POST['pword']);
$batch_name=trim($_POST['batch_name']);
$retype_password=trim($_POST['repword']);
$errors_so_far=0;
if((empty($email)==1) || (empty($password)==1) || (empty($batch_name)==1)){
	error_message("Sorry! You left a Mandatory Field Blank.","homepage-new.php");
	$errors_so_far++;
}
if(check_username_password($email,$password)==1){
	error_message("Sorry! Username already exists.","homepage-new.php");
	$errors_so_far++;	
}
if(strlen($email)<5 || strlen($password)<5)
{
	error_message("Sorry! Username And Password Must contain at least 5 Characters.","homepage-new.php");
	$errors_so_far++;
}
if(strlen($email)>30 || strlen($password)>30)
{
	error_message("Sorry! Username And Password Cannot contain more 30 Characters.","homepage-new.php");
	$errors_so_far++;
}
if(strpos($email,"@")==0)
{
	error_message("Please Enter a Valid E-mail Address.","homepage-new.php");
	$errors_so_far++;
	}
	if(check_username_password($email,$password)==2){
	error_message("Sorry! Username and Password cannot contain Spaces.","homepage-new.php");
	$errors_so_far++;
}
else if(strcmp($password,$retype_password)!=0)
{
error_message("Sorry, Your Entered Passwords Do Not Match.","homepage-new.php");
}
if(strcmp($password,$retype_password)==0 && ($errors_so_far==0))
{	
$myfile=fopen("other_users.txt","a") or die("Error! Can't Find File!");
fwrite($myfile,encrypt($email)." | ".encrypt($password)." | ".strtoupper(encrypt($batch_name)).PHP_EOL);
fclose($myfile);
congrats_message("Thanks For Registering!!<br>Please Login Now with Entered Information.","homepage-new.php");
}

?>