<?php
if(!isset($_SESSION))
	session_start();
include('congrats.php');
include('updating_text.php');
include('fatal_message.php');
if(strcmp($_SESSION['page'],'faculty_messages')==0)
$target_dir ='C:\wamp\www\New folder\faculty_message_images';//DIRECTORY WHERE IMAGE IS TO BE STORED....
else
$target_dir ='C:\wamp\www\New folder\notice_images';
if(!empty($_FILES))/*SECURITY: IF INVALID FILE TYPE IS UPLOADED THEN $_FILES ARRAY REMAINS EMPTY, WHICH GIVES ERROR WHENEVER IN CODE THIS ARRAY IS USED,SO FIRST WE CHECK THAT $_FILES IS NOT EMPTY. */
{
$target_file = $target_dir.'\\'.basename($_FILES["fileToUpload"]["name"]);//THE PATH OF THE IMAGE PLUS THE FILE NAME ITSELF....
$upload_ok=1;
$checker=0;
$image_file_type=pathinfo($target_file,PATHINFO_EXTENSION);// FILE TYPE...
$image_allowed_types=array('jpeg','jpg','png','gif');//Beacause even text files were uploading...
foreach($image_allowed_types as $types)
{
	if(strcmp($image_file_type,$types)==0)
	{
		$checker1=1;
		break;
	}
	else
		$checker1=0;
}
if(isset($_POST["submit"]) && $checker1!=0) 
{
	//-------CHECKING IF FILE UPLOADED IS TRULY AN IMAGE FILE OR SOMETHING ELSE!.....
		$check=getimagesize($_FILES['fileToUpload']['tmp_name']);
		if($check!==false)
			$upload_ok=1;
		else
			$upload_ok=0;
		//------CHECKING DONE, NOW STORING AND WRITING TO RECORDS....
		//BUT BEFORE WE WRITE THE RECORD, WE MUST SEE THAT ANOTHER FILE WITH SAME NAME DOESNT EXIST,IF SO, THEN RENAME THE CURRENT FILE....
		if($upload_ok!=0)
		{
			while(file_exists($target_file)!=false)
			{
			$_FILES["fileToUpload"]["name"]=mt_rand(1,20000).$_FILES["fileToUpload"]["name"];//Renaming the new upload file
			$target_file=$target_dir.'\\'.$_FILES["fileToUpload"]["name"];
			}
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.'/'.$_FILES["fileToUpload"]["name"]);
			if(strcmp($_SESSION['upload_what'],'image_only')==0)
			$next_page=(strcmp($_SESSION['page'],'faculty_messages')==0)?'a_wise_word.php':'notice-board.php';
			if(strcmp($_SESSION['upload_what'],'both')==0)
			$next_page='upload_text_only.php';
			congrats_message("Image Successfully Submitted.",$next_page);
			update_text(); 
		} 
}
else
{
		echo $image_file_type;
		error_message("Please Upload Valid Image...","upload_image_only.php");
}
}
	//-----IF THE $_FILES IS EMPTY THEN THE FILE MUST NOT BE AN IMAGE FILE
		else
		{
			echo $image_file_type;
		error_message("Please Upload Valid Image...","upload_image_only.php");
		}
?>