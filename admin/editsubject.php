
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<?php
				include('../connect.php');
				$id=$_GET['id'];
				$result = $link->query("SELECT * FROM subject where id='$id'");
				while($row = $result->fetch_array())
					{
						$subid=$row['subject_id'];
						$title=$row['Title'];
						$unit=$row['unit'];
					}
				?>	
<form name="myForm" action="editsubexec.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
<input name="id" type="hidden" class="textfield" id="brnu" value="<?php echo $id?>" />
Subject ID <br />
<input name="idnum" type="text" class="textfield" id="brnu" value="<?php echo $subid?>" />
<br>
Title <br />
<input name="title" type="text" class="textfield" id="brnu" value="<?php echo $title?>" />
<br>
Units <br />
<input name="unit" type="text" class="textfield" id="brnu" value="<?php echo $unit?>" />
<br>

<input type="submit" name="Submit" value="save" class="button" />
</form>
