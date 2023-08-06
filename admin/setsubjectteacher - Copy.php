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
$teacher = clean($_POST['teacher']);
$subject = clean($_POST['subject']);
$section = clean($_POST['section']);
$course = clean($_POST['course']);
$yearlevel = clean($_POST['level']);
$sy= clean($_POST['sy']);
$term= clean($_POST['term']);

$result=mysql_query("SELECT * FROM teachersubject WHERE teacher='$teacher' AND course = '$course'
                AND subject = '$subject' AND section ='$section'
                AND level ='$yearlevel' AND sy ='$sy' AND term ='$term'");
			if(mysql_num_rows($result) > 0) {
				$_SESSION['SESS_ERROR'] = array("Record already exists!");
			}else {
				mysql_query("INSERT INTO teachersubject (teacher, subject, section, level, course, sy, term)
                VALUES ('$teacher','$subject','$section','$yearlevel','$course','$sy','$term')");

			}

header("location: teachersub.php");
?>