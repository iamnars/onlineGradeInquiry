<?php
session_start();
include('../connect.php');

//Function to sanitize values received from the form. Prevents SQL injection
  	function clean($str) {
                global $link;
		$str = @trim($str);
		return mysqli_real_escape_string($link,$str);
	}
//Sanitize the POST values
$teacher = clean($_POST['teacher']);
$subject = clean($_POST['subject']);
$section = clean($_POST['section']);
$course = clean($_POST['course']);
$yearlevel = clean($_POST['level']);


$result=$link->query("SELECT * FROM teachersubject WHERE teacher='$teacher' AND course = '$course'
                AND subject = '$subject' AND section ='$section'
                AND level ='$yearlevel'");
			if($result->num_rows > 0) {
				$_SESSION['SESS_ERROR'] = array("Record already exists!");
			}else {
				$link->query("INSERT INTO teachersubject (teacher, subject, section, level, course)
                VALUES ('$teacher','$subject','$section','$yearlevel','$course')");

			}

header("location: teachersub.php");
?>