<?php

$server = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'vacunacion';

$conn = new mysqli($server, $username, $password, $dbname); 

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>