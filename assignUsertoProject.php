<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
   require_once("includes/login_module.php");
   $pageTitle = "Assign User to Project";  
   require_once("classes/Config.php");
   require_once("header.php");    
      
   $status='';

  //Function to assign user to project group
   if (isset($_POST['submitForm']))
   {
        $projectid = $_POST['project'];
        $userid = $_POST['user'];
        


        if ($projectid=='' || $userid=='')
        {
           $status='warning';
           $msg = "All fields are required to be filled before continuing.";
        }else
        {
            $project = new Project();            
            $result = $project->assign_project_user($projectid,$userid);
            $status = $result["status"];
            $msg = $result["msg"];
        }
   }

    

?>


        <br/>
<div style="background-image: url('images/background3.jpeg'); background-size: 2000px">

    <br>
        <div class="container" >
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

                           echo "<strong style='margin-right: 350px; font-size: 40px; color: purple '>Welcome ".$userRole."</strong>";


                    ?>
                </div>
            <br>
            <br>
            <br>


             <form name="assign_user_toproject" action="assignUsertoProject.php" method="post" style="border: 4px solid purple;padding: 80px; margin-right: 30px; background: purple">
                 <h3 class="text-center price-headline w3-display-topmiddle" style="color:white;">Assign User to Project</h3>
                 <br> <br>
              <div class="form-group row">
                  <label for="Project Short Name"  class="col-xs-12 col-sm-2 col-form-label text-center" style="border: 2px solid white; padding:3px; margin-right: 10px;color: white">Project</label>
                  <div class="form-group col-xs-12 col-sm-5">
                      <select class="form-control" name="project" style="margin-left: 150px">
                            <option></option>

                            <?php
                              $project = new Project();
                              $result = $project->getAllProject();
                              foreach ($result as $type)
                              {
                                $id = $type['id'];
                                $name =  $type['name'];
                            ?>
                            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                            <?php

                              }

                            ?>   
                      </select>
                  </div>
              </div>


              <div class="form-group row">
                  
                  <label for="Project Short Name"  class="col-xs-12 col-sm-2 col-form-label text-center " style="border: 2px solid white; padding: 3px; margin-right: 10px; color: white">User</label>
                  
                  <div class="form-group col-xs-12 col-sm-5">
                      <select class="form-control" name="user" style="margin-left: 150px">
                            <option></option>

                            <?php



                              $project = new User();
                              $result = $project->getAllUsers();
                              foreach ($result as $type) {
                                  $id = $type['id'];
                                  $name = $type['lastname'] . ' ' . $type['firstname'];



                            ?>
                            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                             

                            <?php

                              }

                            ?>   
                      </select>
                  </div>
              </div>
                            
              <div class="row" style="margin-top:10px;">
                  
                  <div class="col-xs-2 col-sm-2">&nbsp;</div>
                  <div class="col-xs-10 col-sm-10">
                      <input  class="btn btn-primary " type="submit" name="submitForm" value="Create" style="margin-left: 500px; background: white; color: purple"/>
                  </div>
              </div>
              </form>

              <?php
                $project = new Project();
                $list = $project->getAllProjectsUsers();
                $NumberProjectUsers = $list->num_rows;
              ?>

              <br/><br/>
        </div>
<!--Assigned user to project-->
            <div class="container" style="border: solid 5px mediumpurple; background: purple; color: white">
              <div class="row" style="  margin-right: 30px; margin-left: 2px">
                  <div class="col-xs-12">
                    <h4 class="text-center " style="color:white;"> <strong>Assigned  User to Project </strong>(<?php echo $NumberProjectUsers; ?>)</h4>
                </div>

              </div>
              <br/>
              <?php
                  
                  foreach($list as $type)
                  {

                    $role = $type['role'];
                    if ($role=='')
                    {
                      $role= "Member";
                    }
              ?>


              <div class="row" style="text-decoration:underline; margin-left: 150px; color: white"  >
                  <div class="col-xs-4" style="text-decoration: underline; color: white">
                        <?php echo "<i class='fa fa-folder-open'></i> <a style='color: white' href='createAndManageProject.php'>" .$type['name']."</a>"; ?>
                  </div>

                  <div class="col-xs-3" style="text-decoration: underline; color: white">
                        <?php  
                          echo "<i class='fa fa-user'></i> <a style='color: white' href='createAndManageProject.php'>" .$type['lastname'].' '.$type['firstname']."</a>";
                        ?>
                  </div>
                  <div class="col-x3-5" style="text-decoration: underline;color: white">
                      <?php
                          echo "<i class='fa fa-users'></i> <a style='color: white' href='createAndManageProject.php'>" .$role."</a>";
                      ?>
                  </div>


              </div>
                      <hr style=" border-top: 1px dotted mediumpurple;">



              <?php
                  }
              ?>

    </div><!-- end of container //-->

</div>    <!--end of background //-->

<!--space from the  fixed footer-->
<br>
<br>
<br>
<br>

<?php
   require_once("footer.php");

?>
