<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: loginform.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <title>ITSS Inventory System</title>
        <style>
            body {
                background-color: white;
            }
            .btn {
                background-color: #CCCCCC;
                border: 1px solid #666666;
                color: #333333;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                cursor: pointer;
                border-radius: 0;
            }
            .btn:hover {
                background-color: #AAAAAA;
                border: 1px solid #555555;
            }
            .calendar-container {
                background: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin-top: 15px;
                margin-bottom: 20px;
            }
            #calendar-header{
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 10px;
            }
            #calendar-header button {
                background-color: #4CAF50;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
            }
            #calendar-header button:hover{
                background-color: #45A049;
            }
            #calendar-header #current-month-year{
                font-size: 20px;
                font-weight: bold;
            }
            #calendar{
                width: 100%;
                border-collapse: collapse;
            }
            #calendar th, #calendar td {
                border: 1px solid #DDD;
                text-align: center;
                padding: 10px;
            }
            #calendar th{
                background-color: #F2F2F2;
            }
            #calendar td{
                height: 50px;
            }
            #calendar .today{
                background-color: #4CAF50;
                color: white;
            }
            #current-time{
                text-align: center;
                margin-bottom: 10px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="flex flex-col items-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="index.php" class="flex items-center mb-3 mt-2 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-50 h-20 mr-2" src="uploads/hau2.png" alt="logo">
            </a>
            <h3 class="text-3xl font-bold">
                ITSS Inventory System
            </h3>
            <div class="flex items-center justify-between w-full">
                <div class="ml-auto">
                    <a href="logout.php"><button type="button" class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        <svg class="w-3.5 h-3.5 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 13v-4l8 7-8 7v-4h-6v-6h6zm0-6v-6h-16v18l8-7v-9h6v4h2z"/>
                        </svg>
                        Logout
                    </button></a>
                </div>
            </div>
            <hr style="width:100%; text-align: center; margin-top: 20px;">
            <br>

            <nav id="breadcumb-container" class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                    <a href="home.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21 13v10h-6v-6h-6v6h-6v-10h-3l12-12 12 12h-3zm-1-5.907v-5.093h-3v2.093l3 3z"></path></svg>
                        Home
                    </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="m11.75 3c-.414 0-.75.336-.75.75v16.5c0 .414.336.75.75.75s.75-.336.75-.75v-16.5c0-.414-.336-.75-.75-.75z" clip-rule="evenodd"></path></svg>
                        </div>
                    </li>
                    <li class="inline-flex items-center">
                    <a href="inventory_menu.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22 18.055v2.458c0 1.925-4.655 3.487-10 3.487-5.344 0-10-1.562-10-3.487v-2.458c2.418 1.738 7.005 2.256 10 2.256 3.006 0 7.588-.523 10-2.256zm-10-3.409c-3.006 0-7.588-.523-10-2.256v2.434c0 1.926 4.656 3.487 10 3.487 5.345 0 10-1.562 10-3.487v-2.434c-2.418 1.738-7.005 2.256-10 2.256zm0-14.646c-5.344 0-10 1.562-10 3.488s4.656 3.487 10 3.487c5.345 0 10-1.562 10-3.487 0-1.926-4.655-3.488-10-3.488zm0 8.975c-3.006 0-7.588-.523-10-2.256v2.44c0 1.926 4.656 3.487 10 3.487 5.345 0 10-1.562 10-3.487v-2.44c-2.418 1.738-7.005 2.256-10 2.256z"></path></svg>
                        Inventory List
                    </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="m11.75 3c-.414 0-.75.336-.75.75v16.5c0 .414.336.75.75.75s.75-.336.75-.75v-16.5c0-.414-.336-.75-.75-.75z" clip-rule="evenodd"></path></svg>
                        </div>
                    </li>
                    <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M18.513 7.119c.958-1.143 1.487-2.577 1.487-4.036v-3.083h-16v3.083c0 1.459.528 2.892 1.487 4.035l3.086 3.68c.567.677.571 1.625.009 2.306l-3.13 3.794c-.936 1.136-1.452 2.555-1.452 3.995v3.107h16v-3.107c0-1.44-.517-2.858-1.453-3.994l-3.13-3.794c-.562-.681-.558-1.629.009-2.306l3.087-3.68zm-4.639 7.257l3.13 3.794c.652.792.996 1.726.996 2.83h-1.061c-.793-2.017-4.939-5-4.939-5s-4.147 2.983-4.94 5h-1.06c0-1.104.343-2.039.996-2.829l3.129-3.793c1.167-1.414 1.159-3.459-.019-4.864l-3.086-3.681c-.66-.785-1.02-1.736-1.02-2.834h12c0 1.101-.363 2.05-1.02 2.834l-3.087 3.68c-1.177 1.405-1.185 3.451-.019 4.863"></path></svg>
                        Pending Items
                    </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="m11.75 3c-.414 0-.75.336-.75.75v16.5c0 .414.336.75.75.75s.75-.336.75-.75v-16.5c0-.414-.336-.75-.75-.75z" clip-rule="evenodd"></path></svg>
                        </div>
                    </li>
                    <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M14 0v10l2-1.518 2 1.518v-10h4v24h-17c-1.657 0-3-1.343-3-3v-18c0-1.657 1.343-3 3-3h9zm6 20h-14.505c-1.375 0-1.375 2 0 2h14.505v-2z"></path></svg>
                        Activity/Audit Log
                    </a>
                    </li>
                </ol>
            </nav>

            <div class="calendar-container">
                <div id="calendar-header">
                    <button id="prev-month">Prev</button>
                    <div id="current-month-year"></div>
                    <button id="next-month">Next</button>
                </div>
                <div id="current-time"></div>
                <table id="calendar">
                    <thead>
                        <tr>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                        </tr>
                    </thead>
                    <tbody id="calendar-body"></tbody>
                </table>
            </div>
            <br>
            <footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
                <div class="w-full mx-auto max-w-screen-xl p-4 mb-5 md:flex md:items-center md:justify-between">
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="https://www.hau.edu.ph/" class="hover:underline">Holy Angel University™</a>. All Rights Reserved.</span>
                </div>
            </footer>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const calendarContainer = document.getElementsByClassName('calendar-container');
                const calendarHeader = document.getElementById('current-month-year');
                const calendarBody = document.getElementById('calendar-body');
                const prevMonthBtn = document.getElementById('prev-month');
                const nextMonthBtn = document.getElementById('next-month');
                const currentTimeDiv = document.getElementById('current-time');

                let today = new Date();
                let currentMonth = today.getMonth();
                let currentYear = today.getFullYear();

                function renderCalendar (month, year) {
                    calendarBody.innerHTML = '';

                    const firstDay = new Date(year, month).getDay();
                    const daysInMonth = new Date(year, month + 1, 0).getDate();

                    const monthNames = [
                        "January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"
                    ];

                    calendarHeader.innerHTML = `${monthNames[month]} ${year}`;

                    let date = 1;
                    for (let i = 0; i < 6; i++) {
                        const row = document.createElement('tr');

                        for (let j = 0; j < 7; j++) {
                            if (i === 0 && j < firstDay) {
                                const cell = document.createElement('td');
                                cell.appendChild(document.createTextNode(''));
                                row.appendChild(cell);
                            } else if (date > daysInMonth) {
                                break;
                            } else {
                                const cell = document.createElement('td');
                                cell.appendChild(document.createTextNode(date));
                                if (date === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                                    cell.classList.add('today');
                                }
                                row.appendChild(cell);
                                date++;
                            }
                        }

                        calendarBody.appendChild(row);
                    }
                }

                function updateTime() {
                    const now = new Date();
                    const hours = now.getHours().toString().padStart(2, '0');
                    const minutes = now.getMinutes().toString().padStart(2, '0');
                    const seconds = now.getSeconds().toString().padStart(2, '0');
                    currentTimeDiv.innerHTML = `Current Time: ${hours}:${minutes}:${seconds}`;
                }

                prevMonthBtn.addEventListener('click', () => {
                    if (currentMonth === 0) {
                        currentMonth = 11;
                        currentYear--;
                    } else {
                        currentMonth--;
                    }
                    renderCalendar(currentMonth, currentYear);
                });

                nextMonthBtn.addEventListener('click', () => {
                    if (currentMonth === 11) {
                        currentMonth = 0;
                        currentYear++;
                    } else {
                        currentMonth++;
                    }
                    renderCalendar(currentMonth, currentYear);
                });
                renderCalendar(currentMonth, currentYear);
                updateTime();
                setInterval(updateTime, 1000);
            });
        </script>
    </body>
</html>