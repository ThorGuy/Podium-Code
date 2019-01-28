<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "projectdb";

$conn = new mysqli($servername, $username, $password, $dbName);

$request = "insert INTO `reviews` (`id`, `project`, `user`, `rating`, `reason`) VALUES (NULL, '".$_POST['project']."', '".$_SESSION['user']."', '".$_POST['rating']."', '".$_POST['reason']."');";
$result = $conn->query($request);

header("Location: project.php?project=".$_POST['project']);

?>
