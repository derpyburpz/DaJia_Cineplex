<?php
    include 'auth.php';
?>  

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/showtimes.css">
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

            <h1 style="padding-left: 15px">Showtimes</h1>

            <!-- Filters -->
            <div class="filters">
                <select id="dateFilter">
                    <option value="">Select A Date</option>
                </select>

                <select id="movieFilter" onchange="filterMovies(this.value)">
                    <option value="">All Movies</option>
                    <option value="1">Teenage Mutant Ninja Turtles: Mutant Mayhem</option>
                    <option value="2">The Dive</option>
                    <option value="3">The Equalizer 3</option>
                </select>

                <select id="cinemaFilter" onchange="filterCinemas(this.value)">
                    <option value="">All Cinemas</option>
                    <option value="1">Da Jia Cineplex Nanyang Technological University</option>
                    <option value="2">Da Jia Cineplex Tampines</option>
                </select>
            </div>

            <!-- Showtimes & Cinemas -->
            <div class="showtimes">
                <div class="cinema" id="1">
                    <h2 class="cinema-title" style="display: block;">Da Jia Cineplex Nanyang Technological University</h2>                       
                        <div class="movies">    
                            <div class="movie" id="1">
                                <img src="./image/movie1.jpg" alt="Movie 1">
                                <div class="showtime" onclick="openSeating(1, 1, 1)">10:00am</div>
                                <div class="showtime" onclick="openSeating(1, 1, 2)">01:00pm</div>
                                <div class="showtime" onclick="openSeating(1, 1, 3)">04:00pm</div>
                                <div class="showtime" onclick="openSeating(1, 1, 4)">07:00pm</div>
                                <div class="showtime" onclick="openSeating(1, 1, 5)">10:00pm</div>
                            </div>
                        
                            <div class="movie" id="2">
                                <img src="./image/movie2.jpg" alt="Movie 2">
                                <div class="showtime"  onclick="openSeating(2, 1, 1)">10:00am</div>
                                <div class="showtime"  onclick="openSeating(2, 1, 2)">01:00pm</div>
                                <div class="showtime"  onclick="openSeating(2, 1, 3)">04:00pm</div>
                                <div class="showtime"  onclick="openSeating(2, 1, 4)">07:00pm</div>
                                <div class="showtime"  onclick="openSeating(2, 1, 5)">10:00pm</div>
                            </div>
                                
                            <div class="movie" id="3">
                                <img src="./image/movie3.jpg" alt="Movie 3">
                                <div class="showtime"  onclick="openSeating(3, 1, 1)">10:00am</div>
                                <div class="showtime"  onclick="openSeating(3, 1, 2)">01:00pm</div>
                                <div class="showtime"  onclick="openSeating(3, 1, 3)">04:00pm</div>
                                <div class="showtime"  onclick="openSeating(3, 1, 4)">07:00pm</div>
                                <div class="showtime"  onclick="openSeating(3, 1, 5)">10:00pm</div>
                            </div>
                        </div>             
                    </div>
                </div>
                 
                <div class="cinema" id="2">
                    <h2 class="cinema-title" style="display: block;">Da Jia Cineplex Tampines</h2>
                        <div class="movies">
                            <div class="movie" id="1">
                                <img src="./image/movie1.jpg" alt="Movie 1">
                                <div class="showtime" onclick="openSeating(1, 3, 1)">10:00am</div>
                                <div class="showtime" onclick="openSeating(1, 3, 2)">01:00pm</div>
                                <div class="showtime" onclick="openSeating(1, 3, 3)">04:00pm</div>
                                <div class="showtime" onclick="openSeating(1, 3, 4)">07:00pm</div>
                                <div class="showtime" onclick="openSeating(1, 3, 5)">10:00pm</div>
                            </div>
                                        
                            <div class="movie" id="2">
                                <img src="./image/movie2.jpg" alt="Movie 2">
                                <div class="showtime"  onclick="openSeating(2, 3, 1)">10:00am</div>
                                <div class="showtime"  onclick="openSeating(2, 3, 2)">01:00pm</div>
                                <div class="showtime"  onclick="openSeating(2, 3, 3)">04:00pm</div>
                                <div class="showtime"  onclick="openSeating(2, 3, 4)">07:00pm</div>
                                <div class="showtime"  onclick="openSeating(2, 3, 5)">10:00pm</div>
                            </div>
                    
                            <div class="movie" id="3">
                                <img src="./image/movie3.jpg" alt="Movie 3">
                                <div class="showtime"  onclick="openSeating(3, 3, 1)">10:00am</div>
                                <div class="showtime"  onclick="openSeating(3, 3, 2)">01:00pm</div>
                                <div class="showtime"  onclick="openSeating(3, 3, 3)">04:00pm</div>
                                <div class="showtime"  onclick="openSeating(3, 3, 4)">07:00pm</div>
                                <div class="showtime"  onclick="openSeating(3, 3, 5)">10:00pm</div>
                            </div> 
                        </div>                  
                    </div>
                </div>

            <script>
                window.onload = function() {
                    var urlParams = new URLSearchParams(window.location.search);
                    var movie = urlParams.get('movie');
                    if (movie) {
                        filterMovies(movie);
                    }
                };

                // Populate date filter
                var select = document.getElementById("dateFilter");

                for (var i = 0; i <= 10; i++) {
                    var date = new Date();
                    date.setDate(date.getDate() + i);

                    var day = date.getDate();
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();

                    var option = document.createElement("option");
                    option.text = day + "/" + month + "/" + year;
                    option.value = day + "/" + month + "/" + year;

                    select.add(option);
                }

                function filterMovies(value) {
                    var cinemas = document.getElementsByClassName('cinema');
                    for (var i = 0; i < cinemas.length; i++) {
                        var movies = cinemas[i].getElementsByClassName('movie');
                        for (var j = 0; j < movies.length; j++) {
                            movies[j].style.display = value && movies[j].id !== value ? 'none' : 'block';
                        }
                    }
                }

                function filterCinemas(value) {
                    var cinemas = document.getElementsByClassName('cinema');
                    for (var i = 0; i < cinemas.length; i++) {
                        cinemas[i].style.display = value && cinemas[i].id !== value ? 'none' : 'flex';
                    }
                    filterMovies(document.getElementById('movieFilter').value);
                }

                function openSeating(MovieId, TheatreId, SlotId) {
                    var date = document.getElementById("dateFilter").value;
                    if (date === "") {
                        alert("Please select a date.");
                        return;
                    }
                    window.location.href = "seats.php?MovieId=" + MovieId + "&TheatreId=" + TheatreId + "&SlotId=" + SlotId + "&Date=" + date;
                }
            </script>

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
.showtime:hover {
    cursor: pointer;
}
</style>