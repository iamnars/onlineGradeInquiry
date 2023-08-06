<?php
include('../connect.php');

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str)
	{
		$str = @trim($str);
		if(get_magic_quotes_gpc())
			{
			$str = stripslashes($str);
			}
		return mysql_real_escape_string($str);
	}
//Sanitize the POST values
$course = clean($_POST['course']);
$subject = clean($_POST['subject']);
$sem = clean($_POST['sem']);
$yearlevel = clean($_POST['yearlevel']);

mysql_query("INSERT INTO prospectus (coursecode, year, semister, subject)
VALUES ('$course','$yearlevel','$sem','$subject')");
header("location: prospectus.php");
?>