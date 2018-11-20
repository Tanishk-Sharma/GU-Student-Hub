<?php
include('updating_text.php');
include('congrats.php');
include('fatal_message.php');

$new_post_text=trim($_POST["post_text"]);

if(!isset($_SESSION))
	session_start();

if(strcmp($_SESSION['page'],'faculty_messages')==0) //FOR A WISE WORD FACULTY MESSAGES!!
{
$batches=trim($_POST['batches']);
if(!empty($new_post_text))
{
	update_text($new_post_text,$batches);
		$next_page=(strcmp($_SESSION['page'],'faculty_messages')==0)?'a_wise_word.php':'notice-board.php';
	
	congrats_message("Text Successfully Submitted.",$next_page);
}
else
	error_message("Sorry! You Left the Text Area Blank!","upload_text_only.php");
}

else
{
if(!empty($new_post_text))									// FOR THE NOTICE BOARD TEXT POSTS
{
	update_text($new_post_text);
	$next_page=(strcmp($_SESSION['page'],'faculty_messages')==0)?'a_wise_word.php':'notice-board.php';
	congrats_message("Congratulations! Your Text has been Successfully Submitted.",$next_page);
}
else
	error_message("Sorry! You Left the Text Area Blank!","upload_text_only.php");
}
?>