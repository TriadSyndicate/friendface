<?php
require 'conn.php';
$c = $conn;

if ($c->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$hashPass = password_hash($password,PASSWORD_DEFAULT);
$sql = "INSERT INTO users (username,email,password) VALUES('$username','$email','$hashPass')";
if ($c->query($sql) === TRUE) {
  $_SESSION['Logged_ID'] = $c->insert_id;
  $_SESSION['Username'] = $username;
  $_SESSION['Complete'] = "FALSE";
  $_SESSION['Logged_Email'] = $email;
  echo "ok";
}
 ?>
