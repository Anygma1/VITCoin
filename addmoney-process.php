<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$amount = $_POST["amount"];
$password = $_POST["pwd"];

$username = $_SESSION["username"];
$users = $mysqli->query("SELECT password,wallet FROM users WHERE email = '".$username."'");

if($users === FALSE){
  die(mysql_error());
}

if($users){
	$obj1 = $users->fetch_object();
	if($obj1->password == $password){
		$balance = $obj1->wallet + $amount;
		$mysqli->query("UPDATE users SET wallet = '".$balance."' WHERE email ='".$username."'");
		header("location:addsuccess.php");
	}
	else
		redirect();
}

function redirect() {
  echo '<center><h1>Invalid password! Redirecting...</h1></center>';
  header("Refresh: 4; url=addmoney.php");
}