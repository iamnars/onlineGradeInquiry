
<?php

// This is a sample code in case you wish to check the username from a mysql db table
include('../connect.php');
if($_GET['id'])
{
    $id=$_GET['id'];
    $sql = "delete from notificatiion where id='$id'";
    $stmt = $link->prepare("delete from notificatiion where id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $stmt->close();
}

?>