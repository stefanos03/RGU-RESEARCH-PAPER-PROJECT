<?php
    require_once("includes/avatar.php");
    
    

    
    
    
?>
<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#15679C;color:white;">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php" style='font-size:30px;color:#ffffff;'>PreshApp&nbsp;</div></a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-menu" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- <a class="btn btn-primary navbar-btn pull-right" href="#" role="button">Sign up</a> -->
      </div>

      

      <div id="nav-menu" class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a style='color:#ffffff;' href="browsepapers.php"><span class="fa fa-search" ></span><strong> Browse Papers</strong></a></li>
            <li class="dropdown">
              <a style='color:#ffffff;' class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" href="#">
                  <span class="fa fa-file-o"></span><strong> Papers </strong><b class="caret"></b>
              </a>
                <ul class="dropdown-menu">
                  <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="submitpaper_by_member.php">Submit Paper</a></li>
                  <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="my_submissions.php">My Submissions</a></li>
                  <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="papers_awaiting_review.php">Review Paper</a></li>   
                  <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="my_papers_reviewed.php">Papers Reviewed</a></li>               
                </ul>

            </li>
                       
            
            
            
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" href="AboutUs.php">
                  <img src="<?php echo $myPhoto; ?>" class="img-circle" width="30px" height="30px" hspace="2px" align="left" > <b class="caret"></b>
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