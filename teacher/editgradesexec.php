<?php
include('../connect.php');

//Function to sanitize values received from the form. Prevents SQL injection
  	function clean($str) {
                global $link;
		$str = @trim($str);
		return mysqli_real_escape_string($link,$str);
	}
//Sanitize the POST values
$id = clean($_POST['id']);
$idnum = clean($_POST['idnum']);
$prelim = clean($_POST['prelim']);
$midterm = clean($_POST['midterm']);
$prefinal = clean($_POST['prefinal']);
$final = clean($_POST['final']);
$gwa = clean($_POST['gwa']);
$studid = clean($_POST['studid']);

$link->query("UPDATE grade SET idnum='$idnum', prelim='$prelim',
midterm='$midterm', prefinal='$prefinal', final='$final', gwa='$gwa' WHERE id='$id'");

header("location: viewrecord.php?id=$studid");
?>