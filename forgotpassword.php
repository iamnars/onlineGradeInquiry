<?php
	//Start session
	session_start();
	 include('connect.php');
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
    unset($_SESSION['SESS_ERROR']);
    $msg="";
    if(isset($_POST['Send'])){

  	function clean($str) {
                global $link;
		$str = @trim($str);
		return mysqli_real_escape_string($link,$str);
	}
           $userid = clean($_POST['id']);
           $email = clean($_POST['email']);
           $confirmemail = clean($_POST['confirmemail']);
           //check if empty
           if($userid=="" || $email==""){
               $msg = "Please enter required fields!";
           } elseif (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){ //check if email address is in correct format
               $msg="Email address is in incorrect format!";
           } elseif ($email == $confirmemail){
                 $_SESSION['SESS_EMAIL'] = $email;
                 $_SESSION['SESS_UID'] = $userid;
               //check if user id exists
               $stmt = $link->prepare("SELECT * FROM user WHERE idnumber= ?"); 
               $stmt->bind_param("s", $userid);
               $stmt->execute();
               $result = $stmt->get_result();
                 if ($result->num_rows > 0){               
                        while ($row = $result->fetch_array()) {
                            $position = $row['position'];
                            
                            if ($position=='admin'){
                                $stmt = $link->prepare("SELECT * FROM admin WHERE idnum= ?"); 
                                $stmt->bind_param("s", $userid);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                    //Check whether the query was successful or not
                                    if($result->num_rows > 0) {    
                                        header("location: sent.php");
                                        $result->close();
                                        $stmt->close();
                                        $link->close();
                                        exit();
                                    }
                                    else{
                                        $msg="Admin information does not exist!";
                                    }                           		
                             }elseif ($position=='student'){
                                $stmt = $link->prepare("SELECT * FROM student WHERE idnumber=? AND email=?"); 
                                $stmt->bind_param("ss", $userid, $email);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                    if($result->num_rows > 0) {    
                                        header("location: sent.php");
                                        $result->close();
                                        $stmt->close();
                                        $link->close();
                                        exit();
                                    }
                                    else{
                                        $msg="The entered email address is not the registered email address of this student!";
                                    }	
                            }elseif ($position=='teacher'){
                            	$stmt = $link->prepare("SELECT * FROM teacher WHERE idnumber=? AND email=?"); 
                                $stmt->bind_param("ss", $userid, $email);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                    if($result->num_rows > 0) {    
                                        header("location: sent.php");
                                        $result->close();
                                        $stmt->close();
                                        $link->close();
                                        exit();
                                    } else{
                                        $msg="The entered email address is not the registered email address of this teacher!";
                                    }
                            		
                            }
                        } //close while loop
                }else{
                  //ID number not found
                  $msg = "ID number is not registered!";
                }
             }
             else{
               $msg = "Email mismatched!";
             }
             session_write_close();
      }

           
    
?>
<html>
<head>
<title>STI Online Grade Inquiry | STI College - General Santos City</title>
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
</head>
<body>
<div id="main">
	<div id="header"></div>
<div>
<!-- JavaScript -->
<script>
    function goBack() {
        window.location.href="index.php";
    }
</script>
<br>
<br>
<br>
<br>
<br>

        <center><strong><font color="red" size="2"><?php echo $msg; ?></font><strong>
        <table width="800" border="0">
          <tr>
            <td>&nbsp;</td>
            <td width="300" valign="middle"><div class="loginbox">
            <div align="center"><strong><font size="3">Request for New Password            </font></strong></div>

            <br>
            <form action="" method="post">
		  <div align="center">ID Number&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <input type="text" name="id" class="textfield"><font color="red">*</font>
		    <br>
		Email Address:&nbsp;
		<input type="text" name="email" class="textfield"><font color="red">*</font>
        Confirm Email&nbsp;:
		<input type="text" name="confirmemail" class="textfield"><font color="red">*</font>
		<br>
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
		<input type="submit" name="Send" value="Send request" class="button">
                <input type="button" value="Back" class="button" onclick="goBack()">
        <br>

		  </div>
	  </form>

            </div></td>
            <td>&nbsp;</td>
          </tr>

        </table>  </center>
        <br style="clear: left">
  </div>
<div id="content">

	</div>
	<div class="footer">Copyright © 2014. STI College - General Santos City. All Rights Reserved.</div>
</div>
</body>
</html>
