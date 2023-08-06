<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);

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

<br>
<br>
<br>
<br>
<br>
<?php if (isset($_SESSION['SESS_ERROR'])): ?>
    <center><div class="form-errors">
        <?php foreach($_SESSION['SESS_ERROR'] as $error): ?>
            <p><font color="red" size="2"><?php echo $error ?></font></p>
        <?php endforeach; ?>
    </div></center>
<?php endif; ?>
         <?php unset($_SESSION['SESS_ERROR']); ?>
      <center>  <table width="800" border="0">
          <tr>
            <td>&nbsp;</td>
            <td width="300" valign="middle"><div class="loginbox">
            <div align="center" class="loginboxtitle">Login            </div>

            <br>
            <form action="login.php" method="post">
		  <div align="center">ID Number:
		    <input type="text" name="id" class="textfield">
		    <br>
		Password&nbsp;:
		<input type="password" name="password" class="textfield">
		<br>
		<input type="submit" value="Login" class="button">
        <br>
        <a href="forgotpassword.php"><br>
              Forgot Password?</a>
		  </div>
	  </form>

            </div></td>
            <td>&nbsp;</td>
          </tr>
        </table>       </center>
        <br style="clear: left">
  </div>
<div id="content">
		
	</div>
	<div class="footer">Copyright © 2014. STI College - General Santos City. All Rights Reserved.</div>
</div>
</body>
</html>
