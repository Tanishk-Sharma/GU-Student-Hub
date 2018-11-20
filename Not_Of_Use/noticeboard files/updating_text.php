<?php

function update_text($new_post_text,$batches='')
{
	
	if(!isset($_SESSION))
		session_start();
	if(strcmp($_SESSION['page'],'faculty_messages')==0)
	{
		$myfile=fopen("faculty_messages.txt","a") or die("Error! Can't Find File!");
		$html_text=date("M-j-Y")." ".$_SESSION['username']." ".$batches." <pre>".$new_post_text."</pre>".PHP_EOL;
	}
	if(strcmp($_SESSION['page'],'notice_board')==0)
	{
		
		$myfile=fopen("notice.txt","a") or die("Error! Can't Find File!");
		$html_text="(txt)$@".date("M-j-Y")."$@".$_SESSION['username']."$@<pre>".$new_post_text."</pre>".PHP_EOL;
	}
	fwrite($myfile,$html_text);
	fclose($myfile);
	
}
?>