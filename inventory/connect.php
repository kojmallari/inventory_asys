<?php 
try {
    // Database connection settings
    $dbHost = "mysql:host=localhost;dbname=haudb";
    $dbUser = "root"; $dbPassword = "";

    // Create a new PDO instance
    $pdo = new PDO($dbHost, $dbUser, $dbPassword);

    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
}
?>