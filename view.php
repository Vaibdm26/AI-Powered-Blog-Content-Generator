<?php
include 'C:\xampp\htdocs\ai-blog-generator\includes\config.php';

// Connect to MySQL database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Fetch saved blogs
$result = $conn->query("SELECT * FROM blogs ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Blogs</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Saved Blogs</h1>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="blog-container">
            <h2><?php echo htmlspecialchars($row['title']); ?></h2>
    
            <div class="blog-content">
                <p class="question">
                    <strong>Topic:</strong> <?php echo htmlspecialchars($row['title']); ?>
            </p>

            <hr>

            <p class="answer">
                <strong>Generated Blog:</strong>
                <br><br>
                <?php 
                    // Format response properly by breaking new lines
                    echo nl2br(htmlspecialchars($row['content'])); 
                ?>
            </p>
        </div>

        <p class="published-date">Published on: <?php echo $row['created_at']; ?></p>
    </div>

    

    <?php endwhile; ?>
</body>
</html>

<?php
$conn->close();
?>
