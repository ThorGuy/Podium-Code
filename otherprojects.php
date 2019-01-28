<?php
  session_start();
  require("logout.html");

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbName = "projectdb";
  $class = 0;

  $conn = new mysqli($servername, $username, $password, $dbName);



  $request = "select * from `projects` where `submittee` != ".$_SESSION['user'];

  $projects = $conn->query($request);
  if($projects->num_rows > 0){
    echo '<br>Projects:<br><br><form action = "project.php" method="get">';

    while($row = $projects->fetch_assoc()){
      echo '<button type="submit" name="project" value ="'.$row['id'].'">'.$row['name'].'</button><br>';
    }

    echo "</form>";
  }else{
    echo "<br>Nobody else has submitted any projects.<br>";
  }

?>
