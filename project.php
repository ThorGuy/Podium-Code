<?php
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbName = "projectdb";

  $conn = new mysqli($servername, $username, $password, $dbName);


  $request = "select * from `projects` where `id` = ".$_GET['project'];

  $project = $conn->query($request)->fetch_assoc();

  require("logout.html");

  echo "<h1>".$project['name']."</h1>";
  echo "<p>".$project['description']."</p>";
  #echo $project['filename'];
  echo '<embed src="'.$project['filename'].'" width="100%" height="80%" />';

  require("reviews.php");
  $conn->close();
?>
