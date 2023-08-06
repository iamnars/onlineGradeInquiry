<?php
session_start();
include('../connect.php');

//Function to sanitize values received from the form. Prevents SQL injection
  	function clean($str) {
                global $link;
		$str = @trim($str);
		return mysqli_real_escape_string($link,$str);
	}
    $msg="";
//Sanitize the POST values
$id = clean($_POST['id']);
$idnum = clean($_POST['idnum']);
$password = clean($_POST['password']);
$fname = clean($_POST['fname']);
$lname = clean($_POST['lname']);
$mname = clean($_POST['mname']);
$birth = clean($_POST['birth']);
$stat = clean($_POST['stat']);
$section= clean($_POST['section']);
$gender = clean($_POST['gender']);
$ylevel = clean($_POST['ylevel']);
$course = clean($_POST['course']);
$address=clean($_POST['address']);
$email=clean($_POST['email']);
$contactno=clean($_POST['contactno']);

if($fname == "" || $lname == "" || $mname == "" || $idnum == ""){
     $_SESSION['SESS_ERROR'] = array("STUDENT ID and COMPLETE NAME are required!");
}
else{
    $stmt = $link->prepare("SELECT * FROM student WHERE id != ? AND idnumber = ?"); 
    $stmt->bind_param("is", $id, $idnum);
    $stmt->execute();
    $result = $stmt->get_result();
			if($result->num_rows > 0) {
				$_SESSION['SESS_ERROR'] = array("STUDENT ID already exists!");
			}else {
                                $stmt = $link->prepare("UPDATE student SET idnumber=?, "
                                        . "password=?, mname=?, lname=?, fname=?, "
                                        . "bday=?, status=?, gender=?, course=?, "
                                        . "yearlevel=?, address=?, email=?, contactno=?, "
                                        . "section=? WHERE id=?"); 
                                $stmt->bind_param("ssssssssssssssi", $idnum, $password, $mname, $lname, $fname, $birth, $stat, $gender, $course,
                                        $ylevel, $address, $email, $contactno, $section, $id);
                                $stmt->execute();

                                $stmt = $link->prepare("UPDATE user SET password=? WHERE idnumber=?"); 
                                $stmt->bind_param("ss", $password, $idnum);
                                $stmt->execute();
                                
			}
                        $result->close();
                        $stmt->close();
 }
header("location: student.php");
?>
