<?php
require_once "config.php";
session_start();
// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    // User is already logged in, redirect to another page or display a message
    header("Location: dashboard.php"); // Redirect to the admin dashboard or another page
    exit();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username is already taken
    $check_sql = "SELECT * FROM users WHERE username = :username";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bindParam(":username", $username);
    $check_stmt->execute();

    if ($check_stmt->rowCount() > 0) {
        echo "Username already exists. <a href='signup.php'>Try again</a>";
    } else {
        // Insert the new user into the database
        $insert_sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bindParam(":username", $username);
        $insert_stmt->bindParam(":password", $password);

        if ($insert_stmt->execute()) {
            echo "Registration successful. <a href='admin.php'>Sign In</a>";
        } else {
            echo "Registration failed. <a href='signup.php'>Try again</a>";
        }
    }
} else {
    // If the request is not a POST request, deny access
    header('HTTP/1.0 403 Forbidden');
    exit('Access to this page is forbidden.');
}
?>

<!-- register -->