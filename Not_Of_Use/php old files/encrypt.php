<?php
//Encryption of username
function encrypt($word)
{
	$j=strlen($word)-1;
	//first half string ascii += 3 next half, ascii -= 2
	for($i=0,$j=strlen($word)-1;$i<$j;$i++,$j--)
	{
		$ch=ord($word[$i]);
		$ch2=ord($word[$j]);
		$ch+=3;
		$ch2-=2;
		$word[$i]=chr($ch);
		$word[$j]=chr($ch2);
	}
	return $word;
}
?>