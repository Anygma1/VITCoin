<?php

include 'config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$answer = $_POST["answer"];

if($mysqli->query("INSERT INTO users (fname, lname, address, city, pin, email, password,answer) VALUES('$fname', '$lname', '$address', '$city', $pin, '$email', '$pwd', '$answer')")){
	echo 'Data inserted';
	echo '<br/>';
}

header ("location:login.php");

?>
