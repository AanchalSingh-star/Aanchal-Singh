

 <?php
 session_start();
 ?>

 <?php
   require "adminstylesheet.php";
 ?>

 <?php
   require 'includes/dbh.inc.php';
 ?>
 <body class="w3-black">

<img src="icons/admin icon.png" style="width:4%;margin-top:1%;margin-right:1%;" alt="admin icon" class="w3-display-topright">


<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

    <!-- Avatar logo in top left corner -->
    <div class="w3-container" style="font-family: "Tangerine", serif;">
        <p class="w3-xxlarge">TrekEra</p>
    </div>

    <a href="admin.php?#main" class="w3-bar-item w3-button w3-padding-large w3-black">
        <i class="fa fa-home w3-xxlarge"></i>
        <p>HOME</p>
    </a>

    <a href="admin.php?#add" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
        <i class="fa fa-plus w3-xxlarge"></i>
        <p>ADD LINKS</p>
    </a>
    <a href="admin.php?#view" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
        <i class="fa fa-eye w3-xxlarge"></i>
        <p>VIEW LINKS</p>
    </a>
    <a href="usertable.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
        <i class="fa fa-address-book w3-xxlarge"></i>
        <p>VIEW USERS</p>
    </a>
    <a href="optimizelink.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
        <i class="fa fa-asl-interpreting w3-xxlarge"></i>
        <p>LINK OPTIMIZATION</p>
    </a>
    <a href="includes/logout.inc.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
        <i class="fa fa-sign-out w3-xxlarge"></i>
        <p>LOGOUT</p>
    </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
    <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
        <a href="admin.php?#main" class="w3-bar-item w3-button" style="width:15% !important">HOME</a>
        <a href="admin.php?#add" class="w3-bar-item w3-button" style="width:15% !important">ADD LINKS</a>
        <a href="admin.php?#view" class="w3-bar-item w3-button" style="width:15% !important">VIEW LINKS</a>
        <a href="usertable.php" class="w3-bar-item w3-button" style="width:15% !important">VIEW USERS</a>
        <a href="optimizelink.php" class="w3-bar-item w3-button" style="width:24% !important">LINK OPTIMIZATION</a>
        <a href="includes/logout.inc.php" class="w3-bar-item w3-button" style="width:15% !important">LOGOUT</a>
    </div>
</div>



     <div class="w3-padding-large" id="main">
         <!-- Header/Home -->
         <header class="w3-container w3-padding-32 w3-center w3-black" id="top">
             <h1 class="w3-jumbo">Admin <span class="w3-hide-small">Space</span></h1>
             <p>Owner Of TrekEra</p>

         </header>





       <!-- <div class="w3-top" style="margin-left: 5px;position: -webkit-sticky;position: sticky;top: 0;">
         <div class="w3-bar" style="margin-top: 20px;background:#222;">
           <form class="w3-mobile w3-container" style="margin-left: 200px;margin-right: 271.5px;" action="/action_page.php" method="get" target="_parent">
                <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Search links by typing some web annotations..." required name="adminSiteLinkSearch"  style="border-radius: 4px;">
                <button class="w3-bar-item w3-button w3-ripple w3-padding-large w3-padding-16 w3-border w3-deep-purple w3-hover-grey"  style="border-radius: 4px;margin-left:724px;margin-top: -56.5px;"><i class="fa fa-search"></i></button></p>
            </form>
        </div>
      </div>
<br><br> -->
      <!--link display cards section-->



                          <!-- <div class="w3-top w3-responsive" style="margin-left: 5px;position: -webkit-sticky;position: sticky;top: 0;">
                            <div class="w3-bar" style="margin-top: 20px;background:#222;">
                              <form class="w3-mobile w3-container" style="margin-left: 200px;margin-right: 271.5px;" action="usertable.php?" method="post" target="_parent">
                                   <p><input class="w3-input w3-padding-16 w3-border w3-responsive" type="text" placeholder="Enter username..." required name="adminSearch"  style="border-radius: 4px;width:788px;">
                                   <button type="submit" name="search-user" class="w3-bar-item w3-button w3-ripple w3-padding-large w3-padding-16 w3-border w3-deep-purple w3-hover-grey"  style="border-radius: 4px;margin-left:724px;margin-top: -56.5px;"><i class="fa fa-search"></i></button></p>
                               </form>
                           </div>
                         </div> -->


                         <!-- large screen search bar -->
                           <div class="w3-top w3-responsive w3-hide-small" style="margin-left: 5px;position: -webkit-sticky;position: sticky;top: 0;">
                             <div class="w3-bar" style="margin-top: 20px;background:#222;">
                               <form class="w3-mobile w3-container w3-padding" style="margin-left: 24%;margin-right: 20%;width:100%" action="usertable.php" method="post" target="_parent">
                                 <div class="w3-center" style="">
                                   <div class="w3-half">
                                     <input class="w3-input w3-padding-16 w3-border w3-responsive" type="text" placeholder="Enter username..." required name="adminSearch"  style="border-radius: 4px;width:100%;font-size:100%;">

                                   </div>
                                   <div class="w3-half">
                                     <button type="submit" name="search-user" class="w3-bar-item w3-button w3-ripple w3-padding-large w3-padding-16 w3-border w3-deep-purple w3-hover-grey w3-hide-small"  style="border-radius: 4px;width:10%;margin-left:-10%;font-size:100%;"><i class="fa fa-search"></i></button>
                                   </div>
                                   </div>
                                    </form>
                            </div>
                          </div>

                          <!-- small screen search bar -->
                          <div class="w3-top w3-responsive w3-hide-medium w3-hide-large" style="margin-left: 5px;position: -webkit-sticky;position: sticky;top: 0;">
                            <div class="w3-bar" style="margin-top: 20px;background:#222;">
                              <form class="w3-mobile w3-container w3-padding" style="margin-left: 13.5%;margin-right: 10%;width:100%" action="usertable.php" method="post" target="_parent">
                                <div class="w3-center" style="">
                                  <div class="w3-half">

                                    <input class="w3-input w3-padding w3-border w3-responsive w3-hide-medium w3-hide-large" type="text" placeholder="Enter username..." required name="adminSearch"  style="border-radius: 4px;width:70%;font-size:75%;">

                                  </div>
                                  <div class="w3-half">
                                    <button type="submit" name="search-user" class="w3-bar-item w3-button w3-ripple w3-padding w3-border w3-deep-purple w3-hover-grey"  style="border-radius: 4px;width:10.8%;font-size:75%;margin-top:-34.5px;margin-left:250px;"><i class="fa fa-search"></i></button>
                                  </div>
                                  </div>
                                   </form>
                           </div>
                         </div>


                         <br><br>
<?php

                          if(isset($_POST['search-user']))
                          {
                                $search = mysqli_real_escape_string($conn,$_POST['adminSearch']);
                                $sql = "SELECT *FROM users WHERE uidUsers='$search';";
                                $result = mysqli_query($conn,$sql);
                                $resultCheck = mysqli_num_rows($result);                          }
                          else
                          {
                                $sql = "SELECT *FROM users;";
                                $result = mysqli_query($conn,$sql);
                                $resultCheck = mysqli_num_rows($result);
                          }


                          if ($resultCheck > 0)    //if1
                          {
?>
                                    <div class="w3-row-padding w3-margin-top" style="margin:0 -10px">
                                        <div class="w3-card-4 w3-white w3-responsive">
                                            <div class="w3-container">
                                                <table class="w3-table w3-bordered" >
                                                    <tr>
                                                      <th>User Id</th>
                                                      <th>Username</th>
                                                      <th>Email</th>
                                                    </tr>
<?php
                                      while ($row = mysqli_fetch_assoc($result))
                                      {
?>



                                                    <tr>
                                                      <td><?php echo $row['idUsers']?></td>
                                                      <td><?php echo $row['uidUsers']?></td>
                                                      <td><?php echo $row['emailUsers']?></td>
                                                    </tr>



<?php


                                      }
?>
                                              </table>
                                          </div>
                                      </div>
                                  </div>


<?php
                          }
                          else
                          {
?>
                                      <b class="w3-center">No Results Found.</b>
<?php
                          }


?>

      <!-- End of link display cards section -->
      </section>





      </div>
