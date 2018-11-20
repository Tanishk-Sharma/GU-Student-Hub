<?php
include('congrats.php');
include('updating_notice.php');
$target_dir = 'C:\wamp\www\New folder';
$name="fileToUpload";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.'/'.$_FILES["fileToUpload"]["name"]);
        congrats_message("Congratulations! Your Info Has been Posted!","notice-board.php");
        $uploadOk = 1;
    } 
	else
	{
        $uploadOk = 0;
    }
	update_notice_board_info($uploadOk,$target_dir);
?>