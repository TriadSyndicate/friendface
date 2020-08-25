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
          <h1>Welcome <?php session_start(); echo $_SESSION['Username']; ?>, Finish Setting up Your Account</h1>
        </div>
      </div>

      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <div class="callout">
            <h3>Fill in the Details of Registration</h3>
            <form action="process.php" method="post" enctype="multipart/form-data">
              <div class="grid-x grid-padding-x">
                <div class="large-4 cell">
                  <label>Image Upload</label>
                  <input required type="file" name="uploadx">
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
                      <input required type="text" name="lname" id="lname" placeholder="Last Name"/>
                    </div>
                  </div>
                </div>
              </div>
              <input type="submit" class="success button" name="complete" id="complete" value="Complete Profile">
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
