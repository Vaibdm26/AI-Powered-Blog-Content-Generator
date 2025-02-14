<?php
session_start();
include 'C:\xampp\htdocs\ai-blog-generator\includes\config.php'; 

// Retrieve blog title and generated content from session
$blog_title = $_SESSION['blog_title'] ?? 'Untitled Blog';
$generated_blog = $_SESSION['generated_blog'] ?? 'No content generated.';

// Unset session variables after displaying content
unset($_SESSION['blog_title'], $_SESSION['generated_blog']);

// ✅ Save blog to MySQL Database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Insert data into database
$stmt = $conn->prepare("INSERT INTO blogs (title, content) VALUES (?, ?)");
$stmt->bind_param("ss", $blog_title, $generated_blog);

if ($stmt->execute()) {
    echo "<p style='color: green;'>Blog saved successfully!</p>";
} else {
    echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($blog_title); ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($blog_title); ?></h1>
    <div class="blog-content">
        <?php echo nl2br(htmlspecialchars($generated_blog)); ?>  <!-- ✅ Now maintains line breaks -->
    </div>
    <br>
    <a href="view.php">View Saved Blogs</a> <!-- ✅ Link to view saved blogs -->
</body>
</html>
