<?php
    include 'auth.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/mybooking.css">
    <title>Cinema Ticketing Site</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php"><img class="logo" src="./image/logo.webp" alt="Logo"> Home</a></li>
            <li><a href="movies.php">Movies</a></li>
            <li><a href="theatres.php">Theatres</a></li>
            <li><a href="showtimes.php">Showtimes</a></li>
            <?php if (!isset($_SESSION['email'])): ?>
                <li class="right"><button class="form-button" onclick="openForm()">Login/Register</button></li>
            <?php else: ?>
                <li class="right"><button class="form-button" style="padding-top: 15px;" onclick="signOut()">🚪 Sign Out</button></li>
                <!-- <li class="right"><button class="form-button" style="padding-top: 15px;" onclick="openProfile()">👤 My Profile</button></li>                -->
            <?php endif; ?>
            <li class="right"><a href="contact.php">Contact us ➤</a></li>
            <li class="right"><a href="mybooking.php">My Bookings ➤</a></li>        
        </ul>
    </nav>
    <h1 style="text-align: center;">My Bookings</h1>

    <form id="searchForm" action="mybooking.php" method="post">
        <input type="text" id="searchInput" name="search" style="width: 50%;" placeholder="Search by Email Address">
        <button type="submit" style="transition: none;">Search</button>
    </form>

    <div id="tableContainer" style="margin-bottom: 20px"></div>          

    <!-- Login/Register Form -->
    <div class="form-popup" id="myForm" style="display: none;">
        <form action="index.php" method="post" class="form-container login-form">
            <span class="close-btn" onclick="closeForm()">×</span>
            <h1 style="text-align: center;">Login</h1>
            <label for="email"><b>Email: </b></label>
            <input type="text" placeholder="Enter Email" name="email" style="width: 550px" required>
            <br>
            <label for="psw"><b>Password:</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <br>
            <button type="submit" class="btn login-btn">Login</button>
            <button type="submit" class="btn register-btn" name="register" style="text-align: center">Register</button>
        </form>
    </div>
    <footer>
        <div class="footer-container">
            <div class="connecting-with-us">
                <h3>Connecting With Us</h3>      
                <img src="./image/facebook-logo.png" >
                <img src="./image/twitter-logo.png">
                <img src="./image/instagram-logo.png">
            </div>
            <div class="supported-payment">
                <h3>Supported Payment Methods</h3>
                <img src="./image/visa-logo.png">
                <img src="./image/mastercard-logo.png">
                <img src="./image/paypal-logo.png">
            </div>
        </div>
        <div>© Copyright 2023 Da Jia Organisation. All rights reserved. Co. Reg. No.: 194700158G</div>
    </footer>
    <script>
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var searchInput = document.getElementById('searchInput').value;

            fetch('get_bookings.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'search=' + encodeURIComponent(searchInput)
            })
            .then(response => response.text())
            .then(data => {
                // Insert table into div
                document.getElementById('tableContainer').innerHTML = data;
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    </script>            
</body>
</html>
