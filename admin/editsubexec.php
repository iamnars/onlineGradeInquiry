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
$id = clean($_POST['id']);
$stmt= $link->prepare("UPDATE subject SET subject_id = ?, title = ?, unit = ? WHERE id = ?");
$stmt->bind_param("sssi", $idnum, $title, $unit, $id);
$stmt->execute();
$stmt->close();
header("location: regsub.php");
?>