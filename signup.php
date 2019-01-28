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

$request = "insert into `users` (`id`, `name`, `password`, `classes`, `type`) VALUES (NULL, '". $_POST['username'] ."', '". $_POST['password'] ."', '[]', '". $_POST['type'] ."');";
echo $request;
$result = $conn->query($request);


$conn->close();
header("Location: classes.php");
exit();
?>

</body>
</html>
