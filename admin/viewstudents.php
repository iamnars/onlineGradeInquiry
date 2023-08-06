<script language="javascript">
function Clickheretoprint()
{
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
      disp_setting+="scrollbars=yes,width=900, height=400, left=100, top=25";
  var content_vlue = document.getElementById("content").innerHTML;

  var docprint=window.open("","",disp_setting);
   docprint.document.open();
   docprint.document.write('<html><head><title>List of Students</title>');
   docprint.document.write('</head><body onLoad="self.print()" style="width: 900px; font-size:16px; font-family:arial;">');
   docprint.document.write(content_vlue);
   docprint.document.write('</body></html>');
   docprint.document.close();
   docprint.focus();
}
</script>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8">
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<?php
	require_once('../auth.php');
?>

 <label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" />
<div id="content">

<table cellpadding="5" cellspacing="0" id="resultTable" border="1">
<thead>
<tr>
    <th style="border-left: 1px solid #FAEF92" width="86" rowspan="2">Subject Code</th>
    <th width="10" rowspan="2">Student ID</th>
    <th width="10" rowspan="2">Name</th>
    <th width="10" rowspan="2">Course</th>
    <th width="10" rowspan="2">Year Level</th>
    <th width="10" rowspan="2">Section</th>
    <th width="10" rowspan="2">Gender</th>
    <th width="10" rowspan="2">Address</th>
    <th width="10" rowspan="2">EMAIL ADDRESS</th>
    <th width="10" rowspan="2">CONTACT NO</th>
    <!--<th width="17" rowspan="2">Action</th> -->
  </tr>
  </thead>
   <tbody>

<?php
include('../connect.php');
  $result = $link->query("SELECT student.*, studentsubject.* FROM student LEFT JOIN studentsubject
            ON student.course=studentsubject.course
            WHERE student.yearlevel=studentsubject.level AND student.section=studentsubject.section");
    while($row = $result->fetch_array())
	{
	  echo '<tr>';
         echo '<td style="border-left: 1px solid #FAEF92">'.$row['subject'].'</td>';
         echo '<td><div align="left">'.$row['idnumber'].'</div></td>';
         echo '<td><div align="left">'.$row['fname'].' '.$row['mname'].' '.$row['lname'].'</div></td>';
         echo '<td><div align="left">'.$row['course'].'</div></td>';
         echo '<td><div align="left">'.$row['yearlevel'].'</div></td>';
         echo '<td><div align="left">'.$row['section'].'</div></td>';
         echo '<td><div align="left">'.$row['gender'].'</div></td>';
         echo '<td><div align="left">'.$row['address'].'</div></td>';
         echo '<td><div align="left">'.$row['email'].'</div></td>';
         echo '<td><div align="left">'.$row['contactno'].'</div></td>';
      echo '</tr>';
    }
  ?>

   </tbody>


</table>
<br>
<center><input type="submit" value="Print" class="button" onclick="Clickheretoprint()"><input type="submit" value="Back" class="button" onclick="history.back()"><br><br></td>
</div>

