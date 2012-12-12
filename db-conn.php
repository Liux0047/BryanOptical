<?php
$host = 'localhost';
$username = 'root';
$password = 'password';
$database = 'bryanoptical';
@ $db = new mysqli($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo 'Error: Could not connect to database. Please try again later.';
    exit;
}

if (!$db->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $db->error);
} 
?>
