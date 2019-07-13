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
    <title>Contact</title>
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
          <li><a href="about.php">About</a></li>
          <?php
              if(isset($_SESSION['username'])){
                echo '<li><a href="products.php">Pay</a></li>';
                echo '<li><a href="addmoney.php">Add VITCoins</a></li>';
                echo '<li><a href="orders.php">My Orders</a></li>';
              }
          ?>
          <li class="active"><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          /*
   $m = new MongoClient();
   echo "Connection to database successfull";
   $db = $m->bolt;
   echo "Database bolt selected";
   $collection = $db->mycol;
   echo "Collection selected succsessfully";
  
   $document = array( 
      "Name" => "Anirban", 
      "Address" => "VIT Vellore", 
      "email" => "anirban791mkj@gmail.com",
   );
  
   $collection->insert($document);
   echo "Document inserted successfully";

   $cursor = $collection->find();
   foreach ($cursor as $document) {
      echo $document["name"] . "\n";
      echo $document["address"] . "\n";
      echo $document["email"] . "\n";
      echo "You can reach me if you have any doubts" "\n";
      echo "Just mail me at the given address!"

   }
?>

   */
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:30px;">
      <div class="small-12">

        <p><center>Having any query and wanna get in touch? Our team is always available at your service! <br>
        Just e-mail us at: <br><a href="mailto:anirban.mukherjee2016@vitstudent.ac.in">anirban.mukherjee2016@vitstudent.ac.in</a><br>
        <a href="mailto:sarthak.shubham2016@vitstudent.ac.in">sarthak.shubham2016@vitstudent.ac.in</a><br>
        <a href="mailto:aditya.samota2016@vitstudent.ac.in">aditya.samota2016@vitstudent.ac.in"</a><br></center></p>
        <center><h6><p>We would get in touch right away!</p></h6></center><hr></a></p>
        

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
