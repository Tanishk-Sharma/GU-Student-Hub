<?php
if(!isset($_SESSION))
	session_start();

if(strcmp($_POST['selection'],'text_only')==0)
{
	$_SESSION['upload_what']='text_only';
	include('upload_text_only.php');
}
if(strcmp($_POST['selection'],'image_only')==0)
{
	$_SESSION['upload_what']='image_only';
	include('upload_image_only.php');
}
if(strcmp($_POST['selection'],'both')==0)
{
	$_SESSION['upload_what']='both';
	include('upload_both 1.php');
}

?>