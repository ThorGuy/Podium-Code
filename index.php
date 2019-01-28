<?php

session_start(); //start the PHP_session function
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "projectdb";

$conn = new mysqli($servername, $username, $password, $dbName);


if(isset($_SESSION['user'])){

  $userType = $conn->query("select type from users where id = ".$_SESSION['user'])->fetch_assoc()['type'];

  if($userType=="teacher"){
    header("Location: home.php");
  }else{
    header("Location: classes.php");
  }
  exit();

}else{
  require("login.html");
  #require("signup.html");
}

function logout(){
  setcookie('user','',-1);
}

?>
