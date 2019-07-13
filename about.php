<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <?php
          if(isset($_SESSION['username'])) {
              $user = $_SESSION["username"];
              $result = $mysqli->query("SELECT wallet from users where email='".$user."'");
              if($result){
                $obj = $result->fetch_object();
                echo '<h1 style="color: white; margin-left: 20px;">Wallet: '.$obj->wallet.'<img src="images/coi1ns.png" style="width:40px;height:40px;"></h1>';
              }
          }
          else
            echo '<h1><a href="index.php">VITCoins</a></h1>';
        ?>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li class="active"><a href="about.php">About</a></li>
          <?php
              if(isset($_SESSION['username'])){
                echo '<li><a href="products.php">Pay</a></li>';
                echo '<li><a href="addmoney.php">Add VITCoins</a></li>';
                echo '<li><a href="orders.php">My Orders</a></li>';
              }
          ?>
          <li><a href="contact.php">Contact</a></li>
          <?php
    
          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <p>In the ongoing internet boom across the world and the mission of Digital India to simplify every aspect of life, why should we VITians stay behind? All of us have experienced that whenever we want to buy/pay for something, we either don't have the money, or we have too much money, i.e. the shopkeepers have no change to pay us back!</p>

        <p>Therefore this project aims to develop a fully functional website that will cater the needs of tech-savvy VITians which will enable the user to pay for every service available in VIT minus the hassle of buying goods offline. </p>

        <p>The project involves the use of programming languages like JavaScript, HTML, CSS for the front-end i.e. for developing the website and PHP and SQL for back-end to ensure data gets stored and retrieved from the database. It then uses XAMMP for compiling and running the complete project. </p>

        <p>This website will thus ensure a hassle free shopping experience with a comfortable User Interface with a secure database and a proper transaction history that will make life much more easier, benefitting both the buyers and the sellers.</p>
        <center><p>This project is done by<br>
          Anirban Mukherjee - 16BIT0200<br>
          Sarthak Shubham – 16BIT0455<br>
		  Aditya Samota – 16BIT0457<br>

        </p>


        <hr></p>
		<footer>
           <p style="text-align:center; font-size:0.8em;">&copy; VITCoins! All Rights Reserved.</p>
        </footer>

      </div>
    </div>







    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
