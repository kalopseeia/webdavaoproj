<?php
if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
    // Accessing this file directly is not allowed
    header("HTTP/1.0 403 Forbidden");
    exit("Direct access to this file is forbidden.");
}

$servername = "localhost"; // The hostname of your MySQL server
$username = "root";        // MySQL username (default in XAMPP is "root")
$password = "";            // MySQL password (default in XAMPP is blank)
$dbname = "dbfurniture"; // Replace with the name of your database

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!-- dbconnection -->