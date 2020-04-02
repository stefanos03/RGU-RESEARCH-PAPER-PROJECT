<?php
    require_once("includes/avatar.php");
    
    

    
    
    
?>
<nav class="navbar navbar-default navbar-fixed-top" style="background-color:purple;color:white;">
      <div class="navbar-header">
          <a href="browsepapers.php"> <img src="images/logop.png" alt="logo" width="70" height="70" ></a>
        <strong>RGU Research paper Project</strong>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-menu" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- <a class="btn btn-primary navbar-btn pull-right" href="#" role="button">Sign up</a> -->
      </div>

      

      <div id="nav-menu" class="collapse navbar-collapse " style="margin-left: 600px; margin-top: 10px">
          <ul class="nav navbar-nav">
              <li class=" nav navbar-nav"><a class="w3-button w3-hover-yellow" style='color:white; 'href="browsepapers.php"><span class="fa fa-home" ></span><strong> Back To Main</strong></a></li>

              <li class=" nav navbar-nav"><a class="w3-button w3-hover-yellow" style='color:white; 'href="submitpaper_by_member1.php"><span class="fa fa-paper-plane" ></span><strong> Submit Paper</strong></a></li>
              <li class=" nav navbar-nav"><a class="w3-button w3-hover-yellow" style='color:white; 'href="my_submissions.php"> <span class="fa fa-paperclip" ></span><strong> My Submissions</strong></a></li>
              <li class=" nav navbar-nav"><a class="w3-button w3-hover-yellow" style='color:white; 'href="papers_awaiting_review.php"><span class="fa fa-search" ></span><strong> Review Paper</strong></a></li>
              <li class=" nav navbar-nav"><a class="w3-button w3-hover-yellow" style='color:white; 'href="my_papers_reviewed.php"><span class="fa fa-search-plus" ></span><strong> Papers Reviewed</strong></a></li>








              <li style="float: right; margin-top: 10px"> <?php  echo "<strong>Welcome ".$_SESSION['myLastname'].' '.$_SESSION['myFirstname']."</strong><br>";
                  ?>  </li>
            <li class="dropdown" style="margin-left: 350px; margin-top: -10px">
              <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" href="AboutUs.php">
                  <img src="<?php echo $ProfilPic; ?>" class="img-rounded" width="40px" height="40px" hspace="2px" align="left" > <b class="caret"></b>
              </a>
                <ul class="dropdown-menu">
                  
                  <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="profile.php">Profile</a></li>                 
                  <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="change_password.php">Change Password</a></li> 
                  <li role="separator" class="divider"></li>
                  <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="logout.php">Log out</a></li>                
                 
                </ul>

            </li>


          </ul>
      </div>
    </nav>