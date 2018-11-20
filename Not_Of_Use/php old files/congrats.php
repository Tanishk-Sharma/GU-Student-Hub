<?php

//Function to Display Congrats Message
function congrats_message($message,$return_to_page)
{
	echo'<!doctype html><html><head><title>Welcome</title></head>
	
	<body bgcolor="black">
		<font face="Jokerman" color="red" size="6">
		<table align="center" cellpadding=100px>
			<tr>
				<td><img src="success.png" alt="Welcome!" width=400px height=400px></td>
			
				<td align="center">'.$message.'<br><a href="'.$return_to_page.'">Click Here</a> to Proceed.</td>
			</tr>
		</table>
		</font>
	</body></html>';
}
					
?>