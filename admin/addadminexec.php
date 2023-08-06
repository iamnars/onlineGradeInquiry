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
$gender = clean($_POST['gender']);
$status = clean($_POST['status']);
$bday = clean($_POST['bday']);
$pos = "admin";
if($fname == "" || $lname == "" || $mname == "" || $bday == ""){

}
else{
    $stmt =$link->prepare("INSERT INTO admin (fname, lname, mname, idnum, gender, status, birth)
    VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss", $fname, $lname, $mname, $idnum, $gender, $status, $bday);
    $stmt->execute();

    $stmt =$link->prepare("INSERT INTO user (idnumber, position) VALUES (?,?)");
    $stmt->bind_param("ss", $idnum, $pos);
    $stmt->execute();
    
    $stmt->close();
}
header("location: profile.php");
?>