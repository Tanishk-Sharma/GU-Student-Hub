<?php
function word()
{
	$myfile=fopen("random_vocab.txt",'r')or die("Error! File Not Found");
	$random_num=mt_rand(1,10);
	while(!feof($myfile))
	{	
		$word=explode("-",trim(fgets($myfile)));
		
		if($word[0]==$random_num)
		{	
			fclose($myfile);
			return $word;
		}
		
	}
	
	fclose($myfile);
}

function ques()
{
	$myfile=fopen("random_ques.txt",'r')or die("Error! File Not Found");
	$random_num=mt_rand(1,4);
	while(!feof($myfile))
	{	
		$ques=explode("-",trim(fgets($myfile)));
		
		if($ques[0]==$random_num)
		{	
			fclose($myfile);
			return $ques;
		}
		
	}
	fclose($myfile);
}
?>