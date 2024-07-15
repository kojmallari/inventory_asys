<?php 
include 'connect.php';

function cleanInput($data) {
    return htmlspecialchars(trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Clean and validate input data
    $username = cleanInput($_POST["username"]);
    $password = cleanInput($_POST["password"]);

    // Retrieve user data from the database
    $dbLog = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $dbLog->bindParam(':username', $username, PDO::PARAM_STR);
    $dbLog->execute();
    // Fetch user data
    $user = $dbLog->fetch(PDO::FETCH_ASSOC);

    // Verify the password
    if ($user && password_verify($password, $user['hashedpassword'])) {
        // Start the session
        session_start();
        $_SESSION['username'] = $username;

        header("Location: home.php");
        exit();
    } else {
        // Redirect with generic login error
        header("Location: loginform.php?error=1");
        exit();
    }
}

?>