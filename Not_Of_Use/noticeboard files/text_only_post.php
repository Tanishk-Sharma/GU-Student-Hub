<?php
include('updating_text.php');
include('congrats.php');
include('fatal_message.php');

$new_post_text=trim($_POST["post_text"]);

if(!isset($_SESSION))
	session_start();

if(strcmp($_SESSION['page'],'faculty_messages')==0)
{
$batches=trim($_POST['batches']);
if(isset($new_post_text))
{
	update_text($new_post_text,$batches);
	congrats_message("Text Successfully Submitted.","a_wise_word.php");
}
else
	error_message("Sorry! You Left the Text Area Blank!","upload_text_only.php");
}

else
{
if(isset($new_post_text))
{
	update_text($new_post_text);
	congrats_message("Congratulations! Your Text has been Successfully Submitted.","notice-board.php");
}
else
	error_message("Sorry! You Left the Text Area Blank!","upload_text_only.html");
}
?>