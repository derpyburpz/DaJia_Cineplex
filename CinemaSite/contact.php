<?php
    include 'auth.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
</head>
<body>
    <header>
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
    </header>

    <main>

    </table>
        <br>
        <br>
        <h1>Contact Us</h1>

        <table>
            <tr>
                <th>Name of Company</th>
                <td>Da Jia Organisation</td>
            </tr>
            <tr>
                <th>Business Registration No.</th>
                <td>194700158G</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>50 Nanyang Avenue, South Spine, SS1-01, #05 05A, Singapore 639798</td>
            </tr>
            <tr>
                <th>Email</th>
                <td><a href="mailto: tann0022@e.ntu.edu.sg" style="color: grey;">DaJiaCineplex@dajia.com</a></td>
            </tr>
            <tr>
                <th>Head Office Operating Hours</th>
                <td>10am to 5.30pm (Mondays to Fridays, except on public holidays)</td>
            </tr>
            <tr>
                <th>Cinema Location Operating Hours</th>
                <td>From 30 minutes before the first session to 20 minutes after the last session of the day.
                    Please check respective locations for the timing of the first session of the day.</td>
            </tr>
        </table>
        <br>
        <br>
        <h1>About DaJia Cineplex</h1>

        <table>
            <tr>
                <td>Dajia Cineplex is a vibrant and dynamic cinema located in the heart of Singapore. Established in 2000, we are committed to providing an unparalleled movie-going experience for all our patrons. 

Our state-of-the-art facilities include comfortable seating, advanced sound and projection technology, and a wide selection of food and beverages. We screen a diverse range of films from Hollywood blockbusters to independent films and foreign language cinema, catering to the varied tastes of our audience.

At Dajia Cineplex, we believe in the magic of cinema. Our mission is to create memorable cinematic experiences that inspire, entertain, and bring people together. We look forward to welcoming you to our cinema and sharing the joy of film with you.</th>
            </td>
        </table>
        <br>
        <br>
        <h1>Enter your feedback here</h1>
        <form id="feedback-form">
        <script type="text/javascript" src="contact.js"></script>
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name" placeholder="Enter your name here" required/><br>
            <p id="nameError" style="color:red;"></p>
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" placeholder="Enter your Email here" required/><br>
            <p id="emailError" style="color:red;"></p>
            <label for="feedback">Feedback</label><br>
            <textarea id="feedback" name="feedback" placeholder="Enter your Feedback here" required></textarea><br>
            <p id="feedbackError" style="color:red;"></p>
            <input type="submit" value="Submit">
            
        </form>
        <div id="message"></div>
        
        
        <h1>Terms of Service</h1>
        
        <div class="terms-of-service">
            
            <div class="title-highlight">
                <h2>PRICES</h2>
            </div>
                <div class="jobs-section">
                    <p>All our prices are nett over at our website and cinema ticketing counters. GST is included.</p>
                </div>

            <div class="title-highlight">
                <h2>PAYMENT PROCESSING</h2>
            </div>
                <div class="jobs-section">
                    <p>We accept VISA and MASTERCARD debit and credit card payments. We ensure accuracy in our billing as all our transactions are automatically processed.</p>
                </div>

            <div class="title-highlight">
                <h2>CANCELLATION OF ORDERS and REFUND POLICY</h2>
            </div>
                <div class="jobs-section">
                    <p>We shall be entitled to cancel or terminate our obligations to fulfill any order, for any reason whatsoever, even after an order is confirmed by, and paid for by the customer, with or without notice and we shall not be liable to any party for such termination or cancellation.</p>
                    <p>In such event, we shall refund to the customer the ticket price.</p>
                    <p>We will not entertain any cancellations by the customer once the order is confirmed by, and paid for by the customer.</p>
                </div>

            <div class="title-highlight">
                <h2>EXCHANGE & REFUNDS</h2>
            </div>
                <div class="jobs-section">
                    <p>All tickets, Food & Beverages Combos, Merchandises and Gift Cards sold are non-exchangeable and non-refundable.</p>
                </div>

        </div>    
        
    <br>
    <br>
    <br>
    <p>DaJia Cineplex is a leading cinema operator in Singapore, offering a world-class movie experience since 2000.</p>

    </main>                
    
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
                <img src="image/facebook-logo.png" >
                <img src="image/twitter-logo.png">
                <img src="image/instagram-logo.png">
            </div>
            <div class="supported-payment">
                <h3>Supported Payment Methods</h3>
                <img src="image/visa-logo.png">
                <img src="image/mastercard-logo.png">
                <img src="image/paypal-logo.png">
            </div>
        </div>
		<div>© Copyright 2023 Da Jia Organisation. All rights reserved. Co. Reg. No.: 194700158G</div>
</footer>

</body>
</html>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #282828;
        color: #F5F5F5;
    }

    h1, h2 {
        font-family: 'Courier New', Courier, monospace;
        color: white;
    }


    table {
        width: 100%;
    }

    table, th, td {
        border: 1px solid #ddd;
        border-collapse: collapse;
    }

    th, td {
        padding: 15px;
        text-align: left;
    }

    th {
        color: #F5F5F5;
    }
        
    #feedback-form {
        width: 1000px;
        padding: 16px;
        background-color: #f9f9f9;
        margin-left: 100px;
    }

    #feedback-form label {
        display: inline-block;
        width: 100px;
        color: #000;
    }

    #feedback-form input[type=text],
    #feedback-form textarea {
        width: calc(100% - 110px);
        padding: 12px;
        border: 1px solid #ccc;
        margin-bottom: 16px;
    }

    #feedback-form input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
    }

    /* Error messages */
    #nameError,
    #emailError,
    #feedbackError {
        color: red;
    }

    .jobs-section {
        margin: 0 0 15px;
        color: #F5F5F5;
        background: #282828;
        padding: 15px;
        
    }

    .title-highlight {
        background-color: #594f2f;
        padding: 8px 10px;
        color: white!important;
        margin: 0;
    }

    .terms-of-service, .terms-of-service ul {
        font-size: 18px;
        color: #F5F5F5;
    
    }
</style>