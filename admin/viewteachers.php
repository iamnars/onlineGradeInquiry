<script language="javascript">
function Clickheretoprint()
{
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
      disp_setting+="scrollbars=yes,width=900, height=400, left=100, top=25";
  var content_vlue = document.getElementById("print_content").innerHTML;

  var docprint=window.open("","",disp_setting);
   docprint.document.open();
   docprint.document.write('<html><head><title>List of Teachers</title>');
   docprint.document.write('</head><body onLoad="self.print()" style="width: 900px; font-size:16px; font-family:arial;">');
   docprint.document.write(content_vlue);
   docprint.document.write('</body></html>');
   docprint.document.close();
   docprint.focus();
}
</script>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8">
<?php
	require_once('../auth.php');
?>

<div id="print_content">

<table cellpadding="5" cellspacing="0" id="resultTable" border="1">
  <tr>
    <th style="border-left: 1px solid #FAEF92" width="86" rowspan="2">Teacher ID</th>
    <th width="10" rowspan="2">Teacher</th>
    <th width="10" rowspan="2">WORK</th>
    <th width="10" rowspan="2">GENDER</th>
    <th width="10" rowspan="2">STATUS</th>
    <th width="10" rowspan="2">BIRTHDAY</th>
    <th width="10" rowspan="2">ADDRESS</th>
    <th width="10" rowspan="2">EMAIL ADDRESS</th>
    <th width="10" rowspan="2">CONTACT NO</th>
    <!--<th width="17" rowspan="2">Action</th> -->
  </tr>
   <tr>

<?php
include('../connect.php');
  $result = $link->query("SELECT * FROM teacher");
    while($row = $result->fetch_array())
	{
	  echo '<tr>';
         echo '<td style="border-left: 1px solid #FAEF92">'.$row['idnumber'].'</td>';
         echo '<td><div align="left">'.$row['fname'].' '.$row['mname'].' '.$row['lname'].'</div></td>';
         echo '<td><div align="left">'.$row['work'].'</div></td>';
         echo '<td><div align="left">'.$row['gender'].'</div></td>';
         echo '<td><div align="left">'.$row['status'].'</div></td>';
         echo '<td><div align="left">'.$row['bday'].'</div></td>';
         echo '<td><div align="left">'.$row['address'].'</div></td>';
         echo '<td><div align="left">'.$row['email'].'</div></td>';
         echo '<td><div align="left">'.$row['contactno'].'</div></td>';
      echo '</tr>';
    }
  ?>

   </tr>


</table>
</div>
<div>

<br>
        <center><table width="800" border="0">
          <tr>
            <td>&nbsp;</td>
            <td width="300" height="200" valign="middle"><div align="center">
            <!--<a href="javascript:Clickheretoprint()">Print</a>-->
             <input type="submit" value="Print" class="button" onclick="Clickheretoprint()"><input type="submit" value="Back" class="button" onclick="history.back()"></div><br><br></td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <br style="clear: left">
  </div>
