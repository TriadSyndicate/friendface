<?php
session_start();
if (empty($_GET['id'])) {
  header("Location: dashboard.php");
}
require 'conn.php';
$co = $conn;
$sq = "SELECT * FROM user_data WHERE user_id='$_GET[id]'";
$sq1 = "SELECT * FROM users WHERE user_id='$_GET[id]'";
$res = $co->query($sq);
$UserName = $Email = $Fname = $Lname = $Image = $DoB = $Bio = $UserID = $createdAt = "";
while($row = $res->fetch_assoc()) {
  $UserID = $row['user_id'];
  $Image = $row['image'];
  $Fname = $row['first_name'];
  $Lname = $row['last_name'];
  $Bio = $row['bio'];
  $DoB = $row['dob'];
}
$res1 = $co->query($sq1);
while($row2 = $res1->fetch_assoc()) {
  $Email = $row2['email'];
  $createdAt = $row2['created_At'];
  $UserName = $row2['username'];
}
 ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $UserName; ?>'s Profile | Friend Face</title>
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
            <h3></h3>
                <div class="card" style="width: 300px;">
                  <div class="card-divider">
                    This is <?php echo $UserName ?>'s Profile
                  </div>
                  <img src="<?php echo $Image; ?>">
                  <div class="card-section">
                    <h4><?php echo $Fname; ?> <?php echo $Lname; ?></h4>
                    <p>Bio: <?php echo $Bio; ?></p>
                    <p>Date Of Birth: <?php echo $DoB; ?></p>
                    <p>Email: <?php echo $Email; ?></p>
                    <p>UserName: <?php echo $UserName; ?></p>
                    <p>Account Creation: <?php echo $createdAt; ?></p>
                  </div>
                </div>
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
