<?php
//in the messages file, Ist- Batch Name, IInd- html_text
//also store the batch name in new file
function update_faculty_text($new_post_text,$batches='all')
{strtoupper($batches);
	if(!isset($_SESSION))
		session_start();
	$myfile=fopen("batches.txt","a") or die("Error! Can't Find File!");
		
		$html_text='<hr><font color="red"><p align="right">'.date("M\ j\ Y").'</p></font><font color="red" size="5"><u><i><p align="left">'.$_SESSION['username'].' </i></u></font><font color="red">says:</p><pre>'.$new_post_text.'</pre></font>';
	
	fwrite($myfile,$html_text.PHP_EOL);
	fclose($myfile);
	
	$mybatches=fopen(".txt","a") or die("Error! Can't Find File!");
	
	
}
?>