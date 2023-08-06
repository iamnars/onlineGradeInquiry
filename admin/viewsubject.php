<table border="1">
<tr>
<td>Subject</td>
</tr>
<?php
include('../connect.php');
$course=$_GET['course'];
$year=$_GET['year'];
$section=$_GET['section'];
$result = $link->query("SELECT * FROM studentsubject WHERE section='$section' AND level='$year' AND course='$course'");
while($row = $result->fetch_array())
	{
	echo '<tr>';
	echo '<td>'.$row['subject'].'</td>';
	echo '</tr>';
	}
?>
</table>