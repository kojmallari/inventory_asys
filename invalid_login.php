<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ITSS Inventory System | Invalid Login</title>
        <link href="https://fonts.cdnfonts.com/css/neue-haas-grotesk-display-pro" rel="stylesheet">
        <link rel="stylesheet" href="invalid_logs.css">
        <script>
            setTimeout(function(){
                window.location.href = 'login.php';
            }, 5000);
        </script>
    </head>
    <body>
        <div class="container">
            <img src="uploads/invalid.png" alt="invalid-icon" class="error-icon">
            <h2 class="error-message">Error: Invalid username or password. Please try again!</h2>
            <p class="redirect-message">Redirecting you back to the login page in <span id="countdown">5</span> seconds... </p>
        </div>

        <script>
            let countdown = 5;
            const countdownElement = document.getElementById('countdown');
            setInterval(function(){
                if (countdown > 1) {
                    countdown--;
                    countdownElement.textContent =countdown;
                }
            }, 1000);
        </script>
    </body>
</html>