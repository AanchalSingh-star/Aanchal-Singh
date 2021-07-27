<?php
session_start();
?>

<?php
  require "adminstylesheet.php";
  require 'includes/dbh.inc.php';
?>


<style media="screen">
  .userSearchLinks a:link
  {
    color: blue;
    text-decoration: none;
    font-size: 1.5vw;
  }
  .userSearchLinks a:visited
  {
    color: purple;
    text-decoration: none;
    font-size: 1.5vw;
  }
  .userSearchLinks a:hover
  {
    text-decoration: underline;
    font-size: 1.5vw;
  }
  .userSearchLinks a:active
  {
    text-decoration: underline;
    font-size: 1.5vw;
  }

</style>

<style media="screen">
  .userSearchImages a:link
  {
    text-decoration: none;
  }
  .userSearchImages a:visited
  {
    text-decoration: none;
  }
  .userSearchImages a:hover
  {
    text-decoration: underline;
  }
  .userSearchImages a:active
  {
    text-decoration: underline;
  }

</style>

<body class="w3-black">
  <img src="icons/user icon.png" style="width:4%;margin-top:1%;margin-right:1%;" alt="admin icon" class="w3-display-topright w3-hide-small">

<?php
    if($_GET['userview']=="websites")
    {
?>
                <!-- Icon Bar (Sidebar - hidden on small screens) -->
                <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

                    <!-- Avatar logo in top left corner -->
                    <div class="w3-container" style="font-family: "Tangerine", serif;">
                        <p class="w3-xxlarge">TrekEra</p>
                    </div>

                    <a href="user.php?userview=websites" class="w3-bar-item w3-button w3-padding-large w3-black">
                        <i class="fa fa-home w3-xxlarge"></i>
                        <p>HOME</p>
                    </a>

                    <a href="user.php?userview=images" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
                        <i class="fa fa-eye w3-xxlarge"></i>
                        <p>IMAGES</p>
                    </a>

                    <a href="includes/logout.inc.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
                        <i class="fa fa-sign-out w3-xxlarge"></i>
                        <p>LOGOUT</p>
                    </a>
                </nav>

                <!-- Navbar on small screens (Hidden on medium and large screens) -->
                <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
                    <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
                        <a href="user.php?userview=websites" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
                        <a href="user.php?userview=images" class="w3-bar-item w3-button" style="width:25% !important">IMAGES</a>
                        <a href="includes/logout.inc.php" class="w3-bar-item w3-button" style="width:25% !important">LOGOUT</a>
                    </div>
                </div>


                <!--

                <div class="w3-top">
                <div class="w3-bar" style="background: #222;margin-left: 180px;margin-right: 180px;height: 60px">
                    <br><a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-black"></a>
                </div>
                </div>


                -->

                <!-- Page Content -->
                <div class="w3-padding-large" id="main">
                    <!-- Header/Home -->
                    <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
                        <h1 class="w3-jumbo"><span class="w3-hide-small">Welcome to </span>TrekEra</h1>
                        <p>A place to feed Curiosity.</p>
                        <!--<img src="img/admin space.jpg" alt="Admin Space" class="w3-image" width="992" height="1108">
                -->      </header>


                <!-- <div class="w3-top w3-responsive" style="margin-left: 5px;position: -webkit-sticky;position: sticky;top: 0;">
                  <div class="w3-bar" style="margin-top: 20px;background:black;">
                    <form class="w3-mobile w3-container" style="margin-left: 200px;margin-right: 271.5px;" action="user.php?userview=websites" method="post" target="_parent">
                         <p><input class="w3-input w3-padding-16 w3-border w3-responsive" type="text" placeholder="Search links by typing some web annotations..." required name="userSearch"  style="border-radius: 4px;width:788px;">
                         <button type="submit" name="search-site" class="w3-bar-item w3-button w3-ripple w3-padding-large w3-padding-16 w3-border w3-deep-purple w3-hover-grey"  style="border-radius: 4px;margin-left:724px;margin-top: -56.5px;"><i class="fa fa-search"></i></button></p>
                     </form>
                 </div>
                </div> -->

                <!-- large screen search bar -->
                  <div class="w3-top w3-responsive w3-hide-small" style="margin-left: 5px;position: -webkit-sticky;position: sticky;top: 0;">
                    <div class="w3-bar" style="margin-top: 20px;background:black;">
                      <form class="w3-mobile w3-container w3-padding" style="margin-left: 24%;margin-right: 20%;width:100%" action="user.php?userview=websites" method="post" target="_parent">
                        <div class="w3-center" style="">
                          <div class="w3-half">
                            <input class="w3-input w3-padding-16 w3-border w3-responsive" type="text" placeholder="Search links by typing some web annotations..." required name="userSearch"  style="border-radius: 4px;width:100%;font-size:100%;">

                          </div>
                          <div class="w3-half">
                            <button type="submit" name="search-site" class="w3-bar-item w3-button w3-ripple w3-padding-large w3-padding-16 w3-border w3-deep-purple w3-hover-grey w3-hide-small"  style="border-radius: 4px;width:10%;margin-left:-10%;font-size:100%;"><i class="fa fa-search"></i></button>
                          </div>
                          </div>
                           </form>
                   </div>
                 </div>

                 <!-- small screen search bar -->
                 <div class="w3-top w3-responsive w3-hide-medium w3-hide-large" style="margin-left: 5px;position: -webkit-sticky;position: sticky;top: 0;">
                   <div class="w3-bar" style="margin-top: 20px;background:black;">
                     <form class="w3-mobile w3-container w3-padding" style="margin-left: 13.5%;margin-right: 10%;width:100%" action="user.php?userview=websites" method="post" target="_parent">
                       <div class="w3-center" style="">
                         <div class="w3-half">

                           <input class="w3-input w3-padding w3-border w3-responsive w3-hide-medium w3-hide-large" type="text" placeholder="Search links by typing some web annotations..." required name="userSearch"  style="border-radius: 4px;width:70%;font-size:75%;">

                         </div>
                         <div class="w3-half">
                           <button type="submit" name="search-site" class="w3-bar-item w3-button w3-ripple w3-padding w3-border w3-deep-purple w3-hover-grey"  style="border-radius: 4px;width:10.8%;font-size:75%;margin-top:-34.5px;margin-left:250px;"><i class="fa fa-search"></i></button>
                         </div>
                         </div>
                          </form>
                  </div>
                </div>


<?php
              $i=0;
              $j=10000;
              if(isset($_POST['search-site']))
              {
                    $search = mysqli_real_escape_string($conn,$_POST['userSearch']);
                    $sql = "SELECT *FROM websites WHERE webAnnotation='$search';";
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0)    //if1
                    {
                                while ($row = mysqli_fetch_assoc($result))
                                {
                                            $s=(string)$i;
                                            $d=(string)$j;
?>


                                            <div class="w3-row-padding" style="margin:0 -10px">
                                                <div class="w3-half w3-margin-bottom">
                                                  <ul class="w3-ul w3-white w3-responsive">
                                                    <li class="w3-padding-16">
                                                      <p>
                                                        <a  style="text-decoration: none;" href= <?php echo $row['link'] ?> target="_blank">
                                                            <section>
                                                                <b><?php echo $row['link']?></b>
                                                                <br>
                                                                <b class="userSearchLinks">
                                                                  <a target="_blank" href= <?php echo $row['link'] ?>>
                                                                    <?php echo $row['title']?>
                                                                  </a>
                                                                </b>
                                                                <br>
                                                            </section>
                                                        </a>
                                                        <b style='color: grey'><?php echo $row['linkDesc']?></b>
                                                        <br>
                                                      </p>
                                                    </li>
                                                  </ul>
                                                </div>
                                              </div>

<?php
                                                $i++;
                                                $j++;

                                  }//
                      }
                      else
                      {
?>
                                  <b class="w3-center">No Results Found.</b>
<?php
                      }
          }

?>





                <!-- <br><br><br><br><br><br><br><br>
                <audio controls autoplay loop style="width:10%">
                  <source src="audio/welcome.mp3" type="audio/mpeg">
                </audio> -->






<?php
    }
    elseif ($_GET['userview']=="images")
    {
?>

              <!-- Icon Bar (Sidebar - hidden on small screens) -->
              <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

                  <!-- Avatar logo in top left corner -->
                  <div class="w3-container" style="font-family: "Tangerine", serif;">
                      <p class="w3-xxlarge">TrekEra</p>
                  </div>

                  <a href="user.php?userview=websites" class="w3-bar-item w3-button w3-padding-large w3-black">
                      <i class="fa fa-home w3-xxlarge"></i>
                      <p>HOME</p>
                  </a>

                  <a href="user.php?userview=websites" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
                      <i class="fa fa-eye w3-xxlarge"></i>
                      <p>WEBSITES</p>
                  </a>

                  <a href="includes/logout.inc.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
                      <i class="fa fa-sign-out w3-xxlarge"></i>
                      <p>LOGOUT</p>
                  </a>
              </nav>

              <!-- Navbar on small screens (Hidden on medium and large screens) -->
              <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
                  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
                      <a href="user.php?userview=websites" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
                      <a href="user.php?userview=websites" class="w3-bar-item w3-button" style="width:25% !important">WEBSITES</a>
                      <a href="#includes/logout.inc.php" class="w3-bar-item w3-button" style="width:25% !important">LOGOUT</a>
                  </div>
              </div>


              <!--

              <div class="w3-top">
              <div class="w3-bar" style="background: #222;margin-left: 180px;margin-right: 180px;height: 60px">
                  <br><a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-black"></a>
              </div>
              </div>


              -->

              <!-- Page Content -->
              <div class="w3-padding-large" id="main">
                  <!-- Header/Home -->
                  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
                      <h1 class="w3-jumbo"><span class="w3-hide-small">Welcome to </span>TrekEra</h1>
                      <p>A place to feed Curiosity.</p>
                      <!--<img src="img/admin space.jpg" alt="Admin Space" class="w3-image" width="992" height="1108">
              -->      </header>



<!--
              <div class="w3-top w3-responsive" style="margin-left: 5px;position: -webkit-sticky;position: sticky;top: 0;">
                <div class="w3-bar" style="margin-top: 20px;background:black;">
                  <form class="w3-mobile w3-container" style="margin-left: 200px;margin-right: 271.5px;" action="user.php?userview=images" method="post" target="_parent">
                       <p><input class="w3-input w3-padding-16 w3-border w3-responsive" type="text" placeholder="Search links by typing some web annotations..." required name="userSearch"  style="border-radius: 4px;width:788px;">
                       <button type="submit" name="search-image" class="w3-bar-item w3-button w3-ripple w3-padding-large w3-padding-16 w3-border w3-deep-purple w3-hover-grey"  style="border-radius: 4px;margin-left:724px;margin-top: -56.5px;"><i class="fa fa-search"></i></button></p>
                   </form>
               </div>
              </div> -->


              <!-- large screen search bar -->
                <div class="w3-top w3-responsive w3-hide-small" style="margin-left: 5px;position: -webkit-sticky;position: sticky;top: 0;">
                  <div class="w3-bar" style="margin-top: 20px;background:black;">
                    <form class="w3-mobile w3-container w3-padding" style="margin-left: 24%;margin-right: 20%;width:100%" action="user.php?userview=images" method="post" target="_parent">
                      <div class="w3-center" style="">
                        <div class="w3-half">
                          <input class="w3-input w3-padding-16 w3-border w3-responsive" type="text" placeholder="Search links by typing some web annotations..." required name="userSearch"  style="border-radius: 4px;width:100%;font-size:100%;">

                        </div>
                        <div class="w3-half">
                          <button type="submit" name="search-image" class="w3-bar-item w3-button w3-ripple w3-padding-large w3-padding-16 w3-border w3-deep-purple w3-hover-grey w3-hide-small"  style="border-radius: 4px;width:10%;margin-left:-10%;font-size:100%;"><i class="fa fa-search"></i></button>
                        </div>
                        </div>
                         </form>
                 </div>
               </div>

               <!-- small screen search bar -->
               <div class="w3-top w3-responsive w3-hide-medium w3-hide-large" style="margin-left: 5px;position: -webkit-sticky;position: sticky;top: 0;">
                 <div class="w3-bar" style="margin-top: 20px;background:black;">
                   <form class="w3-mobile w3-container w3-padding" style="margin-left: 13.5%;margin-right: 10%;width:100%" action="user.php?userview=images" method="post" target="_parent">
                     <div class="w3-center" style="">
                       <div class="w3-half">

                         <input class="w3-input w3-padding w3-border w3-responsive w3-hide-medium w3-hide-large" type="text" placeholder="Search links by typing some web annotations..." required name="userSearch"  style="border-radius: 4px;width:70%;font-size:75%;">

                       </div>
                       <div class="w3-half">
                         <button type="submit" name="search-image" class="w3-bar-item w3-button w3-ripple w3-padding w3-border w3-deep-purple w3-hover-grey"  style="border-radius: 4px;width:10.8%;font-size:75%;margin-top:-34.5px;margin-left:250px;"><i class="fa fa-search"></i></button>
                       </div>
                       </div>
                        </form>
                </div>
              </div>


<?php
              $i=0;
              $j=10000;
              if(isset($_POST['search-image']))
              {
                    $search = mysqli_real_escape_string($conn,$_POST['userSearch']);
                    $sql = "SELECT *FROM images WHERE webAnnotation='$search';";
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0)    //if1
                    {
                                while ($row = mysqli_fetch_assoc($result))
                                {
                                            $s=(string)$i;
                                            $d=(string)$j;
?>


                                                        <div class="w3-margin-top w3-row-padding">
                                                          <div class="w3-third" style="width:350px;">
                                                            <div class="w3-card-4 w3-white w3-responsive">
                                                              <img src="<?php echo $row['link']?>" alt="photo" class="w3-hover-opacity" style="border-radius: 4px;width:100%;height:350px;cursor:zoom-in;" onclick="document.getElementById('<?php echo $s ?>').style.display='block'">
                                                              <div id="<?php echo $s ?>" class="w3-modal" onclick="this.style.display='none'">
                                                                <span class="w3-button w3-black w3-hover-grey w3-xxlarge w3-display-topright" style="font-size: 60px;font-weight: bold;">&times;</span>
                                                                <div class="w3-modal-content w3-animate-zoom">
                                                                  <img src="<?php echo $row['link']?>" style="width:100%">
                                                                </div>
                                                              </div>
                                                              <div class="w3-container">
                                                                <p>
                                                                  <a style="text-decoration: none;" href= <?php echo $row['link'] ?>>
                                                                      <section>
                                                                          <b class="userSearchImages">
                                                                            <a href= <?php echo $row['link'] ?>>
                                                                              <?php echo $row['title']?>
                                                                            </a>
                                                                          </b>
                                                                      </section>
                                                                  </a>
                                                                </p>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>






<?php
                                                $i++;
                                                $j++;


                                  }//end of while

?>

<?php
                      }// end of if1
                      else
                      {
?>
                                  <b class="w3-center">No Results Found.</b>
<?php
                      }
            }

    }
    else
    {
?>






<?php
    }

?>
<section>
  <br><br><br><br><br>
</section>

</body>
