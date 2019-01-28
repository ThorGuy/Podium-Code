<?php

echo "<h1>Reviews:</h1>";

$request = "select * from `reviews` where `project` = ".$_GET['project'];
$reviews = $conn->query($request);

if($reviews->num_rows > 0 ){
  while($row = $reviews->fetch_assoc()){
    $user = $conn->query("select `name` from `users` where `id` = ".$row['user'])->fetch_assoc()['name'];
    echo "<b>".$user."</b> - <u>".$row['rating']."</u> out of <u>10</u><br>".$row['reason']."<br><br>";
  }
}else{
  echo "This project has no reviews.";
}
require("submitreview.html");
echo '<input type="hidden" name="project" value="'.$_GET['project'].'"></form>';
?>
