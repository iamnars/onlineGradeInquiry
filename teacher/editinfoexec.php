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
$password = clean($_POST['password']);
$fname = clean($_POST['fname']);
$lname = clean($_POST['lname']);
$mname = clean($_POST['mname']);
$birth = clean($_POST['birth']);
$stat = clean($_POST['stat']);
$gender = clean($_POST['gender']);
$work = clean($_POST['work']);
$address=clean($_POST['address']);
$email=clean($_POST['email']);
$contactno=clean($_POST['contactno']);

$link->query("UPDATE teacher SET idnumber='$idnum', password='$password', mname='$mname', lname='$lname', fname='$fname', bday='$birth', status='$stat', gender='$gender', work='$work', address='$address', email='$email', contactno ='$contactno' WHERE id='$id'");
$link->query("UPDATE user SET password='$password' WHERE idnumber='$idnum'");
header("location: profile.php");
?>