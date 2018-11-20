<?php
//Function to Display Some Error
function error_message($message,$return_to_page)
{
	echo'<head  target="_self"><title>Oops!</title></head>
	
	<body bgcolor="darkred">
		<table align="center">
			<tr>
				<td><img src="warning.png" alt="Oops! Error!" width=150px height=150px></td>
			
				<td align="center">'.$message.' <br><a href="'.$return_to_page.'">Click Here</a> to Retry.</td>
			</tr>
		</table>
	</body>';
}
?>