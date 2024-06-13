<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '127.0.0.1:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'nanahira774');
define('DB_NAME', 'pdu_test');
  
/* Attempt to connect to MySQL database */
$mysqli = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
