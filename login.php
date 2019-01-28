<html>
<body>
<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "projectdb";

$conn = new mysqli($servername, $username, $password, $dbName);

if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}

$request = "select id from `users`".
" where `name` = '". $_POST['username'] .
"' and `password` = '". $_POST['password'] ."'";
echo $request;
$result = $conn->query($request);

if($result->num_rows == 1){
    while($row = $result->fetch_assoc()) {
      $_SESSION['user'] = $row['id'];
      $conn->close();
      header("Location: index.php");
      exit();
    }
}else{
  require("login.html");
  echo "<p style = 'color:#ff0000'>invalid login</p>";
}

$conn->close();
?>

</body>
</html>
