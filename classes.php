<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbName = "projectdb";

  $conn = new mysqli($servername, $username, $password, $dbName);
  #echo $_SESSION['user']."<br>";
  require("logout.html");

  $request = "select classes from users where id = ".$_SESSION['user'];
  $result = $conn->query($request);

  if($result->num_rows > 0){

    echo 'Classes:<form action="class.php" method="get">';

    $classes = json_decode($result->fetch_assoc()['classes']);

    foreach ($classes as $class){
      $data = $conn->query("select name from classes where id = ".$class)->fetch_assoc();

      echo '<button type="submit" name="class" value ="'.$class.'">'.$data['name'].'</button><br>';
    }



    echo '</form>';
  }else{
    echo "you are not enrolled in any classes!";
  }
  $conn->close();
 ?>
