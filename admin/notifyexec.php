<?php
include('../connect.php');

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
    global $link;
    $str = @trim($str);
    return mysqli_real_escape_string($link,$str);
}
//Sanitize the POST values
if(!empty($_POST['check_post'])) {
    foreach($_POST['check_post'] as $check) {
            $position = $check;
            $message = clean($_POST['message']);
            $title = clean($_POST['title']);
            $stmt = $link->prepare("INSERT INTO notificatiion (position, message, title)
            VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $position, $message,$title);
            $stmt->execute();
        }
        $stmt->close();
    }

header("location: notify.php");
?>