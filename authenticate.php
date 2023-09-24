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

    // Prepare the SQL statement
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION["username"] = $user["username"];
        header("Location: dashboard.php"); // Redirect to the admin dashboard
        exit();
    } else {
        echo "Invalid username or password. <a href='admin.php'>Try again</a>";
    }
} else {
    // If the request is not a POST request, deny access
    header('HTTP/1.0 403 Forbidden');
    exit('Access to this page is forbidden.');
}
?>

<!-- login -->