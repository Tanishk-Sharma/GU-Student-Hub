<?php

$new_post_text=trim($_POST["post_text"]);
include('updating_text.php');
include('fatal_message.php');
if(isset($new_post_text))
{
	update_text($new_post_text);
	include('upload_both 2.php');
}
else
{
	error_message("Sorry! You Left the Text Area Blank!","upload_both 1.php");
}

?>