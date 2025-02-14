<?php
$host = "localhost"; // Change if using live server
$username = "root";  // Change if using cPanel
$password = "";      // Enter MySQL password
$database = "ai_blog_db"; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database Connected Successfully!";
}
?>