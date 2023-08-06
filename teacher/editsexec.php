<?php
include('../connect.php');
$id=$_POST['id'];
$nscore=$_POST['nscore'];

	$asasas=$nscore;
	mysql_query("UPDATE seatwork SET score='$asasas' WHERE id='$id'");

header('location: profile.php');
?>