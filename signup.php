<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $fullname = $_POST["fullname"];
    $phoneno = $_POST["phoneno"];
    $email = $_POST["email"];
    $committee = $_POST["committee"];
    $verificationKey = $_POST["verificationKey"]; // Add this line to retrieve the verification key

    // Database connection settings
    $host = "localhost"; // Change if necessary
    $dbUsername = "root"; // Change if necessary
    $dbPassword = ""; // Change if necessary
    $dbName = "caps"; // Change if necessary

    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);

    // Check if the verification key is correct
    $correctVerificationKey = "gargsahab"; // Replace with your actual verification key

    if ($verificationKey !== $correctVerificationKey) {
        // Incorrect verification key
        echo "Error: Incorrect verification key.";
    } else {
        // Check if username, email, or phone number already exists
        $checkStatement = $pdo->prepare("SELECT * FROM signin WHERE username = :username OR email = :email OR phoneno = :phoneno");
        $checkStatement->bindParam(":username", $username);
        $checkStatement->bindParam(":email", $email);
        $checkStatement->bindParam(":phoneno", $phoneno);
        $checkStatement->execute();

        if ($checkStatement->rowCount() > 0) {
            // Username, email, or phone number already exists
            echo "Error: Username, email, or phone number is already taken.";
        } else {
            // Prepare and execute the SQL query to insert new user
            $statement = $pdo->prepare("INSERT INTO signin (username, password, fullname, phoneno, email, committee) 
                                       VALUES (:username, :password, :fullname, :phoneno, :email, :committee)");
            $statement->bindParam(":username", $username);
            $statement->bindParam(":password", $password);
            $statement->bindParam(":fullname", $fullname);
            $statement->bindParam(":phoneno", $phoneno);
            $statement->bindParam(":email", $email);
            $statement->bindParam(":committee", $committee);

            if ($statement->execute()) {
                // Successful sign-up
                header("Location: http://localhost/website/log.html");
                exit();
            } else {
                // Failed sign-up
                echo "Error occurred. Please try again.";
            }
        }
    }
}
?>