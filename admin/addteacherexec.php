<?php
include('../connect.php');

//Function to sanitize values received from the form. Prevents SQL injection
  	function clean($str) {
                global $link;
		$str = @trim($str);
		return mysqli_real_escape_string($link,$str);
	}
//Sanitize the POST values
$fname = clean($_POST['fname']);
$lname = clean($_POST['lname']);
$mname = clean($_POST['mname']);
$idnum = clean($_POST['idnum']);
$password = '';
$work = clean($_POST['work']);
$gender = clean($_POST['gender']);
$status = clean($_POST['status']);
$bday = clean($_POST['bday']);
$address=clean($_POST['address']);
$email=clean($_POST['email']);
$contactno=clean($_POST['contactno']);

if($fname == "" || $lname == "" || $mname == "" || $idnum == "" || $bday == ""){

}
else{
$link->query("INSERT INTO teacher (fname, lname, mname, idnumber, work, gender, status, bday, address, email, contactno)
VALUES ('$fname','$lname','$mname','$idnum','$work','$gender','$status','$bday','$address','$email','$contactno')");
$link->query("INSERT INTO user (idnumber, password, position)
VALUES ('$idnum','$password','teacher')");


$link->query("INSERT INTO assignmentpercentage (tid, apercentage)
VALUES ('$idnum','.10')");
$link->query("INSERT INTO exampercentage (tid, epercentage)
VALUES ('$idnum','.50')");
$link->query("INSERT INTO participationpercentage (tid, papercentage)
VALUES ('$idnum','.10')");
$link->query("INSERT INTO projectpercentage (tid, ppercentage)
VALUES ('$idnum','.10')");
$link->query("INSERT INTO quizpercentage (tid, qpercentage)
VALUES ('$idnum','.10')");
$link->query("INSERT INTO seatworkpercentage (tid, spercentage)
VALUES ('$idnum','.10')");
}
header("location: teacher.php");
?>