
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<?php
				include('../connect.php');
				$id=$_GET['id'];
				$result = $link->query("SELECT * FROM course where id='$id'");
				while($row =$result->fetch_array())
					{
						$coursecode=$row['coursecode'];
						$description=$row['description'];
					}
				?>
<form name="myForm" action="editcourseexec.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
<input name="id" type="hidden" class="textfield" id="brnu" value="<?php echo $id?>" />
Course code <br />
<input name="ccode" type="text" class="textfield" id="brnu" value="<?php echo $coursecode?>" />
<br>
Description <br />
<input name="description" type="text" class="textfield" id="brnu" value="<?php echo $description?>" />
<br>
<input type="submit" name="Submit" value="save" class="button" />
</form>
