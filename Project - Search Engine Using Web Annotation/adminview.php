

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


<?php
                if ($_GET['viewlink']=="websites")//if1
                {
?>
                        <!-- large screen search bar -->
                          <div class="w3-top w3-responsive w3-hide-small" style="margin-left: 5px;position: -webkit-sticky;position: sticky;top: 0;">
                            <div class="w3-bar" style="margin-top: 20px;background:#222;">
                              <form class="w3-mobile w3-container w3-padding" style="margin-left: 20%;margin-right: 20%;width:100%" action="adminview.php?viewlink=websites" method="post" target="_parent">
                                <div class="w3-center" style="">
                                  <div class="w3-half">
                                    <input class="w3-input w3-padding-16 w3-border w3-responsive" type="text" placeholder="Search links by typing some web annotations..." required name="adminSearch"  style="border-radius: 4px;width:100%;font-size:100%;">

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
                           <div class="w3-bar" style="margin-top: 20px;background:#222;">
                             <form class="w3-mobile w3-container w3-padding" style="margin-left: 13.5%;margin-right: 10%;width:100%" action="adminview.php?viewlink=websites" method="post" target="_parent">
                               <div class="w3-center" style="">
                                 <div class="w3-half">

                                   <input class="w3-input w3-padding w3-border w3-responsive w3-hide-medium w3-hide-large" type="text" placeholder="Search links by typing some web annotations..." required name="adminSearch"  style="border-radius: 4px;width:70%;font-size:75%;">

                                 </div>
                                 <div class="w3-half">
                                   <button type="submit" name="search-site" class="w3-bar-item w3-button w3-ripple w3-padding w3-border w3-deep-purple w3-hover-grey"  style="border-radius: 4px;width:10.8%;font-size:75%;margin-top:-34.5px;margin-left:250px;"><i class="fa fa-search"></i></button>
                                 </div>
                                 </div>
                                  </form>
                          </div>
                        </div>
                         <br><br>
<?php
                          $i=0;
                          $j=10000;
                          if(isset($_POST['search-site']))
                          {
                                $search = mysqli_real_escape_string($conn,$_POST['adminSearch']);
                                $sql = "SELECT *FROM websites WHERE webAnnotation='$search';";
                                $result = mysqli_query($conn,$sql);
                                $resultCheck = mysqli_num_rows($result);                          }
                          else
                          {
                                $sql = "SELECT *FROM websites;";
                                $result = mysqli_query($conn,$sql);
                                $resultCheck = mysqli_num_rows($result);
                          }

                          if ($resultCheck > 0)//if2
                          {
                                      while ($row = mysqli_fetch_assoc($result))
                                      {
                                                $s=(string)$i;
                                                $d=(string)$j;
?>
                                                <section>
                                                    <div class="w3-row-padding" style="margin:0 -10px">
                                                        <div class="w3-half w3-margin-bottom">
                                                          <ul class="w3-ul w3-white">
                                                              <li class="w3-padding-16">
                                                                <p>
                                                                  <b style="color:grey">Web Annonation:</b> <b><?php echo $row['webAnnotation']?></b>
                                                                  <br><br>
                                                                  <b style='color:grey'>Title:</b> <b><?php echo $row['title']?></b>
                                                                  <br><br>
                                                                  <b style='color:grey'>Link:</b> <b><?php echo $row['link']?></b>
                                                                  <br><br>
                                                                  <b style='color:grey'>Link Description:</b> <b><?php echo $row['linkDesc'] ?></b>
                                                                  <br>
                                                                  <br>
                                                                  <b style='color:grey'>Link Id:</b> <b><?php echo $row['linkId'] ?></b>
                                                                  <br>
                                                                </p>
                                                              </li>


                                                              <!-- Update Button -->
                                                              <li class="w3-light-grey w3-padding-24 w3-responsive">
                                                                  <button type="button" onclick="document.getElementById('<?php echo $s ?>').style.display='block'" class="w3-button w3-padding-large w3-hover-black w3-deep-purple" style="border-radius: 4px; margin-left:10px;width: 45%;"><i class="fa fa-edit"></i>  Update</button>

                                                                  <!--Modal of update link details-->
                                                                  <div id="<?php echo $s ?>" class="w3-modal">
                                                                      <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px; background: #222; border-radius: 4px;">

                                                                          <div class="w3-center"><br>
                                                                              <span onclick="document.getElementById('<?php echo $s ?>').style.display='none'" class="w3-button w3-hover-red w3-xxlarge w3-display-topright w3-text-white" style="border-radius: 4px;" title="Close Modal">&times;</span>
                                                                              <!--  <img src="img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">-->
                                                                          </div>

                                                                          <!--Website updation form-->
                                                                          <form class="w3-container w3-text-white w3-center" action="includes/update.inc.php?id=<?php echo $row['linkId']; ?>" method="post">
                                                                              <div class="w3-section">

                                                                                <table class="w3-table">
                                                                                    <tr>
                                                                                        <td class="w3-right-align"><label>Link Id: </label></td>
                                                                                        <td><?php echo $row['linkId'] ?><td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td class="w3-right-align"><label>Web Annotation: </label></td>
                                                                                        <td><input class=" w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter Web Annonation" name="webAnnotation" value="<?php echo $row['webAnnotation']; ?>" required><td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td class="w3-right-align"><label>Title: </label></td>
                                                                                        <td><input class="w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter Title" name="title" value="<?php echo $row['title']; ?>" required></td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td class="w3-right-align"><label>Link: </label></td>
                                                                                        <td><input class="w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter Link" name="link" value="<?php echo $row['link']; ?>" required></td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td class="w3-right-align"><label>Link Description: </label></td>
                                                                                        <td><input class="w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter Link Description" name="linkDesc" value="<?php echo $row['linkDesc']; ?>" required><td>
                                                                                    </tr>

                                                                                </table>
                                                                                  <br>

                                                                                  <div class="w3-padding-24">
                                                                                    <button class="w3-button w3-padding w3-hover-grey w3-deep-purple" style="border-radius: 4px;width: 45%;" type="submit" name="update-site">Update</button>
                                                                                    <button onclick="document.getElementById('<?php echo $s ?>').style.display='none'" style="border-radius: 4px;width: 45%;" type="button" class="w3-button w3-red">Cancel</button>
                                                                                  </div>

                                                                              </div>
                                                                          </form>
                                                                      </div>
                                                                  </div>
                                                                  <!-- Delete Button -->
                                                                    <button type="button" onclick="document.getElementById('<?php echo $d ?>').style.display='block'" class="w3-button w3-padding-large w3-hover-black w3-deep-purple" style="border-radius: 4px; margin-left:35px;width: 45%;"><i class="fa fa-trash"></i>  Delete </button>
                                                                    <!--Modal of delete link-->
                                                                    <div id="<?php echo $d ?>" class="w3-modal">
                                                                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px; background: #222; border-radius: 4px;">

                                                                            <div class="w3-center"><br>
                                                                                <span onclick="document.getElementById('<?php echo $d ?>').style.display='none'" class="w3-button w3-hover-red w3-xxlarge w3-display-topright w3-text-white" style="border-radius: 4px;" title="Close Modal">&times;</span>
                                                                            </div>

                                                                            <!--Website deletion confirmation form-->
                                                                            <form class="w3-container w3-center w3-text-white" action="includes/delete.inc.php?id=<?php echo $row['linkId']; ?>" method="post">
                                                                                <div class="w3-section">
                                                                                        <br>
                                                                                        <label class="w3-center">Are you sure you want to delete website having link Id = <?php echo $row['linkId'] ?>? </label><br><br><br>
                                                                                        <button class="w3-button w3-padding w3-hover-grey w3-deep-purple" style="border-radius: 4px;width: 45%;" type="submit" name="delete-site">Yes</button>
                                                                                        <button onclick="document.getElementById('<?php echo $d ?>').style.display='none'" style="border-radius: 4px;width: 45%;" type="button" class="w3-button w3-red">No</button>

                                                                                </div>
                                                                             </form>
                                                                             <!-- End of Deletion confirmation form -->
                                                                        </div>
                                                                    </div>
                                                              </li>
                                                          </ul>
                                                        </div>
                                                    </div>
                                                  </section>

<?php
                                                  $i++;
                                                  $j++;

                                      }//end of while
                          }//end of if2
                          else
                          {
?>
                                    <b class="w3-center">No Results Found.</b>

<?php
                          }

                }//end of if1
                elseif ($_GET['viewlink']=="images")
                {
?>
                          <!-- <div class="w3-top w3-responsive" style="margin-left: 5px;position: -webkit-sticky;position: sticky;top: 0;">
                            <div class="w3-bar" style="margin-top: 20px;background:#222;">
                              <form class="w3-mobile w3-container" style="margin-left: 200px;margin-right: 271.5px;" action="adminview.php?viewlink=images" method="post" target="_parent">
                                   <p><input class="w3-input w3-padding-16 w3-border w3-responsive" type="text" placeholder="Search links by typing some web annotations..." required name="adminSearch"  style="border-radius: 4px;width:788px;">
                                   <button type="submit" name="search-image" class="w3-bar-item w3-button w3-ripple w3-padding-large w3-padding-16 w3-border w3-deep-purple w3-hover-grey"  style="border-radius: 4px;margin-left:724px;margin-top: -56.5px;"><i class="fa fa-search"></i></button></p>
                               </form>
                           </div>
                         </div> -->

                         <!-- large screen search bar -->
                           <div class="w3-top w3-responsive w3-hide-small" style="margin-left: 5px;position: -webkit-sticky;position: sticky;top: 0;">
                             <div class="w3-bar" style="margin-top: 20px;background:#222;">
                               <form class="w3-mobile w3-container w3-padding" style="margin-left: 20%;margin-right: 20%;width:100%" action="adminview.php?viewlink=images" method="post" target="_parent">
                                 <div class="w3-center" style="">
                                   <div class="w3-half">
                                     <input class="w3-input w3-padding-16 w3-border w3-responsive" type="text" placeholder="Search links by typing some web annotations..." required name="adminSearch"  style="border-radius: 4px;width:100%;font-size:100%;">

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
                            <div class="w3-bar" style="margin-top: 20px;background:#222;">
                              <form class="w3-mobile w3-container w3-padding" style="margin-left: 13.5%;margin-right: 10%;width:100%" action="adminview.php?viewlink=images" method="post" target="_parent">
                                <div class="w3-center" style="">
                                  <div class="w3-half">

                                    <input class="w3-input w3-padding w3-border w3-responsive w3-hide-medium w3-hide-large" type="text" placeholder="Search links by typing some web annotations..." required name="adminSearch"  style="border-radius: 4px;width:70%;font-size:75%;">

                                  </div>
                                  <div class="w3-half">
                                    <button type="submit" name="search-image" class="w3-bar-item w3-button w3-ripple w3-padding w3-border w3-deep-purple w3-hover-grey"  style="border-radius: 4px;width:10.8%;font-size:75%;margin-top:-34.5px;margin-left:250px;"><i class="fa fa-search"></i></button>
                                  </div>
                                  </div>
                                   </form>
                           </div>
                         </div>
                         <br><br>
<?php
                          $i=0;
                          $j=10000;
                          if(isset($_POST['search-image']))
                          {
                                $search = mysqli_real_escape_string($conn,$_POST['adminSearch']);
                                $sql = "SELECT *FROM images WHERE webAnnotation='$search';";
                                $result = mysqli_query($conn,$sql);
                                $resultCheck = mysqli_num_rows($result);
                          }
                          else
                          {
                                $sql = "SELECT *FROM images;";
                                $result = mysqli_query($conn,$sql);
                                $resultCheck = mysqli_num_rows($result);
                          }

                          if ($resultCheck > 0)    //if1
                          {
                                      while ($row = mysqli_fetch_assoc($result))
                                      {
                                                  $s=(string)$i;
                                                  $d=(string)$j;
?>

                                                    <section>
                                                      <div class="w3-row-padding" style="margin:0 -10px">
                                                          <div class="w3-half w3-margin-bottom">
                                                            <ul class="w3-ul w3-white w3-responsive">
                                                                <li class="w3-container w3-padding-16">
                                                                  <div class="w3-responsive">
                                                                    <table class="w3-table-all" >
                                                                      <tr>
                                                                        <td class="w3-center"><img src="<?php echo $row['link']?>" alt="photo" class="" style="border-radius: 4px;width:100%;"></td>
                                                                        <td class="w3-left-align">
                                                                          <p>
                                                                            <b style="color:grey">Web Annonation:</b> <b><?php echo $row['webAnnotation']?></b>
                                                                            <br><br>
                                                                            <b style="color:grey">Title:</b> <b><?php echo $row['title']?></b>
                                                                            <br><br>
                                                                            <b style="color:grey">Link:</b> <b><?php echo $row['link']?></b>
                                                                            <br><br>
                                                                            <b style="color:grey">Link Id:</b> <b><?php echo $row['linkId'] ?></b>
                                                                            <br>
                                                                          </p>
                                                                        </td>
                                                                      </tr>
                                                                    </table>
                                                                  </div>

                                                                 </li>

                                                                <li class="w3-light-grey w3-padding-24 w3-responsive">
                                                                    <button type="button" onclick="document.getElementById('<?php echo $s ?>').style.display='block'" class="w3-button w3-padding-large w3-hover-black w3-deep-purple" style="border-radius: 4px; margin-left:10px;width: 45%;"><i class="fa fa-edit"></i>  Update</button>

                                                                    <!--Modal of update link details-->
                                                                    <div id="<?php echo $s ?>" class="w3-modal">
                                                                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px; background: #222; border-radius: 4px;">

                                                                            <div class="w3-center"><br>
                                                                                <span onclick="document.getElementById('<?php echo $s ?>').style.display='none'" class="w3-button w3-hover-red w3-xxlarge w3-display-topright w3-text-white" style="border-radius: 4px;" title="Close Modal">&times;</span>
                                                                                <!--  <img src="img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">-->
                                                                            </div>

                                                                            <!--Image update link form-->
                                                                            <form class="w3-container w3-text-white w3-center" action="includes/update.inc.php?id=<?php echo $row['linkId']; ?>" method="post">
                                                                                <div class="w3-section">

                                                                                  <table class="w3-table">
                                                                                      <tr>
                                                                                          <td class="w3-right-align"><label>Link Id: </label></td>
                                                                                          <td><?php echo $row['linkId'] ?><td>
                                                                                      </tr>

                                                                                      <tr>
                                                                                          <td class="w3-right-align"><label>Web Annotation: </label></td>
                                                                                          <td><input class=" w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter Web Annonation" name="webAnnotation" value="<?php echo $row['webAnnotation']; ?>" required><td>
                                                                                      </tr>

                                                                                      <tr>
                                                                                          <td class="w3-right-align"><label>Title: </label></td>
                                                                                          <td><input class="w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter Title" name="title" value="<?php echo $row['title']; ?>" required></td>
                                                                                      </tr>

                                                                                      <tr>
                                                                                          <td class="w3-right-align"><label>Link: </label></td>
                                                                                          <td><input class="w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter Link" name="link" value="<?php echo $row['link']; ?>" required></td>
                                                                                      </tr>

                                                                                  </table>
                                                                                    <br>

                                                                                    <div class="w3-padding-24">
                                                                                      <button class="w3-button w3-padding w3-hover-grey w3-deep-purple" style="border-radius: 4px;width: 45%;" type="submit" name="update-image">Update</button>
                                                                                      <button onclick="document.getElementById('<?php echo $s ?>').style.display='none'" style="border-radius: 4px;width: 45%;" type="button" class="w3-button w3-red">Cancel</button>
                                                                                    </div>

                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <!-- -->
                                                                      <button type="button" onclick="document.getElementById('<?php echo $d ?>').style.display='block'" class="w3-button w3-padding-large w3-hover-black w3-deep-purple" style="border-radius: 4px; margin-left:35px;width: 45%;"><i class="fa fa-trash"></i>  Delete </button>
                                                                      <!--Modal of delete link-->
                                                                      <div id="<?php echo $d ?>" class="w3-modal">
                                                                          <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px; background: #222; border-radius: 4px;">

                                                                              <div class="w3-center"><br>
                                                                                  <span onclick="document.getElementById('<?php echo $d ?>').style.display='none'" class="w3-button w3-hover-red w3-xxlarge w3-display-topright w3-text-white" style="border-radius: 4px;" title="Close Modal">&times;</span>
                                                                              </div>

                                                                              <!--Image deletion confirmation form-->
                                                                              <form class="w3-container w3-center w3-text-white" action="includes/delete.inc.php?id=<?php echo $row['linkId']; ?>" method="post">
                                                                                  <div class="w3-section">
                                                                                          <br>
                                                                                          <label class="w3-center">Are you sure you want to delete image having link Id = <?php echo $row['linkId'] ?>? </label><br><br><br>
                                                                                          <button class="w3-button w3-padding w3-hover-grey w3-deep-purple" style="border-radius: 4px;width: 45%;" type="submit" name="delete-image">Yes</button>
                                                                                          <button onclick="document.getElementById('<?php echo $d ?>').style.display='none'" style="border-radius: 4px;width: 45%;" type="button" class="w3-button w3-red">No</button>

                                                                                  </div>
                                                                             </form>
                                                                          </div>
                                                                      </div>
                                                                 </li>
                                                              </ul>
                                                            </div>
                                                          </div>
                                                        </section>

<?php
                                                    $i++;
                                                    $j++;

                                      }
                          }
                          else
                          {
?>
                                      <b class="w3-center">No Results Found.</b>
<?php
                          }

                }
                else
                {
                          header("Location: ../admin.php?error=nolinksfound");
                          exit();
                }

?>

      <!-- End of link display cards section -->






      </body>
