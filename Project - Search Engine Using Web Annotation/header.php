<?php
session_start();
?>


<?php
  require "adminstylesheet.php";
?>

<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  /* background-image: url("https://images.unsplash.com/photo-1475274047050-1d0c0975c63e?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHw%3D&w=1000&q=80"); */
  background-image: url("https://wallpaperaccess.com/full/1397755.jpg");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>


<?php
if (isset($_SESSION['userId']))
{
  $userview=$_GET['userview'];
}
else
{
  $userview="websites";
}
?>


<body class="w3-black ">

    <div class="bg">

      <center>
          <header class="w3-container w3-padding-32 w3-centerw3-responsive" id="home">

            <img src="icons/admin icon.png" style="width:20%;height: 500px;margin-left:0px;margin-top:0px;" alt="admin icon" class="">
            <!--<h1 class="w3-jumbo"><span class="w3-hide-small">Welcome to </span>TrekEra</h1>-->
            <img src="img/logo.png" style="width:47%; margin-left:0px;margin-top: -200px;" alt="website logo" class=""></h1>

            <img src="icons/user icon.png" style="width:20%;height: 500px; margin-left:0%;margin-top: 0px;" alt="user icon" class="">
            <p style="margin-top: -190px;margin-left:60px;">A place to feed Curiosity.</p>


          </header>
          <!-- <div class="w3-responsive">
          <img src="icons/admin icon.png" style="width:13%; margin-left:0px;margin-top: 50px;" alt="admin icon" class="">
          <img src="icons/user icon.png" style="width:13%; margin-left:20%;margin-top: 50px;" alt="user icon" class="">
          </div> -->

          <button type="button"  name="adminbutton" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-ripple w3-padding-large w3-padding-16 w3-border w3-deep-purple w3-hover-grey" style="border-radius: 4px; width: 25%; margin-top: 150px;margin-left: 0px"><h4><b>Admin</b></h4></button>
          <!--Modal of website link-->
          <div id="id01" class="w3-modal">
              <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:30%; background: #222; border-radius: 4px;">

                  <div class="w3-center"><br>
                      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-hover-red w3-xxlarge w3-display-topright w3-text-white" style="border-radius: 4px;" title="Close Modal">&times;</span>
                      <!--  <img src="img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">-->
                      <img src="icons/admin icon.png" style="width:10%;" alt="admin icon" class="w3-margin-top">
                      <center><h1>Welcome Back Admin</h1><span class="w3-hide-small">Please fill in your login credentials</span></center>
                      <br>

                  </div>

<?php
                  if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'emptyfields') {
                      echo '<p class="w3-text-red">Fill in all fields!</p>';

                    }
                    else if ($_GET['error'] == 'sqlerror') {
                      echo '<p class="w3-text-red">Sql Query Error!</p>';

                    }
                    else if ($_GET['error'] == 'wrongpwd') {
                      echo '<p class="w3-text-red">Wrong password!</p>';

                    }
                    else if ($_GET['error'] == 'nouser') {
                      echo '<p class="w3-text-red">User not found!</p>';

                    }
                    else if ($_GET['login'] == 'success') {
                      echo '<p class="w3-text-red">login successful!</p>';
                    }
                  }

                if (isset($_SESSION['adminId'])) {
                  header("Location: admin.php");
                  exit();
                  //echo '<!--<form action="includes/logout.inc.php" method="post">
                    //    <button class="btn btn-primary" type="submit" name="logout-submit">Logout</button>
                      //  </form>-->';
                }
                else
                {
?>

                <!--Website add link form-->
                <form action="includes/adminlogin.inc.php?userview=<?php echo $userview; ?>" method="post" class="w3-container w3-text-white w3-center needs-validation" novalidate>
                    <div class="w3-section">

                      <table class="w3-table" style="">
                          <tr>
                              <td class="w3-right-align"><label>EMAIL: </label></td>
                              <td><input class=" w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter your Username/Email..." name="username" required><td>
                          </tr>

                          <tr>
                              <td class="w3-right-align"><label>PASSWORD: </label></td>
                              <td><input class="w3-border w3-margin-bottom" style="border-radius: 4px;" type="password" placeholder="Enter your Password..." name="pwd" required></td>
                          </tr>

                      </table>

                      <div class="w3-padding-24">
                        <button class="w3-button w3-padding w3-hover-grey w3-deep-purple" style="border-radius: 4px;width: 65%;" type="submit" name="login-submit">Login</button>
                      </div>

                    </div>
                </form>
<?php
                }
?>

            </div>
          </div>


          <button type="button"  name="userbutton" onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-ripple w3-padding-large w3-padding-16 w3-border w3-deep-purple w3-hover-grey" style="border-radius: 4px; width: 25%; margin-top: 150px;margin-left: 40%"><h4><b>User</b></h4></button>
          <!--Modal of website link-->
          <div id="id02" class="w3-modal">
              <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:30%; background: #222; border-radius: 4px;">

                  <div class="w3-center"><br>
                      <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-hover-red w3-xxlarge w3-display-topright w3-text-white" style="border-radius: 4px;" title="Close Modal">&times;</span>
                      <!--  <img src="img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">-->
                      <img src="icons/user icon.png" style="width:10%;" alt="user icon" class="w3-margin-top">
                      <center><h1>Welcome Back</h1><span class="w3-hide-small">Please fill in your login credentials</span></center>
                      <br>

                  </div>

          <?php
                  if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'emptyfields') {
                      echo '<p class="w3-text-red">Fill in all fields!</p>';

                    }
                    else if ($_GET['error'] == 'sqlerror') {
                      echo '<p class="w3-text-red">Sql Query Error!</p>';

                    }
                    else if ($_GET['error'] == 'wrongpwd') {
                      echo '<p class="w3-text-red">Wrong password!</p>';

                    }
                    else if ($_GET['error'] == 'nouser') {
                      echo '<p class="w3-text-red">User not found!</p>';

                    }
                    else if ($_GET['login'] == 'success') {
                      echo '<p class="w3-text-red">login successful!</p>';
                    }
                  }

                if (isset($_SESSION['userId'])) {
                  header("Location: user.php?userview=".$userview);
                  exit();
                  //echo '<!--<form action="includes/logout.inc.php" method="post">
                    //    <button class="btn btn-primary" type="submit" name="logout-submit">Logout</button>
                      //  </form>-->';
                }
                else
                {
          ?>

                        <!--Website add link form-->
                        <form action="includes/login.inc.php?userview=<?php echo $userview; ?>" method="post" class="w3-container w3-text-white w3-center needs-validation" novalidate>
                            <div class="w3-section">

                              <table class="w3-table" style="">
                                  <tr>
                                      <td class="w3-right-align"><label>EMAIL: </label></td>
                                      <td><input class=" w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter your Username/Email..." name="username" required><td>
                                  </tr>

                                  <tr>
                                      <td class="w3-right-align"><label>PASSWORD: </label></td>
                                      <td><input class="w3-border w3-margin-bottom" style="border-radius: 4px;" type="password" placeholder="Enter your Password..." name="pwd" required></td>
                                  </tr>

                              </table>

                              <div class="w3-padding-24">
                                <button class="w3-button w3-padding w3-hover-grey w3-deep-purple" style="border-radius: 4px;width: 65%;" type="submit" name="login-submit">Login</button>
                              </div>
                              <hr>

                              <button type="button"  name="usersignupbutton" onclick="document.getElementById('id03').style.display='block'" class="w3-button w3-padding w3-deep-purple w3-hover-grey" style="border-radius: 4px; width: 65%;"><h4><b>Create a new account</b></h4></button>
                        </form>
<?php
                }
?>                  <!--Modal of website link-->
                      <div id="id03" class="w3-modal">
                          <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:30%; background: #222; border-radius: 4px;">

                              <div class="w3-center"><br>
                                  <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-hover-red w3-xxlarge w3-display-topright w3-text-white" style="border-radius: 4px;" title="Close Modal">&times;</span>
                                  <!--  <img src="img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">-->
                                  <img src="icons/user plus icon.png" style="width:10%;" alt="user icon" class="w3-margin-top">
                                  <center><h1>Signup Form</h1><span class="w3-hide-small"></span></center>
                                  <br>

                              </div>

                      <?php
                              if (isset($_GET['error'])) {
                                if ($_GET['error'] == 'emptyfields') {
                                  echo '<p class="w3-text-red">Fill in all fields!</p>';

                                }
                                else if ($_GET['error'] == 'invalidemail&uid') {
                                  echo '<p class="w3-text-red">Invalid username and email!</p>';

                                }
                                else if ($_GET['error'] == 'invaliduid') {
                                  echo '<p class="w3-text-red">Invalid username!</p>';

                                }
                                else if ($_GET['error'] == 'invalidemail') {
                                  echo '<p class="w3-text-red">Invalid email!</p>';

                                }
                                else if ($_GET['error'] == 'passwordcheck') {
                                  echo '<p class="w3-text-red">Your password do not match!</p>';

                                }
                                else if ($_GET['error'] == 'usertaken') {
                                  echo '<p class="w3-text-red">Username is already taken!</p>';

                                }
                                else if ($_GET['login'] == 'success') {
                                  echo '<p class="w3-text-red">Signup successful!</p>';
                                }
                              }

                      ?>

                            <!--Website add link form-->
                            <form action="includes/signup.inc.php?userview=<?php echo $userview; ?>" method="post" class="w3-container w3-text-white w3-center needs-validation" novalidate>
                                <div class="w3-section">

                                  <table class="w3-table" style="">
                                      <tr>
                                          <td class="w3-right-align"><label>USERNAME: </label></td>
                                          <td><input class=" w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter your Username..." name="uid" required><td>
                                      </tr>

                                      <tr>
                                          <td class="w3-right-align"><label>EMAIL: </label></td>
                                          <td><input class=" w3-border w3-margin-bottom" style="border-radius: 4px;" type="email" placeholder="Enter your Email..." name="username" required><td>
                                      </tr>

                                      <tr>
                                          <td class="w3-right-align"><label>PASSWORD: </label></td>
                                          <td><input class="w3-border w3-margin-bottom" style="border-radius: 4px;" type="password" placeholder="Enter your Password..." name="pwd" required></td>
                                      </tr>

                                      <tr>
                                          <td class="w3-right-align"><label>REPEAT PASSWORD: </label></td>
                                          <td><input class="w3-border w3-margin-bottom" style="border-radius: 4px;" type="password" placeholder="Repeat Password..." name="pwd-repeat" required></td>
                                      </tr>

                                  </table>

                                  <div class="w3-padding-24">
                                    <button class="w3-button w3-padding w3-hover-grey w3-deep-purple" style="border-radius: 4px;width: 65%;" type="submit" name="signup-submit">Signup</button>
                                  </div>
                    </div>
                </form>

            </div>
          </div>




    </center>


</div>
  </body>
