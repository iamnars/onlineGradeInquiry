<?php
	require_once('../auth.php');
?>


<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<form name="myForm" action="viewstudent.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">

Student<br>
<select name="studentid" class="textfield">
<?php
include('../connect.php');
$idnum=$_SESSION['SESS_FIRST_NAME'];
$results = $link->query("SELECT * FROM teachersubject WHERE teacher='$idnum'");
while($rows = $results->fetch_array())
	{
    $course= $rows['course'];
    $section= $rows['section'];
    $level= $rows['level'];
        }
      $result2 = $link->query("SELECT idnumber,fname, mname, lname  FROM student WHERE course='$course'
                AND section='$section' AND yearlevel='$level'");
                while($rows = $result2->fetch_array()){
                     echo '<option value="'.$rows['idnumber'].'">'.$rows['fname'].' '.$rows['mname'].' '.$rows['lname'].'</option>';
                }
	
?>
</select><br>

<input type="submit" value="View" class="button">
</form>
