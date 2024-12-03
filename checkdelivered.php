<?php 
require 'connect.php';
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSS Inventory System | Check Delivered</title>
    <link href="https://fonts.cdnfonts.com/css/neue-haas-grotesk-display-pro" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="top-layer">
        <div class="image-container">
            <p class="office-title">ITSS Inventory System</p>
            <div class="wrapper">
                <div class="right-button-container">
                    <a href="index.php"><button class="icon-button">
                        <svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" width="24" height="24">
                            <path d="M21 13v10h-6v-6h-6v6h-6v-10h-3l12-12 12 12h-3zm-1-5.907v-5.093h-3v2.093l3 3z"/>
                        </svg>
                        <span class="button-text">Home</span>
                    </button></a>
                    <a href="checkonstock.php"><button class="icon-button">
                        <svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" width="24" height="24">
                            <path d="M17.677 16.879l-.343.195v-1.717l.343-.195v1.717zm2.823-3.324l-.342.195v1.717l.342-.196v-1.716zm3.5-7.602v11.507l-9.75 5.54-10.25-4.989v-11.507l9.767-5.504 10.233 4.953zm-11.846-1.757l7.022 3.2 1.7-.917-7.113-3.193-1.609.91zm.846 7.703l-7-3.24v8.19l7 3.148v-8.098zm3.021-2.809l-6.818-3.24-2.045 1.168 6.859 3.161 2.004-1.089zm5.979-.943l-2 1.078v2.786l-3 1.688v-2.856l-2 1.078v8.362l7-3.985v-8.151zm-4.907 7.348l-.349.199v1.713l.349-.195v-1.717zm1.405-.8l-.344.196v1.717l.344-.196v-1.717zm.574-.327l-.343.195v1.717l.343-.195v-1.717zm.584-.332l-.35.199v1.717l.35-.199v-1.717zm-16.656-4.036h-2v1h2v-1zm0 2h-3v1h3v-1zm0 2h-2v1h2v-1z"/>
                        </svg>
                        <span class="button-text">Check On-Stock</span>
                    </button></a>
                    <a href="checkdelivered.php"><button class="icon-button">
                        <svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" width="24" height="24">
                            <path d="M3 18h-2c-.552 0-1-.448-1-1v-2h15v-9h4.667c1.117 0 1.6.576 1.936 1.107.594.94 1.536 2.432 2.109 3.378.188.312.288.67.288 1.035v4.48c0 1.121-.728 2-2 2h-1c0 1.656-1.344 3-3 3s-3-1.344-3-3h-6c0 1.656-1.344 3-3 3s-3-1.344-3-3zm3-1.2c.662 0 1.2.538 1.2 1.2 0 .662-.538 1.2-1.2 1.2-.662 0-1.2-.538-1.2-1.2 0-.662.538-1.2 1.2-1.2zm12 0c.662 0 1.2.538 1.2 1.2 0 .662-.538 1.2-1.2 1.2-.662 0-1.2-.538-1.2-1.2 0-.662.538-1.2 1.2-1.2zm-4-2.8h-14v-10c0-.552.448-1 1-1h12c.552 0 1 .448 1 1v10zm3-6v3h4.715l-1.427-2.496c-.178-.312-.509-.504-.868-.504h-2.42z"/>
                        </svg>
                        <span class="button-text">Check Delivered</span>
                    </button></a>
                    <a href="logout.php"><button class="icon-button">
                        <svg class="icon" aria-hidden="true" xlmns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" width="24" height="24">
                            <path d="M16 2v7h-2v-5h-12v16h12v-5h2v7h-16v-20h16zm2 9v-4l6 5-6 5v-4h-10v-2h10z"/>
                        </svg>
                        <span class="button-text">Logout</span>
                    </button></a>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-rule">
</body>
</html>