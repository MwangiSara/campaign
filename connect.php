<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "campaign";

// Create connection
$con = new mysqli($servername, $username, $password, $db);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
//echo "Connected successfully";
 require_once 'function.php';

?>