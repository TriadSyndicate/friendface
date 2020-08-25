<?php
session_start();
require 'conn.php';
$cx = $conn;
if ($_SESSION['Complete'] != "FALSE") {
  header("Location: login.php");
}
print_r($_SESSION);
if(isset($_POST['complete']))
{
  print_r($_POST);
  print_r($_FILES);
   $profileImageName = time() . '-' . $_FILES["uploadx"]["name"];
   $target_dir = "upload/";
   $target_file = $target_dir . basename($profileImageName);
   $FirstName = $_POST['fname'];
   $LastName = $_POST['lname'];
   $Bio = $_POST['bio'];
   $DoB = $_POST['dob'];
   $LoggedID = $_SESSION['Logged_ID'];
   if(move_uploaded_file($_FILES["uploadx"]["tmp_name"], $target_file)) {
  $sql = "INSERT INTO user_data(user_id,dob,bio,image,first_name,last_name) VALUES('$LoggedID','$DoB','$Bio','$target_file','$FirstName','$LastName')";
  if ($cx->query($sql) === TRUE) {
    header("Location: dashboard.php");
  }
}
}
 ?>
