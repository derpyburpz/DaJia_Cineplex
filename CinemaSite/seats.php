<?php
    include 'seats_auth.php';

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'get_seat_availability') {
            $bookedSeats = get_seat_availability($db);
            echo $bookedSeats;
        } elseif ($_GET['action'] == 'get_showtime') {
            $showTime = showtime($db);
            echo $showTime;
        }
         elseif ($_GET['action'] == 'make_booking') {
            $ShowtimeID = $_GET['ShowtimeID'];
            $SeatID = $_GET['SeatID'];
            $result = make_booking($db, $ShowtimeID, $SeatID);
            echo $result;
        }
        exit();
    }

    function get_seat_availability($db) {
        $MovieId = $_GET['MovieId'];
        $TheatreId = $_GET['TheatreId'];
        $SlotId = $_GET['SlotId'];
        $Date = DateTime::createFromFormat('d/m/Y', $_GET['Date'])->format('Y-m-d');
    
        // Get ShowtimeID for respective MovieId, TheatreId, SlotId, and Date
        $query = "SELECT ShowtimeID FROM showtimes WHERE MovieId='$MovieId' AND TheatreId='$TheatreId' AND SlotId='$SlotId' AND ShowDate='$Date'";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
        $ShowtimeID = $row['ShowtimeID'];
    
        // Get booked seats for the showtime
        $query = "SELECT SeatID FROM bookings WHERE ShowtimeID='$ShowtimeID'";
        $result = $db->query($query);
    
        $bookedSeats = [];
        while ($row = $result->fetch_assoc()) {
            $bookedSeats[] = $row['SeatID'];
            
        }

        return implode(',', $bookedSeats);
    }

    function showtime($db) {
        $MovieId = $_GET['MovieId'];
        $TheatreId = $_GET['TheatreId'];
        $SlotId = $_GET['SlotId'];
        $Date = DateTime::createFromFormat('d/m/Y', $_GET['Date'])->format('Y-m-d');
    
        // Get ShowtimeID for respective MovieId, TheatreId, SlotId, and Date
        $query = "SELECT ShowtimeID FROM showtimes WHERE MovieId='$MovieId' AND TheatreId='$TheatreId' AND SlotId='$SlotId' AND ShowDate='$Date'";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
        $ShowtimeID = $row['ShowtimeID'];
    
        return $ShowtimeID;
    }
    
    function make_booking($db, $ShowtimeID, $SeatID) {
        $CustomerID = $_SESSION['CustomerID'];
    
        $stmt = $db->prepare("INSERT INTO bookings (CustomerID, ShowtimeID, SeatID) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $CustomerID, $ShowtimeID, $SeatID);
    
        if ($stmt->execute()) {
            return $db->insert_id;
        } else {
            return "Error: " . $stmt->error;
        }
    }    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/seats.css">   
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
    <div style="text-align: center; margin-top: 30px; font-size: 25px"><b>Screen</b></div>
    <div id="cinema-seats">  
        <div class="row">
        <div style="padding-top: 6px;">A</div>
            <div class="seat" id="1"></div>
            <div class="seat" id="2"></div>
            <div class="seat" id="3"></div>
            <div class="seat" id="4"></div>
            <div class="seat" id="5"></div>
            <div class="seat" id="6"></div>
            <div class="seat" id="7"></div>
            <div class="seat" id="8"></div>
            <div class="seat" id="9"></div>
            <div class="seat" id="10"></div>
            <div class="seat" id="11"></div>
            <div class="seat" id="12"></div>
            <div style="padding-top: 6px;">A</div>
        </div>
        <div class="row">
            <div style="padding-top: 6px;">B</div>
            <div class="seat" id="13"></div>
            <div class="seat" id="14"></div>
            <div class="seat" id="15"></div>
            <div class="seat" id="16"></div>
            <div class="seat" id="17"></div>
            <div class="seat" id="18"></div>
            <div class="seat" id="19"></div>
            <div class="seat" id="20"></div>
            <div class="seat" id="21"></div>
            <div class="seat" id="22"></div>
            <div class="seat" id="23"></div>
            <div class="seat" id="24"></div>
            <div style="padding-top: 6px;">B</div>
        </div>
        <div class="row">
            <div style="padding-top: 6px;">C</div>
            <div class="seat" id="25"></div>
            <div class="seat" id="26"></div>
            <div class="seat" id="27"></div>
            <div class="seat" id="28"></div>
            <div class="seat" id="29"></div>
            <div class="seat" id="30"></div>
            <div class="seat" id="31"></div>
            <div class="seat" id="32"></div>
            <div class="seat" id="33"></div>
            <div class="seat" id="34"></div>
            <div class="seat" id="35"></div>
            <div class="seat" id="36"></div>
            <div style="padding-top: 6px;">C</div>
        </div>
        <div class="row">
            <div style="padding-top: 6px;">D</div>
            <div class="seat" id="37"></div>
            <div class="seat" id="38"></div>
            <div class="seat" id="39"></div>
            <div class="seat" id="40"></div>
            <div class="seat" id="41"></div>
            <div class="seat" id="42"></div>
            <div class="seat" id="43"></div>
            <div class="seat" id="44"></div>
            <div class="seat" id="45"></div>
            <div class="seat" id="46"></div>
            <div class="seat" id="47"></div>
            <div class="seat" id="48"></div>
            
            <div style="padding-top: 6px;">D</div>
        </div>
        <div class="row">
            <div style="padding-top: 6px;">E</div>
            <div class="seat" id="49"></div>
            <div class="seat" id="50"></div>
            <div class="seat" id="51"></div>
            <div class="seat" id="52"></div>
            <div class="seat" id="53"></div>
            <div class="seat" id="54"></div>
            <div class="seat" id="55"></div>
            <div class="seat" id="56"></div>
            <div class="seat" id="57"></div>
            <div class="seat" id="58"></div>
            <div class="seat" id="59"></div>
            <div class="seat" id="60"></div>
            
            <div style="padding-top: 6px;">E</div>
        </div>
        <div class="row">
            <div style="padding-top: 6px;">F</div>
            <div class="seat" id="61"></div>
            <div class="seat" id="62"></div>
            <div class="seat" id="63"></div>
            <div class="seat" id="64"></div>
            <div class="seat" id="65"></div>
            <div class="seat" id="66"></div>
            <div class="seat" id="67"></div>
            <div class="seat" id="68"></div>
            <div class="seat" id="69"></div>
            <div class="seat" id="70"></div>
            <div class="seat" id="71"></div>
            <div class="seat" id="72"></div>
            
            <div style="padding-top: 6px;">F</div>
        </div>
        <div class="row">
            <div style="padding-top: 6px;">G</div>
            <div class="seat" id="73"></div>
            <div class="seat" id="74"></div>
            <div class="seat" id="75"></div>
            <div class="seat" id="76"></div>
            <div class="seat" id="77"></div>
            <div class="seat" id="78"></div>
            <div class="seat" id="79"></div>
            <div class="seat" id="80"></div>
            <div class="seat" id="81"></div>
            <div class="seat" id="82"></div>
            <div class="seat" id="83"></div>
            <div class="seat" id="84"></div>
            <div style="padding-top: 6px;">G</div>
        </div>
    </div>

    <div id="legend">
        <div class="seat available"></div> <text style="padding-top: 6px;">Available</text>
        <div class="seat booked"></div> <text style="padding-top: 6px;">Booked</text>
    </div>

    <button id="confirm-btn">Next</button>

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
        window.onload = function() {
            var urlParams = new URLSearchParams(window.location.search);
            var MovieId = urlParams.get('MovieId');
            var TheatreId = urlParams.get('TheatreId');
            var SlotId = urlParams.get('SlotId');
            var Date = urlParams.get('Date');

            fetch('?action=get_seat_availability&MovieId=' + MovieId + '&TheatreId=' + TheatreId + '&SlotId=' + SlotId + '&Date=' + Date)
                .then(response => response.text())
                .then(data => {
                    var bookedSeats = data.split(',');
                    console.log('Booked seats: ' + bookedSeats);
    
                    console.log(bookedSeats);  // Log the bookedSeats array
                    var seats = document.getElementsByClassName('seat');
                    for (var i = 0; i < seats.length; i++) {
                        var seatId = parseInt(seats[i].id, 10).toString();
                        // console.log(seatId);  // Log each seatId

                        // Add the 'booked' class to booked seats
                        if (bookedSeats.includes(seatId)) {
                            seats[i].classList.add('booked');
                        } else {
                            seats[i].classList.add('available');

                            // Selectable seats
                            seats[i].addEventListener('click', function() {
                                if (this.classList.contains('selected')) {
                                    this.classList.remove('selected');
                                } else {
                                    this.classList.add('selected');
                                }
                            });
                        }
                    }
                });
        };

        document.getElementById('confirm-btn').addEventListener('click', function() {
            var urlParams = new URLSearchParams(window.location.search);
            var MovieId = urlParams.get('MovieId');
            var TheatreId = urlParams.get('TheatreId');
            var SlotId = urlParams.get('SlotId');
            var Date = urlParams.get('Date');

            // Fetch ShowtimeID
            fetch('?action=get_showtime&MovieId=' + MovieId + '&TheatreId=' + TheatreId + '&SlotId=' + SlotId + '&Date=' + Date)
                .then(response => response.text())
                .then(ShowtimeID => {
                    console.log('Showtime ID: ' + ShowtimeID);

                    // Get selected seats
                    var selectedSeats = Array.from(document.getElementsByClassName('selected')).map(function(seat) {
                        return parseInt(seat.id, 10);
                    });

                    var movieNames = {
                        '1': 'Teenage Mutant Ninja Turtles: Mutant Mayhem',
                        '2': 'The Dive',
                        '3': 'The Equalizer 3'
                    };

                    var slotTimes = {
                        '1': '10:00am',
                        '2': '01:00pm',
                        '3': '04:00pm',
                        '4': '07:00pm',
                        '5': '10:00pm'
                    };

                    var theatreNames = {
                        '1': 'Da Jia Cineplex Nanyang Technological University',
                        '2': 'Da Jia Cineplex Tampines'
                    };

                    var bookingDetails = 'Date: ' + Date + '\n' +
                                        'Time Slot: '+ slotTimes[SlotId] + '\n' +
                                        'Movie: ' + movieNames[MovieId] + '\n' +
                                        'Theatre: ' + theatreNames[TheatreId] + '\n' +
                                        'Seat Number(s): ' + selectedSeats.join(', ');

                    // Confirm booking
                    var confirmed = confirm('Are you sure you want to confirm the following booking?' + '\n' + '\n' + bookingDetails);
                    if (!confirmed) {
                        return;
                    }

                    // Old selected seat no alert
                    selectedSeats.forEach(function(SeatID) {
                        fetch('?action=make_booking&ShowtimeID=' + ShowtimeID + '&SeatID=' + SeatID)
                            .then(response => response.text())
                            .then(result => {
                                if (result !== 'Error') {
                                    alert('Booking confirmed!');
                                    window.location.href = 'index.php';
                                } else {
                                    console.error('Error:', result);
                                }
                            });
                    });
                });
        });


        function openForm() {
            document.getElementById("myForm").style.display = "block";
            }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
            }
            
        function signOut() {
            fetch('signout.php')
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    window.location.href = 'index.php';
                } else {
                    console.error('Error:', data);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }

        function openProfile() {
            window.location.href = "profilepage.php";
        }
    </script>
</body>
</html>
