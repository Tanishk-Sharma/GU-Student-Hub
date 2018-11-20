<?php
include('congrats.php');
include('updating_images.php');
include('fatal_message.php');
$target_dir = 'C:\wamp\www\New folder\notice_images';
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
if(isset($_POST["submit"])) 
{
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.'/'.$_FILES["fileToUpload"]["name"]);
        congrats_message("Congratulations! Your Info Has been Posted!","notice-board.php");
} 
else
      error_message("Sorry! You Did not Upload Anything!","upload_image_only.html");
  
	update_images($target_dir,'<hr>'); //rule sent as <hr> as only image is uploaded
?>