<?php
session_start();
session_destroy();
header("Location: admin.php"); // Redirect to the sign-in page
?>

<!-- logout -->