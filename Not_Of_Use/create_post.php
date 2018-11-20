<?php
include('updating_notice_text.php');
include('congrats.php');
include('updating_notice.php');
$new_post_text=trim($_POST["post_text"]);
$uploadOk=1;

if(isset($new_post_text) && empty($_POST['fileToUpload']))
{
	$uploadOk=1;
	update_notice_board_text($uploadOk,$new_post_text);
}

else if (isset($_FILES['fileToUpload']) && empty($new_post_text))
{
		
$target_dir ='C:\wamp\www\New folder';
$name="fileToUpload";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.'/'));
        print_r($_FILES);
        $uploadOk = 1;
	update_notice_board_info($uploadOk,$target_dir,'<hr>');
}
else
{

	update_notice_board_text($uploadOk,$new_post_text);
	$target_dir = 'C:\wamp\www\New folder';
	$name="fileToUpload";
	$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;

		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.'\\'));
		 print_r($_FILES);
        $uploadOk = 1;
    

	update_notice_board_text($uploadOk,$new_post_text);
	update_notice_board_info($uploadOk,$target_dir);
}

?>