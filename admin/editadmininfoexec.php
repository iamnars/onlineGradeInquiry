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

$stmt =$link->prepare("UPDATE admin SET idnum = ?, password = ?, mname = ?, lname = ?, fname = ?, birth = ?, status = ?, gender = ? WHERE id = ?");
$stmt->bind_param("ssssssssi", $idnum, $password, $mname, $lname, $fname, $birth, $stat, $gender, $id);
$stmt->execute();

$stmt = $link->prepare("UPDATE user SET password=? WHERE idnumber=?");
$stmt->bind_param("ss", $password, $idnum);
$stmt->execute();
$stmt->close();
header("location: profile.php");
?>