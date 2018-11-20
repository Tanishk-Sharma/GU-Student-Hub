<?php

function update_text($new_post_text='',$batches='ALL')
{	
	include('posts_handler.php');
	if(empty($new_post)==0)
	{
	error_message("Sorry, You left the Text Area Blank...","notice-board.php");
	exit();
	}
	if(!isset($_SESSION))
		session_start();
	//--------------------------------------------------------------------------------------------
	//SETTING THE INDICATOR-TEXT OR BOTH
	//--------------------------------------------------------------------------------------------
	if(strcmp($_SESSION['upload_what'],'text_only')==0)
		$indicator='(txt)';
	if(strcmp($_SESSION['upload_what'],'both')==0)
		$indicator='(both)';
	if(strcmp($_SESSION['upload_what'],'image_only')==0)
		$indicator='(img)';
	
	if(!empty($_FILES['fileToUpload']["name"]))
		$image_name=$_FILES["fileToUpload"]["name"];
	else
		$image_name='';
	//--------------------------------------------------------------------------------------------
	//WHETHER UPLOADING TEXT FROM NOTICE BOARD PAGE OR THE FACULTY MESSAGE PAGE!
	//--------------------------------------------------------------------------------------------
	
	$posts_separator="----------------------------------------------------------";
	//--------------------------------------------------------------------------------------------
	//CREATING THE RECORD:
	//--------------------------------------------------------------------------------------------
	
	date_default_timezone_set ( 'Asia/Calcutta' );// VERY IMPORTANT:SETS THE DEFAULT TIMEZONE ACROSS ALL THE SCRIPTS!
	
	if(strcmp($_SESSION['page'],'faculty_messages')==0)
	{
		$myfile=fopen("faculty_messages.txt","a") or die("Error! Can't Find File!");
		$html_text="indicator |-> ".$indicator."$@".$rule.date("M-j-Y")."$@".$_SESSION['username']."$@".$batches."$@<pre>".$new_post_text."</pre>".PHP_EOL.$posts_separator;
	}
	if(strcmp($_SESSION['page'],'notice_board')==0)
	{	
		if(strcmp($indicator,'(txt)')==0)
		$html_text=$indicator.PHP_EOL.date("M-j-Y<\b\\r> g:i A").PHP_EOL.substr($_SESSION['username'],0,strpos($_SESSION['username'],'@')).PHP_EOL.'<pre>'.$new_post_text.'</pre>'.PHP_EOL.$posts_separator.PHP_EOL;	
		if(strcmp($indicator,'(img)')==0)
			$html_text=$indicator.PHP_EOL.date("M-j-Y<\b\\r> g:i A").PHP_EOL.substr($_SESSION['username'],0,strpos($_SESSION['username'],'@')).PHP_EOL.'<pre>'.$new_post_text.'</pre>'.PHP_EOL.$image_name.PHP_EOL.$posts_separator.PHP_EOL;
		if(strcmp($indicator,'(both)')==0)
		{
			if(!empty($image_name)) //For Images in BOTH MODE
				$html_text=$image_name.PHP_EOL.$posts_separator.PHP_EOL;
			else// For Text in BOTH MODE
				$html_text=$indicator.PHP_EOL.date("M-j-Y<\b\\r> g:i A").PHP_EOL.substr($_SESSION['username'],0,strpos($_SESSION['username'],'@')).PHP_EOL.'<pre>'.$new_post_text.'</pre>'.PHP_EOL;
		}
		
	}
	//--------------------------------------------------------------------------------------------
	//DECIDING WHICH FILE TO WRITE TO:
	//--------------------------------------------------------------------------------------------
	$current_file=counting_files();//THE HIGHEST NUMBERED FILE AS OF YET.
	$number_of_records=counting_number_of_records($current_file);
	//NOW, CHECKING HOW MANY RECORDS HIGHEST NUMBERED FILE HAS, IF>10, NEW FILE WILL BE CREATED,OTHERWISE WRITE TO SAME FILE....
	if($number_of_records>=10)
		$current_file=checking_filename();
	
	//--------------------------------------------------------------------------------------------
	//WRITING TO THE FINALIZED FILE:
	//--------------------------------------------------------------------------------------------
	if(!empty($html_text))
		{		
			$mode=file_exists('C:\\wamp\\www\\New folder\\notice_records\\'.$current_file)?'r+':'w';//Because, filegetcontents function requires file to exist first....and a new file is created if it doesnt exist, in the write mode, not read mode.
			$myfile=fopen('C:\\wamp\\www\\New folder\\notice_records\\'.$current_file,$mode) or die("Error! Can't Find File!");// CHECK FIRST WHICH PAGE IS OPEN, FACULTY OR NOTICE
			$html_text.=file_get_contents('C:\\wamp\\www\\New folder\\notice_records\\'.$current_file);
			fwrite($myfile,$html_text);
			fclose($myfile);
		}
}
?>