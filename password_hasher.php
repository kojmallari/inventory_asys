<?php 
require 'connect.php';

try {
    $username = 'itss';
    $userpass = 'inventory';

    $hashedPassword = password_hash($userpass, PASSWORD_BCRYPT);

    $sql = "UPDATE users SET userpass = :hashedPassword WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':hashedPassword' => $hashedPassword,
        ':username' => $username,
    ]);

    echo "Password for user '$username' has been updated";
} catch (PDOException $e) {
    echo "Error: " . htmlspecialchars($e->getMessage());
}


?>