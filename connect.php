<?php



/* Database config */

$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'STIOGI';

/* End config */



$link = new mysqli($db_host,$db_user,$db_pass,$db_database);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
//query("SET names UTF8");

?>