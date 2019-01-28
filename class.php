<?php
  session_start();
  require("logout.html");

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbName = "projectdb";
  $class = $_GET['class'];

  $conn = new mysqli($servername, $username, $password, $dbName);


  $request = "select `name` from `classes` where `id` = ".$class;
  #echo $request;
  #echo $_SESSION['user'];
  $className = $conn->query($request)->fetch_assoc()['name'];

  $request = "select `projects` from `classes` where `id` = ".$class;
  $projects = json_decode($conn->query($request)->fetch_assoc()['projects']);

  $userType = $conn->query("select type from users where id = ".$_SESSION['user'])->fetch_assoc()['type'];



  $by = "";

  echo '<h1>'.$className.'</h1><br>';

  echo '<br>Projects:<br><br><form action = "project.php" method="get">';

  foreach($projects as $projectID){
    $project = $conn->query("select `name`,`id` from `projects` where `id` = ".$projectID);
    if($project->num_rows > 0){
      $project = $project->fetch_assoc();
      echo '<button type="submit" name="project" value ="'.$project['id'].'">'.$project['name'].'</button><br>';
    }
  }
  echo "</form>";

  require("submitproject.html");

  $conn->close();
 ?>
