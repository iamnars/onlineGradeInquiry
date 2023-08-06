<?php
session_start();
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
$section = clean($_POST['section']);
$yearlevel = clean($_POST['level']);
$sy  = clean($_POST['sy']);
$term  = clean($_POST['term']);

$result=mysql_query("SELECT * FROM studentsubject WHERE
            course = '$course' AND subject = '$subject' AND section = '$section'
            AND level= '$yearlevel' AND sy = '$sy' AND term= '$term'");
			if(mysql_num_rows($result) > 0) {
				$_SESSION['SESS_ERROR'] = array("Record already exists!");
			}else {
                mysql_query("INSERT INTO studentsubject (subject, section, course, level, sy, term)
                VALUES ('$subject','$section','$course','$yearlevel','$sy','$term')");
			}

header("location: studsub.php");
?>