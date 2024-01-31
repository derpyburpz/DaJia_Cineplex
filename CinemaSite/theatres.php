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
            <li><a href="#">Theatres</a></li>
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

    <!-- Page content -->
    <main>
        <section class="tabs">
          <h1 style="padding-left: 25px; font-size:32px">Theatres</h1>
        </section>

        <div class="theatre-container">
            <div class="theatre-card">
              <img src="image/THEATRE4.jpg" alt="Theatre 1">
              <h2>Da Jia Cineplex NTU</h2>
              <a href="https://maps.google.com/?q=Theatre+1+Address" style="color: grey;">50 Nanyang Avenue, South Spine, SS1-01, #05 05A, Singapore 639798</a>
              <p>Nearest MRT: Boon Lay</p>
              
            </div>
          
            <div class="theatre-card">
              <img src="image/THEATRE5.jpg" alt="Theatre 2">
              <h2>Da Jia Cineplex Tampines</h2>
              <a href="https://maps.google.com/?q=Theatre+2+Address" style="color: grey;">4 Tampines Central 4, #04-17/18 Tampines Mall Shopping Centre, Singapore 52951</a>
              <p>Nearest MRT: Tampines</p>
              
            </div>
          
            <div class="theatre-card">
              <img src="image/THEATRE6.jpg" alt="Theatre 3">
              <h2>Da Jia Cineplex Dhouby Ghuat</h2>
              <a href="https://maps.google.com/?q=Theatre+3+Address" style="color: grey;">68 Orchard Rd, #06-19/20 Plaza Singapura, Singapore 238839</a>
              <p>Nearest MRT: Dhouby Ghuat</p>
              
            </div>

            <div class="theatre-card">
              <img src="image/THEATRE7.jpg" alt="Theatre 4">
              <h2>Da Jia Cineplex IMM</h2>
              <a href="https://maps.google.com/?q=Theatre+3+Address" style="color: grey;">2 Jurong East Street 21, #08-20 IMM, Singapore 609601</a>
              <p>Nearest MRT: Jurong East</p>
              
            </div>
            
            <div class="theatre-card">
              <img src="image/THEATRE8.jpg" alt="Theatre 5">
              <h2>Da Jia Cineplex Central</h2>
              <a href="https://maps.google.com/?q=Theatre+3+Address" style="color: grey;">3A River Valley Road, #01-02 Clarke Quay, Singapore 179020</a>
              <p>Nearest MRT: Clarke Quay</p>
              
            </div>

            <div class="theatre-card">
              <img src="image/THEATRE9.jpg" alt="Theatre 6">
              <h2>Da Jia Cineplex Suntec</h2>
              <a href="https://maps.google.com/?q=Theatre+3+Address" style="color: grey;">1 Raffles Blvd, #03-09/10 Suntec City, Singapore 039593</a>
              <p>Nearest MRT: Promenade</p>
  
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
    .tab {
      font-size: 30px;
      padding: 10px 20px;
    }
    
    .theatre-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-direction: row;
      margin: 0 auto;
      max-width: 100%;
      flex-wrap: wrap;
    }
    
    .theatre-card {
      flex: 0 0 auto;
      margin: 1%;
      width: calc(100% / 3 - 2%);
    }
    
    .theatre-card img {
      width: 100%;
    }
    
    .theatre-card h2 {
      font-size: 24px;
    }
    
    .theatre-card p {
      font-size: 18px;
    }
    
    .theatre-card button {
      padding: 10px 20px;
      font-size: 18px;
    }
</style>
    