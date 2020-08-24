<?php
session_start();
require 'conn.php';
$cx = $conn;
if ($_SESSION['Complete'] != "FALSE") {
  header("Location: login.php");
}
if(isset($_POST['complete']))
{
   $profileImageName = time() . '-' . $_FILES["upload"]["name"];
   $target_dir = "upload/";
   $target_file = $target_dir . basename($profileImageName);
   $FirstName = $_POST['fname'];
   $LastName = $_POST['lname'];
   $Bio = $_POST['bio'];
   $DoB = $_POST['dob'];
   $LoggedID = $_SESSION['Logged_ID'];
   if(move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
  $sql = "INSERT INTO user_data (user_id,dob,bio,image,first_name,last_name) VALUES('$LoggedID','$DoB','$Bio','$target_file','$FirstName','$LastName')";
  if ($cx->query($sql) === TRUE) {
    header("Location:dashboard.php");
  }
}
}
 ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Setup | Friend Face</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h1>Welcome <?php echo $_SESSION['Username']; ?>, Finish Setting up Your Account</h1>
        </div>
      </div>

      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <div class="callout">
            <h3>Fill in the Details of Registration</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="grid-x grid-padding-x">
                <div class="large-4 cell">
                  <label>Image Upload</label>
                  <input required type="file" id="upload" name="upload">
                </div>
                <div class="large-4 cell">
                  <label>Date Of Birth</label>
                  <input required type="date" name="dob" id="dob"/>
                </div>
              </div>
              <div class="grid-x grid-padding-x">
                <div class="large-12">
                  <label>Bio</label>
                  <input required type="textarea" name="bio" id="bio" placeholder="Short Bio About Yourself" />
                </div>
              </div>
              <div class="grid-x grid-padding-x">
                <div class="large-4 medium-4 cell">
                  <label>First Name</label>
                  <input required type="text" name="fname" id="fname" placeholder="First Name" />
                </div>
                <div class="large-4 medium-4 cell">
                  <div class="grid-x">
                    <label>Last Name</label>
                    <div class="input-group">
                      <input required type="password" name="lname" id="lname" placeholder="Last Name"/>
                    </div>
                  </div>
                </div>
              </div>
              <input type="button" class="success button" name="complete" id="complete" value="Complete Profile">
            </form>
          </div>
        </div>
      </div>

    </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
