<?php
include('../connect.php');
$id=$_POST['teacher'];
$percentage=$_POST['percentage'];
mysql_query("UPDATE assignmentpercentage SET apercentage='$percentage' WHERE tid='$id'");
header('location: percentage.php');
?>