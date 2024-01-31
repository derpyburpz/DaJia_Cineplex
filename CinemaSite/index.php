<?php
    include 'auth.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/theme.css">
    <title>Cinema Ticketing Site</title>
    <script type="text/javascript" src="index.js"></script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php"><img class="logo" src="./image/logo.webp" alt="Logo"> Home</a></li>
            <li><a href="movies.php">Movies</a></li>
            <li><a href="theatres.php">Theatres</a></li>
            <li><a href="showtimes.php">Showtimes</a></li>
            <li><a href="#promotions">Promotions</a></li>
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

    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="./image/slideshow3.png" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="./image/movie2.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="./image/slideshow1.png" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <h1>Welcome to DaJia Cineplexes Ticketing Site!</h1>
    <p>We are delighted to meet your movie viewing needs!</p>

    <main>
        <section class="tabs">
            <button class="tab active">Now Showing</button>
        </section>

    <div class="movie-container">
        <!-- Movie 1 -->
        <div class="movie">
            <div class="movie-card">
            <img src="image/movie1.jpg" alt="Movie 1">
            <h2>Teenage Mutant Ninja Turtles</h2>
            <span class="rating">PG13, some violence</span>
            <button><a href="moviedetails.php">More Details</a></button>
            </div>
        </div>

        <!-- Movie 2 -->
        <div class="movie">
            <div class="movie-card">
            <img src="image/movie2.jpg" alt="Movie 2">
            <h2>The Dive</h2>
            <span class="rating">PG13, some violence</span>
            <button><a href="movies.php">More Details</a></button>
            </div>
        </div>

        <!-- Movie 3 -->
        <div class="movie">
            <div class="movie-card">
            <img src="image/movie3.jpg" alt="Movie 3">
            <h2>The Equliser 3</h2>
            <span class="rating">PG13, some violence</span>
            <button><a href="movies.php">More Details</a></button>
            </div>
        </div>

         <!-- Movie 4 -->
         <div class="movie">
            <div class="movie-card">
            <img src="image/movie4.jpg" alt="Movie 4">
            <h2>Oppenheimer</h2>
            <span class="rating">PG13, some violence</span>
            <button><a href="movies.php">More Details</a></button>
            </div>
        </div>

         <!-- Movie 5 -->
         <div class="movie">
            <div class="movie-card">
            <img src="image/movie5.jpg" alt="Movie 5">
            <h2>IT Lives Inside</h2>
            <span class="rating">PG13, some violence</span>
            <button><a href="movies.php">More Details</a></button>
            </div>
        </div>

         <!-- Movie 6 -->
         <div class="movie">
            <div class="movie-card">
            <img src="image/movie6.jpg" alt="Movie 6">
            <h2>Dunkirk</h2>
            <span class="rating">PG13, some violence</span>
            <button><a href="movies.php">More Details</a></button>
            </div>
        </div>

        <!-- Movie 7 -->
        <div class="movie">
            <div class="movie-card">
            <img src="image/movie7.jpg" alt="Movie 7">
            <h2>The Eras Tour</h2>
            <span class="rating">PG13, some violence</span>
            <button><a href="movies.php">More Details</a></button>
            </div>
        </div>

        <!-- Movie 8 -->
        <div class="movie">
            <div class="movie-card">
            <img src="image/movie8.jpg" alt="Movie 8">
            <h2>Five Nights At Freddy's</h2>
            <span class="rating">PG13, some violence</span>
            <button><a href="movies.php">More Details</a></button>
            </div>
        </div>

        <!-- Movie 9 -->
        <div class="movie">
            <div class="movie-card">
            <img src="image/movies9.jpg" alt="Movies 9">
            <h2>Smile</h2>
            <span class="rating">PG13, some violence</span>
            <button><a href="movies.php">More Details</a></button>
            </div>
        </div>
      
    </div>
    <h1 id="promotions">Promotions</h1>

    <div class="promotion">
    <div class="item">
        <img src="image/promotion1.jpg" alt="Promotion 1">
        <p>Meet & Greet POPPY and BRANCH from TROLLS</p>
    </div>
  
    <div class="item">
        <img src="image/promotion3.jpg" alt="Promotion 1">
        <p>2023 SAFRA Movie Perks Every Day</p>
    </div>
    <div class="item">
        <img src="image/promotion4.jpg" alt="Promotion 2">
        <p>Cheesy Chicken and Bites Combos</p>
    </div>
</div>
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
</body>
</html>

<style>
    /* movies.php style overwrite */
    html {
        scroll-behavior: smooth;
    }

    .tab {
        font-size: 30px;
        padding: 10px 20px;
    }

    .movie-container {
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        margin: 0 auto;
        max-width: 100%;
        flex-wrap: wrap;
    }

    .movie {
        flex: 0 0 auto;
        margin: 1%;
        width: calc(100% / 3 - 2%); /* Scaling for movie container */
    }

    .movie img {
        width: 100%;
    }

    .movie h2 {
        font-size: 24px;
    }

    .movie p {
        font-size: 18px;
    }

    .movie button {
        padding: 10px 20px;
        font-size: 18px;
    }

    .movie-card {
        position: relative;
    }

    .movie-card img {
        width: 100%;
        transition: .3s;
    }

    .movie-card:hover img {
        filter: brightness(50%);
    }

    .movie-card h2, .movie-card button, .movie-card .rating {
        position: absolute;
        opacity: 0;
        transition: .3s;
    }

    .movie-card:hover h2, .movie-card:hover button, .movie-card:hover .rating {
        opacity: 1;
    }

    .movie-card h2 {
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }

    .movie-card .rating {
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }

    .movie-card button {
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }
    .promotion {
        display: flex;
        justify-content: space-around;
    }

    .item {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .item img {
        width: 100%;
        margin: 10px;
    }

    .item p {
        margin: 10px;
        text-align: center;
    }

    body {
            font-family: Arial, sans-serif;
    }

    h1 {
        font-family: 'Courier New', Courier, monospace;
    }

    p {
        font-family: 'Times New Roman', Times, serif;
    }

    body {
        background-color: black;
        color: white;
    }
</style>
