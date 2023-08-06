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

$result=$link->query("SELECT * FROM teacher WHERE id != '$id' AND idnumber = '$idnum'");
			if($result->num_rows > 0) {
				echo "ID Number already exists!";
			}else {
				//mysql_query("UPDATE teacher SET idnumber='$idnum', password='$password', mname='$mname', lname='$lname', fname='$fname', bday='$birth', status='$stat', gender='$gender', work='$work', address='$address', email='$email', contactno ='$contactno' WHERE id='$id'");
                               // mysql_query("UPDATE user SET password='$password' WHERE idnumber='$idnum'");
                                
                                $stmt = $link->prepare("UPDATE teacher SET idnumber=?, password=?, "
                                        . "mname=?, lname=?, fname=?, bday=?, status=?, "
                                        . "gender=?, work=?, "
                                        . "address=?, email=?, contactno =? WHERE id=?"); 
                                $stmt->bind_param("ssssssssssssi", $idnum, $password, $mname, $lname, $fname, $birth, $stat, $gender, $work,
                                        $address, $email, $contactno, $id);
                                $stmt->execute();
                                
                                $stmt = $link->prepare("UPDATE user SET password=? WHERE idnumber=?"); 
                                $stmt->bind_param("ss", $password, $idnum);
                                $stmt->execute();
                                
                                $result->close();
                                $stmt->close();
			}
                        

header("location: teacher.php");
?>