<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$password = $_POST["pass"];
$flag = 'true';
//$query = $mysqli->query("SELECT email, password from users");

$result = $mysqli->query('SELECT password from users');

if($result === FALSE){
  die(mysql_error());
}

if($result){
  while($obj = $result->fetch_object()){
    if(isset($_SESSION['username']) && $obj->password === $password) {
      header("location: success.php");
    } else {

        if($flag === 'true'){
          redirect();
          $flag = 'false';
        }
    }
  }
}

function redirect() {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}


?>
