<?php
// read_blog.php

if (isset($_GET['blogid'])) {
    $blogId = $_GET['blogid'];

    // Database connection settings
    $host = "localhost"; // Change if necessary
    $dbUsername = "root"; // Change if necessary
    $dbPassword = ""; // Change if necessary
    $dbName = "caps"; // Change if necessary

    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);

    // Prepare and execute the SQL query to fetch the blog based on the blog ID
    $statement = $pdo->prepare("SELECT author, title, content, date, committee FROM blog WHERE id = :blogId");
    $statement->bindParam(':blogId', $blogId);
    $statement->execute();

    // Fetch the blog as an associative array
    $blog = $statement->fetch(PDO::FETCH_ASSOC);

    if ($blog) {
        // Display the blog content on the page
        echo "<h2 class=\"blog-title-content\">{$blog['title']}</h2>";
        echo "<p class=\"blog-author-content\">By Author: {$blog['author']}</p>";
        echo "<p class=\"blog-date-content\">Published on: {$blog['date']}</p>";
        echo "<p class=\"blog-committee-content\">By Committee: {$blog['committee']}</p>";
        echo "<p class=\"blog-content-content\">{$blog['content']}</p>";

    } else {
        // Handle case when no blog is found with the provided ID
        echo "Invalid blog ID";
    }
} else {
    // Handle case when no blog ID is provided
    echo "Invalid blog ID";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>

<body>

</body>

</html>