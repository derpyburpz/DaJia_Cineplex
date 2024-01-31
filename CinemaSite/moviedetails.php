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
        <br>
        <!-- Movie 1 -->
        <div class="movie1">
            <img src="image/movie1.jpg" alt="Movie 1">
            <div>
            <h2>Teenage Mutant Ninja Turtles: Mutant Mayhem</h2>
            <p><strong>Running Time:</strong> 120 minutes<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rating:</strong> PG-13</p>
            <br>
            <br>
            <button><a href="showtimes.php?movie=1">Book Now</a></button>
            </div>
        </div>
        <br>
        <div class="synopsis">
            <h2>Synopsis</h2>
                <p>Fifteen years ago, a Techno Cosmic Research Institute strike force is ordered by executive Cynthia Utrom to capture rogue scientist Baxter Stockman, who stole company secrets and technology, and any research. Desiring a family, Stockman creates a mutagen to create his own mutant family, starting with a housefly maggot. Before he can create more mutagen, the strike force arrives. While it is dealt with by the fly mutant, an explosion in the fight destroys the lab and most of the research while killing Stockman. Additional TCRI forces arrive and collect the remainder of the surviving research, but forget the mutant and the last canister of mutagen, the latter of which falls into the sewers below.
                <br><br>In the present, in New York City, four turtles (Michaelangelo, Leonardo, Raphael, and Donatello) have been raised by their adoptive father Splinter. While they are adept in the arts of ninjitsu, they are instructed to only leave for the surface world to get supplies for their home in the sewers.
                <br><br>The film follows the Turtle brothers as they work to earn the love of New York City while facing down an army of mutants.
                After years of being sheltered from the human world, the Turtles set out to win the hearts of New Yorkers and be accepted as normal teenagers through heroic acts. But they soon get in over their heads when an army of mutants is unleashed upon them.</p>
        </div>
        
        <div class="top-cast">
            <h2>Top Cast</h2>
            <img src="image/cast.jpg" alt="Top Cast">
        </div>

        <h2>Subtititles</h2>
        <p>Chinese Subtitles available</p>
        <h2>Director</h2>
        <p>Jeff Rowe . Kyler Spears</p>
        <h2>Writers</h2>
        <p>Seth Rogen . Evan Goldberg . Jeff Rowe</p>
        <h2>Language</h2>
        <p>English</p>
        <h2>Release Date</h2>
        <p>Sun, 5 Nov 2023</p>
        
        <p>Watch the trailer now!</p>
        <a href="https://www.youtube.com/watch?v=IHvzw4Ibuho" target="_blank">
            <p><img src="image/trailer_icon.jpg" alt="Trailer Icon"></p>
        </a>


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
    .movie1 {
        display: flex;
        align-items: start;
        gap: 20px;
        margin-bottom: 20px;
    }

    .movie1 img {
        flex: 5;
        max-width: 2000px;
        object-fit: cover;
    }

    .movie1 div {
        flex: 7;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .movie1 button {
        align-self: flex-start;
        background-color: #ff6347;
        color: white;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 18px;
    }

    .movie1 button a {
        text-decoration: none;
        color: white;
    }

    .top-cast img {
        width: 100%;
        height: auto;
    }
</style>
