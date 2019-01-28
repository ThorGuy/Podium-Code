
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "projectdb";

$conn = new mysqli($servername, $username, $password, $dbName);

$target_dir = "projects/";
$target_file = $target_dir . basename($_FILES["project"]["name"]);

echo $target_file;

if (move_uploaded_file($_FILES["project"]["tmp_name"], $target_file)) {

  $request = "insert INTO `projects` (`id`, `name`, `description`, `submittee`, `filename`) VALUES (NULL, '".$_POST['name']."', '".$_POST['description']."', '".$_SESSION['user']."', '".$target_file."');";
  $result = $conn->query($request);

  echo "The file ". basename( $_FILES["project"]["name"]). " has been uploaded.";
  echo $result;

  header("Location: project.php?project=".$conn->insert_id);
  $conn->close();
  exit();

} else {
  echo "Sorry, there was an error uploading your file.";
}
?>
