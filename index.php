<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VITCoins</title>
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
        ?>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><center><a style="margin-left:50npx" href="index.php">VITCoins</a></center></li>
          <li><a href="about.php">About</a></li>
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




    <img src="images/bg1.jpg">
    <noscript><img src="images/bolt-landscape.jpg"></noscript>
    <hr>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; VITCoins! All Rights Reserved.
           </p>
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
