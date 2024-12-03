<?php 
try {
    $dbHost = "mysql:host=localhost;dbname=inventory";
    $dbUser = "root"; $dbPassword = "";
    $pdo = new PDO($dbHost, $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


?>