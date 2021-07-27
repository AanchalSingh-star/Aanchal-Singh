<?php
session_start();
?>

<?php
  require "adminstylesheet.php"
?>


<body class="w3-black">




    <!-- Icon Bar (Sidebar - hidden on small screens) -->
    <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

        <!-- Avatar logo in top left corner -->
        <div class="w3-container" style="font-family: "Tangerine", serif;">
            <p class="w3-xxlarge">TrekEra</p>
        </div>

        <a href="#main" class="w3-bar-item w3-button w3-padding-large w3-black">
            <i class="fa fa-home w3-xxlarge"></i>
            <p>HOME</p>
        </a>

        <a href="#add" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
            <i class="fa fa-plus w3-xxlarge"></i>
            <p>ADD LINKS</p>
        </a>
        <a href="#view" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
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
            <a href="#main" class="w3-bar-item w3-button" style="width:15% !important">HOME</a>
            <a href="#add" class="w3-bar-item w3-button" style="width:15% !important">ADD LINKS</a>
            <a href="#view" class="w3-bar-item w3-button" style="width:15% !important">VIEW LINKS</a>
            <a href="usertable.php" class="w3-bar-item w3-button" style="width:15% !important">VIEW USERS</a>
            <a href="optimizelink.php" class="w3-bar-item w3-button" style="width:24% !important">LINK OPTIMIZATION</a>
            <a href="includes/logout.inc.php" class="w3-bar-item w3-button" style="width:15% !important">LOGOUT</a>
        </div>
    </div>


<!--

<div class="w3-top">
    <div class="w3-bar" style="background: #222;margin-left: 180px;margin-right: 180px;height: 60px">
        <br><a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-black"></a>
    </div>
</div>


-->
    <img src="icons/admin icon.png" style="width:4%;margin-top:1%;margin-right:1%;" alt="admin icon" class="w3-display-topright w3-hide-small">
    <!-- Page Content -->
    <div class="w3-padding-large" id="main">
        <!-- Header/Home -->
        <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
            <h1 class="w3-jumbo">Admin <span class="w3-hide-small">Space</span></h1>
            <p>Owner Of TrekEra</p>
            <img src="img/admin space.jpg" alt="Admin Space" class="w3-image" width="992" height="1108">
      </header>







        <!-- Grid for pricing tables -->

            <div class="w3-row-padding" id="add" style="margin-left:2%;margin-top:-12px">
              <div class="w3-half w3-margin-bottom">
                <ul class="w3-ul w3-white w3-center" style="width:95%;">
                  <li class="w3-dark-grey w3-xlarge w3-padding-32">ADD LINKS</li>
                  <li class="w3-padding-16"><p>Add website links and image links with title, link description and web annotation.</p></li>

                  <li class="w3-light-grey w3-padding-24">
                    <div class="w3-row-padding w3-hide-small" style="">
                        <div class="w3-half">
                            <img src="https://icon-library.com/images/website-icon-black/website-icon-black-2.jpg" style="width:50%; margin-left:20px;" alt="website icon" class="w3-margin-bottom">
                        </div>
                        <div class="w3-half">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3TlYWulSE5ifukjmDMdGOsE_S7dx9WCJGSQ&usqp=CAU" style="width:60%; margin-left:12.5%;margin-right: 11%;" alt="images icon" class="w3-margin-bottom">
                        </div>
                    </div>
<!-- For large and medium screen -->
                    <button type="button" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-padding-large w3-hover-black w3-deep-purple w3-hide-small" style="border-radius: 4px; margin-left:3%;width: 35%;"><i class="fa fa-plus"></i>  Website Link</button>
<!-- For small screen -->
                    <button type="button" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-padding w3-hover-black w3-deep-purple w3-hide-medium w3-hide-large" style="border-radius: 4px; margin-left:3%;width: 37%;font-size:74%;"><i class="fa fa-plus"></i>  Website Link</button>


                    <!--Modal of website link-->
                    <div id="id01" class="w3-modal">
                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px; background: #222; border-radius: 4px;">

                            <div class="w3-center"><br>
                                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-hover-red w3-xxlarge w3-display-topright w3-text-white" style="border-radius: 4px;" title="Close Modal">&times;</span>
                                <!--  <img src="img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">-->
                            </div>

                            <!--Website add link form-->
                            <form class="w3-container w3-text-white w3-center" action="includes/add.inc.php" method="post">
                                <div class="w3-section">

                                  <table class="w3-table">
                                      <tr>
                                          <td class="w3-right-align"><label>Web Annotation: </label></td>
                                          <td><input class=" w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter Web Annonation" name="webAnnotation" required><td>
                                      </tr>

                                      <tr>
                                          <td class="w3-right-align"><label>Title: </label></td>
                                          <td><input class="w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter Title" name="title" required></td>
                                      </tr>

                                      <tr>
                                          <td class="w3-right-align"><label>Link: </label></td>
                                          <td><input class="w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter Link" name="link" required></td>
                                      </tr>

                                      <tr>
                                          <td class="w3-right-align"><label>Link Description: </label></td>
                                          <td><input class="w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter Link Description" name="linkDesc" required><td>
                                      </tr>

                                  </table>
                                    <br>

                                    <div class="w3-padding-24">
                                      <button class="w3-button w3-padding w3-hover-grey w3-deep-purple" style="border-radius: 4px;width: 45%;" type="submit" name="insert-site">Insert</button>
                                      <button onclick="document.getElementById('id01').style.display='none'" style="border-radius: 4px;width: 45%;" type="button" class="w3-button w3-red">Cancel</button>
                                    </div>


                                    <!--<input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me -->
                                </div>
                            </form>


                        </div>
                      </div>
<!-- For large and medium screen -->
                      <button type="button" onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-padding-large w3-hover-black w3-deep-purple w3-hide-small" style="border-radius: 4px; margin-left:12.5%;margin-right: 3%; width: 35%;"><i class="fa fa-plus"></i>  Image Link </button>
<!-- For small screen -->
                      <button type="button" onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-padding w3-hover-black w3-deep-purple w3-hide-medium w3-hide-large" style="border-radius: 4px; margin-left:12.5%;margin-right: 3%; width: 37%;font-size:74%;"><i class="fa fa-plus"></i>  Image Link </button>

                      <!--Modal of add image link-->
                      <div id="id02" class="w3-modal">
                          <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px; background: #222; border-radius: 4px;">

                              <div class="w3-center"><br>
                                  <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-hover-red w3-xxlarge w3-display-topright w3-text-white" style="border-radius: 4px;" title="Close Modal">&times;</span>
                                  <!--  <img src="img_avatar4.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">-->
                              </div>






                              <!--Image add link form-->
                              <form class="w3-container w3-text-white w3-center" action="includes/add.inc.php" method="post">
                                  <div class="w3-section">
                                    <table class="w3-table">
                                        <tr>
                                            <td class="w3-right-align"><label>Web Annotation: </label></td>
                                            <td><input class=" w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter Web Annonation" name="webAnnotation" required><td>
                                        </tr>

                                        <tr>
                                            <td class="w3-right-align"><label>Title: </label></td>
                                            <td><input class="w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter Title" name="title" required></td>
                                        </tr>

                                        <tr>
                                            <td class="w3-right-align"><label>Link: </label></td>
                                            <td><input class="w3-border w3-margin-bottom" style="border-radius: 4px;" type="text" placeholder="Enter Link" name="link" required></td>
                                        </tr>

                                    </table>
                                      <br>

                                      <div class="w3-padding-24">
                                        <button class="w3-button w3-padding w3-hover-grey w3-deep-purple" style="border-radius: 4px;width: 45%;" type="submit" name="insert-image">Insert</button>
                                        <button onclick="document.getElementById('id02').style.display='none'" style="border-radius: 4px;width: 45%;" type="button" class="w3-button w3-red">Cancel</button>
                                      </div>

                                  </div>
                             </form>
                      </div>
                    </div>

                  </li>
                </ul>
              </div>

              <div class="w3-half" id="view">
                <ul class="w3-ul w3-white w3-center" style="width:95%">
                  <li class="w3-dark-grey w3-xlarge w3-padding-32">VIEW LINKS</li>
                  <li class="w3-padding-16"><p>View and search for available links. Manipulate and update information related to the links. You can delete the links permanently as well.</p></li>

                  <li class="w3-light-grey w3-padding-24">

                    <div class="w3-row-padding w3-hide-small" style="">
                      <div class="w3-half">
                        <img src="https://icon-library.com/images/website-icon-black/website-icon-black-2.jpg" style="width:50%;" alt="website icon" class="w3-margin-bottom">
                      </div>
                      <div class="w3-half">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3TlYWulSE5ifukjmDMdGOsE_S7dx9WCJGSQ&usqp=CAU" style="width:60%;margin-left:12.5%;margin-right: 11%;" alt="images icon" class="w3-margin-bottom">
                      </div>
                    </div>
<!-- For large and medium screen -->
                    <a type="button" href="adminview.php?viewlink=websites" class="w3-button w3-padding-large w3-hover-black w3-deep-purple w3-hide-small" style="border-radius: 4px; margin-left:3%;width: 35%;"><i class="fa fa-eye"></i>  Website Links</a>
                    <a type="button" href="adminview.php?viewlink=images" class="w3-button w3-padding-large w3-hover-black w3-deep-purple w3-hide-small" style="border-radius: 4px; margin-left:12.5%;margin-right: 3%; width: 35%;"><i class="fa fa-eye"></i>  Image Links </a>
<!-- For small screen -->
                    <a type="button" href="adminview.php?viewlink=websites" class="w3-button w3-padding w3-hover-black w3-deep-purple w3-hide-medium w3-hide-large" style="border-radius: 4px; margin-left:3%;width: 37%;font-size:74%;"><i class="fa fa-eye"></i>  Website Links</a>
                    <a type="button" href="adminview.php?viewlink=images" class="w3-button w3-padding w3-hover-black w3-deep-purple w3-hide-medium w3-hide-large" style="border-radius: 4px; margin-left:12.5%;margin-right: 3%; width: 37%;font-size:74%;"><i class="fa fa-eye"></i>  Image Links </a>

                  </li>
                </ul>
              </div>
            </div>
            <!-- End Grid/Pricing tables -->
            </div>
</body>































<?php
  //require "adminsidebar.php"
?>


<!--
<frameset rows="10%, 90%">
    <frame src="adminheader.php">
    <frame src="adminmain.php">
</frameset>
