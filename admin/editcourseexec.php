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
$id = clean($_POST['id']);

$stmt=$link->prepare("UPDATE course SET coursecode=?, description=? WHERE id=?");
$stmt->bind_param("ssi", $ccode, $description, $id);
$stmt->execute();
$stmt->close();
header("location: course.php");
?>