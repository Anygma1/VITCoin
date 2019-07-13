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
    <title>Pay</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <style>
		input[type=number], input[type=password], select {
		    width: 70%;
		    padding: 12px 20px 8px;
		    margin: 8px 0;
		    display: inline-block;
		    border: 1px solid #ccc;
		    border-radius: 4px;
		    box-sizing: border-box;
		}

		input[type=submit] {
		    width: 70%;
		    background-color: #4CAF50;
		    color: white;
		    padding: 14px 20px;
		    margin: 8px 0;
		    border: none;
		    border-radius: 4px;
		    cursor: pointer;
		}

		input[type=submit]:hover {
		    background-color: #45a049;
		}

		div {
			text-align: center;
		    border-radius: 5px;
		    background-color: #f2f2f2;
		    padding: 20px;
		}
		</style>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <?php
          if(isset($_SESSION['username'])) {
              $user = $_SESSION["username"];
              $result = $mysqli->query("SELECT wallet from users where email='$user'");
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
          <li class='active'><a href="addmoney.php">Add VITCoins</a></li>
          <li><a href="orders.php">My Orders</a></li>
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
      <div class="small-12">
      	<div>
		  <form method="POST" action="addmoney-process.php">
		    <label style="text-align: left; margin:0 135px; font-weight: bolder;" for="fname">Enter password: </label>
		    <input type="password" id="fname" name="pwd" placeholder="Your password">

		    <label style="text-align: left; margin:0 135px; font-weight: bolder;" for="lname">Enter Amount to be added: </label>
		    <input type="number" id="lname" name="amount" placeholder="Amount">

		    <input type="submit" value="Add money">
		  </form>
		</div>
	</div>
</div>


        <div class="row" style="margin-top:10px;">
          <div class="small-12">
          <hr>




        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;clear:both;">&copy; VITCoins! All Rights Reserved.</p>
        </footer>

      </div>
    </div>