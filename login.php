<?php
	//Start session
	session_start();

	//Connect to mysql server
	include('connect.php');
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
                global $link;
		$str = @trim($str);
		return mysqli_real_escape_string($link,$str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['id']);
	$password = clean($_POST['password']);
        $stmt = $link->prepare("SELECT * FROM user WHERE idnumber=? AND password=?"); 
        $stmt->bind_param("ss", $login, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0){ 
             while ($row = $result->fetch_array()){
                $position = $row['position'];
                
                if ($position=='admin'){
                    $stmt = $link->prepare("SELECT * FROM admin WHERE idnum=? AND password=?"); 
                    $stmt->bind_param("ss", $login, $password);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows > 0) {  //Login successful  
                        session_regenerate_id();
                        while ($row = $result->fetch_array()){
                            $_SESSION['SESS_MEMBER_ID'] = $row['id'];
                        }
                        session_write_close();
                        header("location: admin/profile.php");
                        exit();
                    }else{
                        $_SESSION['SESS_ERROR'] = array("Your username or password is incorrect.");
			header("location: index.php");
			exit();
                    } 
                }elseif ($position=='student'){
                    $stmt = $link->prepare("SELECT * FROM student WHERE idnumber=? AND password=?"); 
                    $stmt->bind_param("ss", $login, $password);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows > 0) {
                        session_regenerate_id();
                        while ($row = $result->fetch_array()){
                            $_SESSION['SESS_MEMBER_ID'] = $row['id'];
                            $_SESSION['SESS_FIRST_NAME'] = $row['fname'];
                        }
                        session_write_close();
                        header("location: student/profile.php");
                        exit();
                    }else {
                        header("location: index.php");
                        exit();
                    }
		}elseif ($position=='teacher'){
                    $stmt = $link->prepare("SELECT * FROM teacher WHERE idnumber=? AND password=?"); 
                    $stmt->bind_param("ss", $login, $password);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows > 0) {//Login Successful
                        session_regenerate_id();
                        while ($row = $result->fetch_array()){
                            $_SESSION['SESS_MEMBER_ID'] = $row['id'];
                            $_SESSION['SESS_FIRST_NAME'] = $row['idnumber'];
                        }
                        session_write_close();
                        //if ($level="admin"){
                        header("location: teacher/profile.php");
                        exit();
                    }else {
                        header("location: index.php");
                        exit();
                    }
		
                }
             }
        }else{
          //Login failed
          $_SESSION['SESS_ERROR'] = array("Your username or password is incorrect.");
              header("location: index.php");
          exit();
        }

	
?>