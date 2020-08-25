<?php
session_start();
require 'conn.php';
$cx = $conn;
$err = "";
$sqlx = "SELECT * FROM users";
$res = $cx->query($sqlx);
if(isset($_POST['login'])) {
  $logCred = $_POST['credentials'];
  $logPass = $_POST['pass'];
  while($row = $res->fetch_assoc()) {
    if ($logCred==$row['email'] || $logCred == $row['username']) {
      if (password_verify($logPass, $row['password'])) {
        $_SESSION['Logged_ID'] = $row['user_id'];
        $_SESSION['Username'] = $row['username'];
        $_SESSION['Complete'] = "TRUE";
        $_SESSION['Logged_Email'] = $row['email'];
        header('Location: dashboard.php');
      }else {
        $err = "Invalid Credentials Try Again!";
      }
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
    <title>Dashboard | Friend Face</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
    <ul class="menu">
  <li class="menu-text">Friend Face</li>
  <li><a href="registration.html">Registration</a></li>
</ul>
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
        </div>
      </div>

      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <div class="callout">
            <h3>Login Page</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="grid-x grid-padding-x">
                <div class="large-4 cell">
                  <label>Email / Username</label>
                  <input required type="text" name="credentials">
                </div>
              </div>
              <div class="grid-x grid-padding-x">
                <div class="large-4 cell">
                  <label>Password</label>
                  <input required type="password" name="pass">
                </div>
              </div>
              <p style="color:red;"><?php echo $err; ?></p>
              <input type="submit" class="success button" name="login" id="login" value="Login">
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
