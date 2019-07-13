<?php
	
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$answer = $_POST["answer"];
$password = $_POST["pwd"];
$username = $_POST["username"];

$users = $mysqli->query("SELECT answer FROM users WHERE email = '".$username."'");

if($users === FALSE){
  die(mysql_error());
}

if($users){
	$obj1 = $users->fetch_object();
	if($obj1->answer == $answer){
		$mysqli->query("UPDATE users SET password = '".$password."' WHERE email ='".$username."'");
		header("location:resetpassword-success.php");
		}
	else{
		header("Location: http://localhost/gduniya/resetpassword-unsuccess.php?fail=1");
	}
}
