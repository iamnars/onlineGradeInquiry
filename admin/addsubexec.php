<?php
include('../connect.php');

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
                global $link;
		$str = @trim($str);
		return mysqli_real_escape_string($link,$str);
	}
//Sanitize the POST values
$idnum = clean($_POST['idnum']);
$title = clean($_POST['title']);
$unit = clean($_POST['unit']);

$stmt=$link->prepare("INSERT INTO subject (subject_id, Title, unit)
VALUES (?,?,?)");
$stmt->bind_param("sss",$idnum,$title,$unit);
$stmt->execute();
$stmt->close();
header("location: regsub.php");
?>