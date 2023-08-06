<?php
include('../connect.php');

//Function to sanitize values received from the form. Prevents SQL injection
  	function clean($str) {
                global $link;
		$str = @trim($str);
		return mysqli_real_escape_string($link,$str);
	}
//Sanitize the POST values
$position = clean($_POST['position']);
$title = clean($_POST['title']);
$message = clean($_POST['message']);
$id = clean($_POST['id']);
$stmt = $link->prepare("UPDATE notificatiion SET position=?, title=?, message=? WHERE id=?");
$stmt->bind_param("sssi", $position, $title, $message, $id);
$stmt->execute();
$stmt->close();
header("location: notify.php");
?>