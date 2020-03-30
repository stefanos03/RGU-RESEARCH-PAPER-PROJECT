<?php
    require_once("includes/avatar.php");
    //Admin Navigation menu
?>
<!--Nav starts-->
<nav class="navbar navbar-default navbar-fixed-top" style="background-color:purple;color:white;">
      <div class="navbar-header">
          <a href="browsepapers.php"> <img src="images/logop.png" alt="logo" width="70" height="70" ></a>
        <strong> RGU Research paper Project</strong></div>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-menu" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

      </div>



      <div id="nav-menu" class="collapse navbar-collapse" style="margin-left: 400px; margin-top: 10px">
          <ul class="nav navbar-nav">

            <li class=" nav navbar-nav"><a class="w3-button w3-hover-yellow" style='color:#ffffff; 'href="browsepapers.php"><span class="fa fa-home" ></span><strong> Back To Main</strong></a></li>

                <li class="nav navbar-nav"><a style="color:#ffffff;" href="createproject.php"><span class="fa fa-folder-open"></span><strong> Create Project  </strong></a></li>

              <li class="nav navbar-nav"><a style="color:#ffffff;" href="manageprojects.php"><span class="fa fa-tasks"></span><strong> Manage Project </strong></a> </li>

              <li class="nav navbar-nav"><a style="color:#ffffff;" href="createuser.php"><span class="fa fa-user-plus"></span><strong> Create User </strong></a> </li>
              <li class="nav navbar-nav"><a style="color:#ffffff;" href="manageusers.php"><span class="fa fa-user-times"></span><strong> Manage User </strong></a> </li>
              <li class="nav navbar-nav"><a style="color:#ffffff;" href="assignusertoproject.php"><span class="fa fa-users"></span><strong> Assign User </strong></a> </li>
                  
                </li>

            </li>

<!--users starts-->
<!--            <li class="dropdown"><a style='color:#ffffff;' class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" href="#">-->
<!--                      <span class="fa fa-user-o"></span><strong> User </strong><b class="caret"></b></a>-->
<!--                  <ul class="dropdown-menu">-->
<!--                      <li class="nav navbar-nav"><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="createuser.php"> <strong>Create User </strong></a></li>-->
<!--                      <li class="nav navbar-nav"><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="manageusers.php"> <strong>Manage User </strong></a></li>-->
<!--                      <li class="nav navbar-nav"><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="assignusertoproject.php"> <strong>Assign User </strong></a></li>-->
<!---->
<!--                  </ul>-->
<!---->
<!--              </li>-->
            
<!--            Users ends-->
            
            
<!--  Menu of admin starts-->
              <li style="float: right; margin-top: 10px"> <?php  echo "<strong>Welcome ".$_SESSION['myLastname'].' '.$_SESSION['myFirstname']."</strong><br>";
                      ?>  </li>
            <li class="dropdown" style="margin-left: 350px; margin-top: -10px">
              <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" href="AboutUs.php"  >
                  <img src="<?php echo $ProfilPic; ?>" class="img-rounded" width="40px" height="40px" hspace="1px" align="left" > <b class="caret"></b>
              </a>


                <ul class="dropdown-menu">                  
                  <li><a style="padding-top:8px;padding-bottom:8px;color:purple;" href="profile.php">Profile</a></li>
                  <li><a style="padding-top:8px;padding-bottom:8px;color:purple;" href="change_password.php">Change Password</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a style="padding-top:8px;padding-bottom:8px;color:purple;" href="logout.php">Log out</a></li>
                 
                </ul>

            </li>
<!--    Menu of admin ends-->


          </ul>
      </div>
    </nav>