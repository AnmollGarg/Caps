<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
</head>

<body>
    <?php
    if (isset($_GET["fullname"])) {
        $fullname = $_GET["fullname"];
        echo "<p>Logged in as: $fullname</p>";
    } else {
        header("Location: http://localhost/website/log.html"); // Redirect to the login page if not logged in
        exit();
    }
    ?>
</body>

</html>