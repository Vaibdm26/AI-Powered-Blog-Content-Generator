1.Project Intro : 
AI-Powered Blog Content Generator : A tool that generates blog content based on user-provided topic.
2.Instructions to run thise Project:
To implement thise project, you have to install Xampp Local Server.
After installing and setup, copy this folder  inside Xampp such that (C:\xampp\htdocs\ai-blog-generator).
Start Apache and MySQL from Xampp control Panel.
In your browser opean "http://localhost/phpmyadmin/".
To create batabase copy this query and paste it in phpmyadmin: 
"CREATE DATABASE ai_blog_db;

USE ai_blog_db;

CREATE TABLE blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);"
In "generate.php" file their is a API-KEY of Hugginface.io needed. For that you have to create your own Hugging Face API-key and paste it in generte.php file.
