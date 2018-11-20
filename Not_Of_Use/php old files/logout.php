<?php


if($_GET['logout_yes']==1)
{
	if(!isset($_SESSION))
		session_start();
	$_SESSION['logout']=1;
	unset($_SESSION['username']);

	include('homepage-new.php');
}

?>