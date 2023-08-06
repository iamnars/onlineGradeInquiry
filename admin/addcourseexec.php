<?php
include('../connect.php');

//Function to sanitize values received from the form. Prevents SQL injection
  	function clean($str) {
                global $link;
		$str = @trim($str);
		return mysqli_real_escape_string($link,$str);
	}
//Sanitize the POST values
$ccode = clean($_POST['ccode']);
$description = clean($_POST['description']);

$stmt = $link->prepare("INSERT INTO course (coursecode, description) VALUES (?,?)"); 
$stmt->bind_param("ss", $ccode, $description);
$stmt->execute();
$stmt->close();
header("location: course.php");
?>