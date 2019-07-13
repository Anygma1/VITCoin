<?php
	
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$amount = $_POST["amount"];
$shop = $_POST["shop"];
$password = $_POST["pwd"];

$username = $_SESSION["username"];
$users = $mysqli->query("SELECT password,wallet,total_paid FROM users WHERE email = '".$username."'");

if($users === FALSE){
  die(mysql_error());
}

$orders = $mysqli->query("SELECT total,payment_to FROM orders WHERE payment_to = '".$shop."'");

if($orders === FALSE){
  die(mysql_error());
}



if($users){
	$obj1 = $users->fetch_object();
	$obj2 = $orders->fetch_object();
	if($obj1->password == $password && $obj2->payment_to == $shop){
		if($amount == 0){
			header("Location: http://localhost/gduniya/products-unsuccess2.php?fail=1");
		}
		else if($obj1->wallet >= $amount){
			$balance = $obj1->wallet - $amount;
			$total_paid = $obj1->total_paid + $amount;
			$total = $obj2->total + $amount;	
			$mysqli->query("UPDATE users SET wallet = '".$balance."' WHERE email ='".$username."'");
			$mysqli->query("UPDATE users SET total_paid = '".$total_paid."' WHERE email ='".$username."'");
			$mysqli->query("UPDATE orders SET total = '".$total."' WHERE payment_to ='".$shop."'");
			$mysqli->query("INSERT INTO user_log (payment_to, current_total, email) VALUES('$shop', '$amount', '$username')");
			header("location:success.php");
		}
		else{
			header("Location: http://localhost/gduniya/products-unsuccess.php?fail=1");
		}
	}
	else
		redirect();
}

function redirect() {
  echo '<center><h1>Invalid password! Redirecting...</h1></center>';
  header("Refresh: 4; url=products.php");
}