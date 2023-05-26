<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection settings
    $host = "localhost"; // Change if necessary
    $dbUsername = "root"; // Change if necessary
    $dbPassword = ""; // Change if necessary
    $dbName = "caps"; // Change if necessary

    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);

    // Prepare and execute the SQL query
    $statement = $pdo->prepare("SELECT * FROM signin WHERE username = :username AND password = :password");
    $statement->bindParam(":username", $username);
    $statement->bindParam(":password", $password);
    $statement->execute();

    // Check if a matching row is found
    if ($statement->rowCount() > 0) {
        // Successful login
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $fullname = $user['fullname'];
        session_start(); // Start the session
        $_SESSION["loggedIn"] = true; // Set the session variable to indicate successful login
        header("Location: http://localhost/website/index.html?fullname=$fullname"); // Pass the fullname as a parameter in the URL
        exit();
    } else {
        // Failed login
        header("Location: http://localhost/website/signup.html");
        exit();
    }
}
?>