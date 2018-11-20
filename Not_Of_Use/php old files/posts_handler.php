<?php
/*PURPOSE TO BE FULFILLED:
1- Write in highest number file AND read from highest number file
2- Write in a bigger numbered file, if records in highest numbered file exceed 10
3- on NEXT PAGE button, read from 2nd highest file and so on upto 1.txt */


function counting_files()//FOR READING/WRITING PURPOSE-WHICH FILE TO READ/WRITE CURRENTLY....
{
	$arr=scandir("notice_records",SCANDIR_SORT_DESCENDING);
	return ($arr[0]);//RETURNING HIGHEST NUMBERED FILE
}
function checking_filename()//FOR WRITING PURPOSE-WHICH 'NEW' FILE TO CREATE AND WRITE NEW RECORDS IN....
{
	$arr=scandir("notice_records",SCANDIR_SORT_DESCENDING);
	//-----SEPARATING THE FILENAME STRING FROM THE EXTENSION '.TXT'
	$position_of_dot=strpos($arr[0],".");
    $filename_only=substr($arr[0],0,$position_of_dot);
	//------Filename Separated
	return (++$filename_only.'.txt');
}
function counting_number_of_records($current_file)//FOR COUNTING NUMBER OF RECORDS IN CURRENT FILE....SHOULD NOT EXCEED 10 RECORDS
{	
	$myfile=fopen('C:\\wamp\\www\\New folder\\notice_records\\'.$current_file,"r")or die("Error!Wrong Input...");
	$counter=0;
	$posts_separator="----------------------------------------------------------";
	while(!feof($myfile))
	{
		if(strcmp(trim(fgets($myfile)),$posts_separator)==0)
			$counter++;
	}
	fclose($myfile);
	return $counter;
}
?>