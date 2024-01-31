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
        <section class="tabs">
            <h1 style="padding-left: 15px; font-size:32px">Now Showing</h1>
        </section>
        <br>
        
        <!-- Movie 1 -->
        <div class="movie1">
            <img src="image/movie1.jpg" alt="Movie 1">
            <div>
                <h2>Teenage Mutant Ninja Turtles: Mutant Mayhem</h2>
                <button><a href="showtimes.php?movie=1">Book Now</a></button>
                <p>The film follows the Turtle brothers as they work to earn the love of New York City while facing down an army of mutants.</p>
            </div>
        </div>
      
        <!-- Movie 2 -->
        <div class="movie1">
            <img src="image/movie2.jpg" alt="Movie 2">
            <div>
              <h2>The Dive</h2>
              <button><a href="showtimes.php?movie=2">Book Now</a></button>
              <p>Two sisters go diving at a beautiful, remote location. One of the sisters is struck by a rock, leaving her trapped 28 meters below. 
              With dangerously low levels of oxygen and cold temperatures, it is up to her sister to fight for her life.</p>
            </div> 
        </div>

        <!-- Movie 3 -->
        <div class="movie1">
          <img src="image/movie3.jpg" alt="Movie 3">
            <div>
                <h2>The Equaliser 3</h2>
                <button><a href="showtimes.php?movie=3">Book Now</a></button>
                <p>Robert McCall finds himself at home in Southern Italy but he discovers his friends are under the control of local crime bosses. 
                As events turn deadly, McCall knows what he has to do: become his friends' protector by taking on the mafia</p>         
            </div>
        </div>

        <!-- Movie 4 -->
        <div class="movie1">
            <img src="image/movie4.jpg" alt="Movie 4">
            <div>
            <h2>Oppenheimer</h2>
              <button><a href="showtimes.php">Book Now</a></button>
              <p>The story of American scientist, J. Robert Oppenheimer, and his role in the development of the atomic bomb.</p>
            </div> 
        </div>

        <!-- Movie 5 -->
        <div class="movie1">
            <img src="image/movie5.jpg" alt="Movie 5">
            <div>
              <h2>IT Lives Inside</h2>
              <button><a href="showtimes.php">Book Now</a></button>
              <p>An Indian-American teenager struggling with her cultural identity has a falling out with her former best friend and, in the process, unwittingly releases a demonic entity that grows stronger by feeding on her loneliness.</p>
            </div> 
        </div>

        <!-- Movie 6 -->
        <div class="movie1">
            <img src="image/movie6.jpg" alt="Movie 6">
            <div>
              <h2>Dunkirk</h2>
              <button><a href="showtimes.php">Book Now</a></button>
              <p>Allied soldiers from Belgium, the British Commonwealth and Empire, and France are surrounded by the German Army and evacuated during a fierce battle in World War II.</p>
            </div> 
        </div>

        <!-- Movie 7 -->
        <div class="movie1">
            <img src="image/movie7.jpg" alt="Movie 7">
            <div>
              <h2>Taylor Swift: The Eras Tour</h2>
              <button><a href="showtimes.php">Book Now</a></button>
              <p>Experience the breathtaking Eras Tour concert, performed by the one and only Taylor Swift.</p>
            </div> 
        </div>

        <!-- Movie 8 -->
        <div class="movie1">
            <img src="image/movie8.jpg" alt="Movie 8">
            <div>
              <h2>Five Nights at Freddys'</h2>
              <button><a href="showtimes.php">Book Now</a></button>
              <p>A troubled security guard begins working at Freddy Fazbear's Pizza. During his first night on the job, he realizes that the night shift won't be so easy to get through. Pretty soon he will unveil what actually happened at Freddy's.</p>
            </div> 
        </div>

        <!-- Movie 9 -->
        <div class="movie1">
            <img src="image/movies9.jpg" alt="Movie 9">
            <div>
              <h2></h2>
              <button><a href="showtimes.php">Book Now</a></button>
              <p>After witnessing a bizarre, traumatic incident involving a patient, a psychiatrist becomes increasingly convinced she is being threatened by an uncanny entity.</p>
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
        border-radius: 8px;
        padding: 20px 12px;
        font-size: 18px;
        text-decoration: none;
    }

    button a {
        text-decoration: none;
        color: white;
    }
</style>
