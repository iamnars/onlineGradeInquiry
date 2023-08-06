






<?php
 session_start();
include("connect.php");

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "admin@stiogi.info";
    $email_subject = "Request for new password";
    $msg = "";
     
    function died($error) {
        // your error code can go here
        $msg = "We are very sorry, but there were error(s) found with the form you submitted. ";
        $msg .= "These errors appear below.<br /><br />";
        $msg .= $error."<br /><br />";
        $msg .= "Please go back and fix these errors.<br /><br />";
        //die();
    }

    // validation expected data exists
    if(!isset($_SESSION['SESS_EMAIL']) ||
        !isset($_SESSION['SESS_UID'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }

    $email_from = $_SESSION['SESS_EMAIL']; // required
    $uid = $_SESSION['SESS_UID']; // not required

    $error_message = "";

  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "User below requests for a new password.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "ID Number: ".clean_string($uid)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";

$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
    $msg = "Successfully sent request. Please wait for the admin's email.";
	unset($_SESSION['SESS_EMAIL']);
	unset($_SESSION['SESS_UID']);

?>


<!-- include your own success html here -->


<!--<a href='index.php'><span><img src="home.jpg" width="59" height="41" /></span></a>
<a href='register3.php'><span><img src="reg.jpg" width="59" height="41" /></span></a>
<a href='logout.php'><span><img src="logout.jpg" width="59" height="41" /></span></a>
<a href='admin/login.php'><img src="user-admin-1.png" width="59" height="41" /><span></span></a>-->
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

        <center><table width="800" border="0">
          <tr>
            <td>&nbsp;</td>
            <td width="300" valign="middle"><div class="loginbox">
            <div align="center" class="loginboxtitle">Message            </div>

            <br>
             <?php echo $msg; ?>
             <br>
             <center><input type="submit" value="Back" class="button" onclick="goBack()"></center>
            </div></td>
            <td>&nbsp;</td>
          </tr>
        </table> </center>
        <br style="clear: left">
  </div>
<div id="content">

	</div>
	<div class="footer">Copyright © 2014. STI College - General Santos City. All Rights Reserved.</div>
</div>
</body>
</html>

