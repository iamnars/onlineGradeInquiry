<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<form action="editperaexec.php" method="post">
<input name="teacher" type="hidden" class="textfield" id="brnu" value="<?php echo $_GET['tid']; ?>" />
Percentage <br />
<input name="percentage" type="text" class="textfield" id="brnu" value="<?php echo $_GET['pe']; ?>" />
<br>
<input type="submit" name="Submit" value="save" class="button" />
</form>