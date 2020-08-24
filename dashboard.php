<?php
session_start();
require 'conn.php';
$cx = $conn;
if ($_SESSION['Complete'] == "FALSE") {
  header("Location: login.php");
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
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h1>Welcome <?php echo $_SESSION['Username']; ?></h1>
        </div>
      </div>

      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <div class="callout">
            <h3>Profiles</h3>
            <table>
              <thead>
                <th>#</th>
                <th>Image</th>
                <th>Names</th>
                <th>Link</th>
              </thead>
              <tbody>
                <?php  ?>
                <tr>

                </tr>
              </tbody>
            </table>
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
