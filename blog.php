<?php

// Database connection settings
$host = "localhost"; // Change if necessary
$dbUsername = "root"; // Change if necessary
$dbPassword = ""; // Change if necessary
$dbName = "caps"; // Change if necessary

// Create a new PDO instance
$pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);

// Prepare and execute the SQL query to insert the blog into the database
$statement = $pdo->prepare("INSERT INTO blog (author, title, content, date, committee) VALUES (:author, :title, :content, :date, :committee)");
$statement->bindParam(":author", $_POST["author"]); // Use the provided author name
$statement->bindParam(":title", $_POST["title"]);
$statement->bindParam(":content", $_POST["content"]);
$statement->bindParam(":date", $_POST["date"]);
$statement->bindParam(":committee", $_POST["committee"]);
$statement->execute();

// Check if the insertion was successful
if ($statement->rowCount() > 0) {
    // Blog inserted successfully
    header("Location: index.php");
    exit();
} else {
    // Failed to insert the blog
    echo "Failed to submit the blog.";
}
?>