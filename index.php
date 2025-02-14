<?php include 'db/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Blog Generator</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>AI-Powered Blog Generator</h1>
    <form action="generate.php" method="POST">
        <input type="text" name="topic" placeholder="Enter blog topic..." required>
        <button type="submit">Generate Blog</button>
    </form>
    <a href="view.php">View Saved Blogs</a>
</body>
</html>
