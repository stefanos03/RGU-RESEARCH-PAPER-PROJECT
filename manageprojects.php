<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
   require_once("includes/login_module.php");
   $pageTitle = "Manage Project";  
   require_once("classes/Conf.php");
   require_once("header.php");    

?>

        <br/>
   <div  style="background-image: url('images/background9.jpeg')">
        <div class="container">
            <div class="col-xs-12 text-right">
                  <?php
                           $userRole = '';
                           if ($_SESSION['myRole']=='admin')
                           {
                              $userRole = 'Administrator';
                           }
                           else if ($_SESSION['myRole']=='teamleader')
                           {
                              $userRole = 'Team Leader';

                           }else if ($_SESSION['myRole']=='member' || $_SESSION['myRole']=='')
                           {
                              $userRole = 'Member';
                           }

                  echo "<strong style='margin-right: 300px; font-size: 40px; color: purple '>Welcome ".$userRole."</strong>,<br>";
                    ?>
                </div>

            <div class="row">
                <div class="col-xs-12">
                    <h3 class="text-left price-headline" style="color:purple; margin-left: 450px"><strong>Manage Project and Users</strong></h3>
                </div>

                
            </div>
                  
                  

            <div class="row" style="border: solid 3px purple; padding: 30px; background: purple;">
                <h3 class="text-left price-headline container-fixed-top" style="color:white; margin-left: 500px;">Manage Project</h3>
                <?php
                    $project = new Project();
                    $allProjects = $project->getAllProject();
                    foreach($allProjects as $row)
                    {
                      $id = $row['id'];
                      $name = $row['name'];
                      $code = $row['code'];
                      $datecreated = new DateTime($row['datecreated']);
                      $datecreated = $datecreated->format('l jS F, Y');
                      $deleteUrl = "<a href='deleteproject.php?id=".$id."'style='color: white'>Delete</a>";


                ?>  
                      <div class="row">
                          <div class="col-xs-12">
                              <?php
                                echo "<strong style='color: white'><i class='fa fa-folder-open' style='color: white'></i> ".$name."</strong>
                                <br/><small> <i class='fa fa-trash' style='color: white'></i> ".$deleteUrl."</small>";
                              ?>
                          </div>
                      </div>
                      <hr style=" border-top: 1px dotted white;">

                <?php

                    }
                ?>

            </div>
    </div><!-- end of container //-->

<!--Start Manage Users-->
<br/>
<div class="container">
    <div class="col-xs-12 text-right">
        <?php
        $userRole = '';
        if ($_SESSION['myRole']=='admin')
        {
            $userRole = 'Administrator';
        }
        else if ($_SESSION['myRole']=='teamleader')
        {
            $userRole = 'Team Leader';

        }else if ($_SESSION['myRole']=='member' || $_SESSION['myRole']=='')
        {
            $userRole = 'Member';
        }

        ?>
    </div>
    <hr style=" border-top: 1px dashed purple;" >
    <div class="row">
        <div class="col-xs-12">

        </div>


    </div>



    <div class="row" style="border: solid 3px purple; padding: 30px; background: purple; margin-bottom: 30px">
        <h3 class="text-left price-headline container-fixed-top" style="color:white; margin-left: 500px;">Manage User</h3>
        <br>
        <?php
        $user = new User();
        $allUsers = $user->getAllUsers();
        foreach($allUsers as $row)
        {
            $id = $row['id'];
            $name = $row['lastname'].' '.$row['firstname'];
            $email = $row['email'];
            $location = $row['location'];
            $address = $row['address'];
            $country = $row['country'];
            $pwd = $row['password'];
            $role = $row['role'];
            $datecreated = new DateTime($row['datecreated']);
            $datecreated = $datecreated->format('l jS F, Y');


            $deleteUrl = "<a href='deleteproject.php?id=".$id."'>Delete</a>";
            if ($role=='')
            {
                $role = 'member';
            }

            $memberLink = "<a href='member.php?mp=aHR0cHM6Ly9haXJ2aWV3c3RvcmFnZS5ibG9iLmNvcmUud2luZG93cy5uZX-".$id."-QvYXZhdGFycy9hYzE4ZWNiNjZkN2ZiYTE4YzY3MTUxYzM3MDhiMmMzZQ'>".$name."</a>"

            ?>
            <div class="row">
                <div class="col-xs-3">
                    <?php
                    echo "<strong><i class='fa fa-user-o'></i> ".$memberLink."</strong><br/><small><i class='fa fa-map-marker'></i> ".$location."</small>";
                    ?>
                </div>
                <div class="col-xs-3">
                    <?php
                    echo "<i class='fa fa-envelope-o'></i> ".$email;
                    ?>
                </div>
                <div class='col-xs-2'>
                    <?php
                    echo "<i class='fa fa-tasks'></i> ".$role;
                    ?>
                </div>
                <div class="col-xs-4">
                    <?php
                    echo "<small style='color: white'><i class='fa fa-calendar-o'></i> ".$datecreated."</small>";
                    ?>
                </div>

            </div>
            <hr  style=" border-top: 1px dashed white;">

            <?php

        }
        ?>

    </div>
</div><!-- end of container //-->
   </div>
<br>
<br>
<br>



<?php
   require_once("footer.php");

?>
