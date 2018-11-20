<?php
session_start();
function update_images($target_dir,$rule='',$both=0)
/*uploading both image+text is special case, where there shouldnt be date above image, only above text
so $both is 0 initially means only image upload, at 1 means both image and text being uploaded, correspondingly rule is set*/
{
	$myfile=fopen("notice.txt","a") or die("Error! Can't Find File!");
	
		$image_path=$_FILES["fileToUpload"]["name"];
		if($both==0)
		$html_text="(img)$@".$rule.date("M-j-Y")."$@".$_SESSION['username']."$@".$image_path.PHP_EOL;
		if($both==1)
		$html_text="(img)$@".$rule.$image_path;
	
	fwrite($myfile,$html_text);
	fclose($myfile);
	
}
?>