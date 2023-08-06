<table border="1">
<tr>
<td>Subject</td>
<td>Course</td>
<td>Level</td>
<td>Section</td>
</tr>
<?php
include('../connect.php');
$id=$_GET['id'];
$result = $link->query("SELECT * FROM teachersubject WHERE teacher='$id'");
while($row = $result->fetch_array())
	{
	echo '<tr>';
	echo '<td>'.$row['subject'].'</td>';
	echo '<td>'.$row['course'].'</td>';
	echo '<td>'.$row['level'].'</td>';
	echo '<td>'.$row['section'].'</td>';
	echo '</tr>';
	}
?>
</table>