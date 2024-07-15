<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <title>HAU-PROG | Login Page</title>
        <style>
            .error-message {
                color: white;
                font-size: larger;
                font-weight: bold;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            #lockout-timer {
                color: white;
                font-weight: bold;
            }
        </style>
    </head>
    <body class="bg-primary-600 bg-cover bg-center bg-fixed" style="background-image: url('uploads/haubg3.jpg'); background-repeat: no-repeat;">
    <section class="">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="loginform.php" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-64 h-24 mr-2" src="uploads/hau2.png" alt="logo">
            </a>
            <?php 
            if (isset($_GET['error'])) {
                $errorCode = $_GET['error'];
                if ($errorCode == 1) {
                    echo "<p class='error-message'>Login failed! Please try again.</p>";
                }
            }
            ?>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="loginback.php">
                        <div>
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your username" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter your password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="flex items-center justify-between">
                        </div>
                        <button type="submit" class="w-full text-black bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 border border-black">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Timer -->
    <script>
        function startLockoutTimer(duration, display) {
            let timer = duration, minutes, seconds;
            let intervalID =setInterval(function () {
                minutes =parseInt(timer / 60, 10);
                seconds =parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(intervalID);
                    display.textContent = "Try logging again";
                }
            }, 1000);
        }

        window.onload = function() {
            // Set lockout duration to 60 seconds
            let lockoutDuration = 60;

            // Get the display element
            let display = document.querySelector('#lockout-timer');

            // Start the lockout countdown
            startLockoutTimer(lockoutDuration, display);
        }
    </script>
    </body>
</html>