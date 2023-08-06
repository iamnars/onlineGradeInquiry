<?php
session_start();
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
$course = clean($_POST['course']);
$yearlevel = clean($_POST['yearlevel']);
$gender = clean($_POST['gender']);
$status = clean($_POST['status']);
$bday = clean($_POST['bday']);
$section = clean($_POST['section']);
$address=clean($_POST['address']);
$email=clean($_POST['email']);
$contactno=clean($_POST['contactno']);

if($fname == "" || $lname == "" || $mname == "" || $idnum == ""){
     $_SESSION['SESS_ERROR'] = array("STUDENT ID and COMPLETE NAME are required!");
}
else{
               $stmt = $link->prepare("SELECT * FROM student WHERE idnumber=?");
               $stmt->bind_param("s", $idnum);
               $stmt->execute();
               $result = $stmt->get_result();
                 if ($result->num_rows > 0){
				$_SESSION['SESS_ERROR'] = array("Student ID already exists!");
			}else {

            
                                $stmt = $link->prepare("INSERT INTO student (fname, lname, mname, idnumber, course, yearlevel, gender, status, bday, section, address, email, contactno)
                                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)"); 
                                
                                $stmt->bind_param("sssssssssssss", $fname, $lname, $mname, $idnum, $course, $yearlevel, $gender, $status, $bday, $section, $address, $email, $contactno);
                                $stmt->execute();

                                $stmt = $link->prepare("INSERT INTO user (idnumber, password, position)
                                                        VALUES (?,?,?)"); 
                                $pos ="student";
                                $stmt->bind_param("sss", $idnum, $password, $pos);
                                $stmt->execute();
			}
                     $result->close();
                     $stmt->close();       

}


header("location: student.php");
?>