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
    $msg="";
//Sanitize the POST values
$id = clean($_POST['id']);
$teacher = clean($_POST['teacher']);
$course = clean($_POST['course']);
$subject = clean($_POST['subject']);
$section = clean($_POST['section']);
$level = clean($_POST['level']);
$sy= clean($_POST['sy']);
$term= clean($_POST['term']);

$result=mysql_query("SELECT * FROM teachersubject WHERE id != '$id'
                AND teacher='$teacher' AND course = '$course' AND subject = '$subject' AND section ='$section'
                AND level ='$level' AND sy ='$sy' AND term ='$term'");
			if(mysql_num_rows($result) > 0) {
				$_SESSION['SESS_ERROR'] = array("Record already exists!");
			}else {
				mysql_query("UPDATE teachersubject SET teacher = '$teacher', course='$course',
                section='$section', subject='$subject', sy='$sy',
                term='$term', level='$level' WHERE id = '$id'");

			}

header("location: teachersub.php");
?>
