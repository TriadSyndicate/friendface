<?php
session_start();
require 'conn.php';
$cx = $conn;
$sqlx = "SELECT * FROM user_data";
$res = $cx->query($sqlx);
if ($_SESSION['Complete'] == "FALSE") {
  header("Location: index.php");
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
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="profile.php?id=<?php echo $_SESSION['Logged_ID']; ?>">My Profile</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
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
                <?php $count=0; while($row = $res->fetch_assoc()) { $count = $count + 1;?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td> <img src="<?php echo $row['image']; ?>" style="width:20%;"> </td>
                  <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                  <td><a class="button primary" href="profile.php?id=<?php echo $row['user_id']; ?>"><?php echo $row['first_name']."'s' Profile"; ?></a></td>
                </tr>
              <?php } ?>
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
