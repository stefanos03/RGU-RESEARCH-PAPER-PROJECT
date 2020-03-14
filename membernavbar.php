<?php
    require_once("includes/avatar.php");
    
    $message = new Message();
    $memberNumOfNewMessage =  $message->getMemberNumOfNewMessages($_SESSION['myUserId']);

    $notification = new Notification();
    $eventCommentNotify = $notification->getNewEventComments($_SESSION['myUserId']);
    $attendNotify = $notification->getNewAttending($_SESSION['myUserId']);
    $followNotify = $notification->getNewFollowing($_SESSION['myUserId']);
    $groupCommentNotify = $notification->getNewGroupComment($_SESSION['myUserId']);
    $eventsAmFollowing = $notification->getNewFromEventsAmFollowing($_SESSION['myUserId']);
    $totalNotifications = $eventCommentNotify + $attendNotify + $followNotify + $groupCommentNotify + $eventsAmFollowing;

    $notificationClass = "style='display:none;'";
    if ($totalNotifications>0)
    {
      $notificationClass = "style='display:inline;'";
    }

   



    $messageNotifyClass= "style='display:none;'";
    if ($memberNumOfNewMessage>0)
    {
        $messageNotifyClass = "style='display:inline;'";
    }

    
    
?>
<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#15679C;color:white;">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><div id="logo">&nbsp;</div></a>
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
            <li><a style='color:#800080;' href="browse_events.php"><span class="fa fa-search" ></span><strong> Browse Events</strong></a></li>
            <li class="dropdown">
              <a style='color:#800080;' class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" href="#">
                  <span class="fa fa-question"></span><strong> Help </strong><b class="caret"></b>
              </a>
                <ul class="dropdown-menu">
                  <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="#">How it works</a></li>
                  <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="#">What does it cost to create and event ?</a></li>
                  <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="#">How to contact the event organizer</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a style="color:#800080;" href="#">Help Center</a></li>
                </ul>

            </li>
            <li class="dropdown">
                <a style='color:#800080;' class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" href="#">
                  <span class="fa fa-calendar"></span><strong> Event </strong><b class="caret"></b>
              </a>
                  <ul class="dropdown-menu">
                      <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="new_event.php"> Create Event</a></li>
                      <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="myevents.php">Manage Events</a>
                      <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="browse_events.php"> Browse Events</a></li>
                  </ul>
            </li>
            <li class="dropdown">
                <a style='color:#800080;' class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" href="#">
                  <span class="fa fa-group"></span><strong> Group </strong><b class="caret"></b>
              </a>
                  <ul class="dropdown-menu">
                      <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="create_group.php"> Create Group</a></li>
                      <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="mygroups.php">Manage Groups </a> 
                      <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="listgroups.php"> Browse Groups</a></li>
                  </ul>

            </li>
            
            
            <li><a style='color:#800080;' href="message.php"><span class="fa fa-envelope-o"></span><strong> Message</strong> <span class="badge badge-notify" <?php echo $messageNotifyClass; ?> ><?php echo $memberNumOfNewMessage; ?></span></a></li>
            <li><a style='color:#800080;' href="notifications.php"><span class="fa fa-bell-o"></span><strong> Notification</strong> <span class="badge badge-notify" <?php echo $notificationClass; ?> ><?php echo $totalNotifications; ?></span> </a></li>
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" href="help.php">
                  <img src="<?php echo $myPhoto; ?>" class="img-circle" width="30px" height="30px" hspace="2px" align="left" > <b class="caret"></b>
              </a>
                <ul class="dropdown-menu">                  
                  <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="profile.php">Profile</a></li>                 
                  <!--<li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="#">Settings</a></li> //-->
                  <li role="separator" class="divider"></li>
                  <li><a style="padding-top:8px;padding-bottom:8px;color:#800080;" href="logout.php">Log out</a></li>                
                 
                </ul>

            </li>


          </ul>
      </div>
    </nav>