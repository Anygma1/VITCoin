<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>History</title>
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
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Pay</a></li>
          <li><a href="addmoney.php">Add VITCoins</a></li>
          <li class="active"><a href="orders.php">My Orders</a></li>
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




    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>My Transaction History</h3>
        <hr>

        <?php
          $user = $_SESSION["username"];
          $result = $mysqli->query("SELECT id, payment_to, current_total, DATE_FORMAT(date_now,'%d.%m.%Y at %k:%i') as posteddate from user_log where email='".$user."'");
          if($result) {
            while($obj = $result->fetch_object()) {
              //echo '<div class="large-6">';
              echo '<h4>Order ID:'.$obj->id.'</h4>';
              echo '<p><strong>Date: </strong> '.$obj->posteddate.'</p>';
              echo '<p><strong>Payment To:</strong> '.$obj->payment_to.'</p>';
              echo '<p><strong>Amount:</strong> '.$currency.$obj->current_total.'</p>';
              //echo '</div>';
              //echo '<div class="large-6">';
              //echo '<img src="images/products/sports_band.jpg">';
              //echo '</div>';
              echo '<p><hr></p>';

            }
          }
        ?>
      </div>
      <hr>
    </div>




    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer style="margin-top:10px;">
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
