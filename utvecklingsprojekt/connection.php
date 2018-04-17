<?php
session_name('HFAB');
session_start();
ob_start();
session_regenerate_id();

$mysqli = new mysqli("localhost", "root", "root", "hfab");
/*$username = "timhal16";
$password = "l_CjusJpUi";
$database = "timhal16_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
*/
?>