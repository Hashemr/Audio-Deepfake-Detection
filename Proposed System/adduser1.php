<?php

$conn = mysqli_connect('localhost:3306','root','', 'graduation');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  // Redirect to the home page
  header("Location: index.php");
  // Ensure that script execution stops after redirect
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];

$sql = "INSERT INTO user(firstName, lastName, email, mobile, password) 
VALUES ('$firstName', '$lastName', '$email', '$mobile', '$password')";

mysqli_query($conn, $sql);

?>
