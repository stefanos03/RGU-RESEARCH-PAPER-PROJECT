<?php
  error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
session_destroy();
$pageTitle = "Home_Page";
require_once("classes/Conf.php");

$message = "";
$status = "";
$content = "";

//check if cookie is set
if (isset($_COOKIE['username']) && $_COOKIE['password'])
{
    
    loginFunction($_COOKIE['username'],$_COOKIE['password']);
}



//Login form functionality start
if (isset($_POST['submitForm']))
{
    $usrname = SanitizeField::clean($_POST['username']);
    $password = SanitizeField::clean($_POST['epassword']);
    
    if ($usrname!="" && $password!="")
    {
          if (!empty($_POST['remember_me']))
            {
               setcookie("username",$usrname,time()+3600);
               setcookie("password",$password, time()+3600);
               //echo "Cookie set successfully";
            }
            else{
              //echo "Remember  Cookie is not set ";
              setcookie("username",'');
              setcookie("password",'');
            }
          loginFunction($usrname,$password);
    }else
    {
       $status = "error your something went wrong";
       $message = "Username and password is required to login!!!";
    }
}


//Login function
function loginFunction($username,$password)
{
        $Members = new Member();
        $dataArray = array("username"=>$username,"password"=>$password);
        $Results =  $Members->login($dataArray);

        if ($Results['status']=="success")
        {
            session_start();
            $_SESSION['memberLogin'] = 'stefanos2020';
            $_SESSION['myUserId'] = $Results["id"];
            $_SESSION['myLastname'] = $Results["lastname"];
            $_SESSION['myFirstname'] = $Results["firstname"];
            $_SESSION["myLocation"] = $Results["location"];
            $_SESSION["myAddress"] = $Results["address"];
            $_SESSION["myEmail"] = $Results["email"];
            $_SESSION["myCountry"] = $Results["country"];
            $_SESSION["myPhoto"] = $Results["photo"];
//            $_SESSION['myAboutme'] = $Results['aboutme'];
            $_SESSION['myRole'] = $Results['role'];

            header("location:browsepapers.php");
        }
        else
        {
            $status = $Results["status"];
            $message = $Results["message"];
            echo "Username and password is required to login!!!";
        }

}//end of loginFunction

include("header.php");
include("guestnavbar.php");







?>
<!DOCTYPE html>
<html>

<head>
    <title>W3.CSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .mySlides {display:none;}
    </style>
</head>

<div class="w3-container w3-padding-16 w3-purple" style="margin-top: 5px">
    <h2 style="margin-left: 700px">Welcome to RGU Research Paper Project </h2>
    <p style="margin-left: 200px">This project will be designing to implement a web application that will help group project to upload, identification, review, monitoring and following of research papers between the group members.
        <br> The research activities will be report writing, review, editing and other similar tasks can be to monitor and track the editorial progress of a number of papers within a limited time.
        <br>Furthermore, this project will give the opportunity for the user to create platform that will support group project teams.</p>
</div>
<body style="background: orchid">

<div class="w3-content w3-display-container " style="margin-top: 90px; width: 1050px; height: 650px;">

    <div class="w3-display-container mySlides">
        <img src="images/nice.png" style="width:100%">
        <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
            Welcome to our webpage
        </div>
    </div>

    <div class="w3-display-container mySlides">
        <img src="images/how-to-write-a-research-paper.jpg" style="width:100%">
        <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
              You can now upload your documents here
        </div>
    </div>

    <div class="w3-display-container mySlides">
        <img src="images/research_essay.jpg" style="width:100%">
        <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
        Review all your documents anytime
        </div>
    </div>
<!--    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>-->
<!--    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>-->
    </div>
</div>
</body>

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 5000); // Change image every 2 seconds
    }
</script>

</body>
</html>

<!--                <br/>-->
<!--                <h1>Welcome to PreshApp<br/><small>Project Research Sharing App</small></h1>-->
<!---->
<!--                <img src="" style='width:100%;'/>-->
<!---->
<!--                <br/><br/>-->
<!--                This project is the design, development and implementation of a web application that will facilitate the upload, identification, review, monitoring and tracking of research papers among group members. Research activities; report writing, review, editing and other associated task can be daunting particularly with the need to monitor and track the editorial progress of a number of papers within a limited span of time.-->
<!--                <br/><br/>-->
<!--                <strong><big><a href='help.php'>Learn More</a></big></strong>-->
<!---->
<!---->
<!--            </div>-->
<!--            <div class="col-sm-5">-->
<!--                <br/><br/>-->
<!--                <h2>Sign In</h2>-->
<!--                <br/>-->
            <!-- Login form //-->
            <?php
                  require_once("functions/Alert.php");

            ?>

              <!-- Login form //-->
<!--              <form id="signin" method="post" action="index.php">-->
<!--                      <div class="form-group">-->
<!--                        <label class="col-xs-12 control-label no-padding-right text-left" for="Username"> Username  </label>-->
<!--                        <div class="input-group">-->
<!--                          <div class="input-group-addon"><span class="fa fa-user-o"></span></div>-->
<!--                          <input type="text" class="form-control" id="email" name="username" placeholder="Username">-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="form-group">-->
<!--                        <label class="col-xs-12 control-label no-padding-right text-left" for="Password"> Password  </label>-->
<!--                        <div class="input-group">-->
<!--                          <div class="input-group-addon"><span class="fa fa-key"></div>-->
<!--                          <input type="password" class="form-control" name="epassword" id="epassword" placeholder="Password">-->
<!--                        </div>-->
<!--                      </div>-->
<!---->
<!--                      <div class="text-right">-->
<!--                          <input type="checkbox" name="remember_me"> Remember me &nbsp;&nbsp;&nbsp;<small></small>&nbsp;&nbsp;&nbsp;-->
<!--                          <input type="submit" name="submitForm" class="btn btn-default" value="Login ">-->
<!---->
<!--                      </div>-->
<!--                    </form>-->

            <!-- end of Login form //-->


            </div>



  <!-- container //-->
    </section>


    
    
<!---->
<br>
<br>
<br>
<?php
   require_once("footer2.php");
?>
<script type="text/javascript" src="js/datetimelibrary.js"></script>
<script type="text/javascript" src="js/newsletter.js"></script>