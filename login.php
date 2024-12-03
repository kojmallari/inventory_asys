<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>ITSS Inventory System</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #F4F4F4;
            font-size: medium;
        }
        body::before{
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('uploads/haubg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            opacity: 0.5;
            z-index: -1;
        }
        .container{
            text-align: center;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }
        .form{
            width: 100%;
            max-width: 300px;
            padding: 20px;
            background-color: #FFF;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }
        label{
            display: block;
            margin-bottom: 8px;
        }
        input{
            width: 90%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }
        button{
            background-color: #007BFF;
            color: #FFF;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        label, p, a, input{
            font-family: "Inter", sans-serif;
            font-weight: bold;
        }
        img {
            max-width: 54%;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="uploads/hau.png" alt="hau-logo">

        <form action="login_back.php" method="post">
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password: </label>
            <input type="password" id="userpass" name="userpass" required>

            <button type="submit">Login</button>
        </form>
        <br>
    </div>
</body>
</html>