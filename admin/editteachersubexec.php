<?php
session_start();
include('../connect.php');

//Function to sanitize values received from the form. Prevents SQL injection
  	function clean($str) {
                global $link;
		$str = @trim($str);
		return mysqli_real_escape_string($link,$str);
	}
    $msg="";
//Sanitize the POST values
$id = clean($_POST['id']);
$teacher = clean($_POST['teacher']);
$course = clean($_POST['course']);
$subject = clean($_POST['subject']);
$section = clean($_POST['section']);
$level = clean($_POST['level']);

$result=$link->query("SELECT * FROM teachersubject WHERE id != '$id'
                AND teacher='$teacher' AND course = '$course' AND subject = '$subject' AND section ='$section'
                AND level ='$level'");
			if($result->num_rows > 0) {
				$_SESSION['SESS_ERROR'] = array("Record already exists!");
			}else {
				$link->query("UPDATE teachersubject SET teacher = '$teacher', course='$course',
                section='$section', subject='$subject',
                level='$level' WHERE id = '$id'");

			}

header("location: teachersub.php");
?>
