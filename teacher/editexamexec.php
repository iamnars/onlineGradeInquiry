<?php
include('../connect.php');
$id=$_POST['id'];
$nscore=$_POST['nscore'];

	$asasas=$nscore;
	mysql_query("UPDATE exam SET score='$asasas' WHERE id='$id'");

header('location: profile.php');
?>