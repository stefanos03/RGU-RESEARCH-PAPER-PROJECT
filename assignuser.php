<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
   require_once("includes/login_module.php");
   $pageTitle = "Assign User to Project";  
   require_once("classes/Conf.php");
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

                           echo "<strong style='margin-right: 350px; font-size: 40px; color: purple '>Welcome ".$userRole."</strong>,<br>";

                    ?>
                </div>
            <br>
            <br>
            <br>
             <form name="assign_user_toproject" action="assignuser.php" method="post" style="border: 4px solid purple;padding: 100px; margin-right: 30px; background: wheat">
                 <h3 class="text-center price-headline " style="color:purple;">Assign User to Project</h3>
                 <br> <br>
              <div class="form-group row">
                  <label for="Project Short Name"  class="col-xs-12 col-sm-2 col-form-label text-center" style="border: 2px solid purple; padding:3px; margin-right: 10px;color: purple">Project</label>
                  <div class="form-group col-xs-12 col-sm-5">
                      <select class="form-control" name="project" style="margin-left: 150px">
                            <option></option>

                            <?php
                              $project = new Project();
                              $result = $project->getAllProject();
                              foreach ($result as $row)
                              {
                                $id = $row['id'];
                                $name =  $row['name'];
                            ?>
                            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                            <?php

                              }

                            ?>   
                      </select>
                  </div>
              </div>


              <div class="form-group row">
                  
                  <label for="Project Short Name"  class="col-xs-12 col-sm-2 col-form-label text-center " style="border: 2px solid purple; padding: 3px; margin-right: 10px; color: purple">User</label>
                  
                  <div class="form-group col-xs-12 col-sm-5">
                      <select class="form-control" name="user" style="margin-left: 150px">
                            <option></option>

                            <?php



                              $project = new User();
                              $result = $project->getAllUsers();
                              foreach ($result as $row) {
                                  $id = $row['id'];
                                  $name = $row['lastname'] . ' ' . $row['firstname'];



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
                      <input  class="btn btn-primary " type="submit" name="submitForm" value="Create" style="margin-left: 500px; background: purple"/>
                  </div>
              </div>
              </form>

              <?php
                $project = new Project();
                $list = $project->getAllProjectsUsers();
                $NumberProjectUsers = $list->num_rows;
              ?>

              <br/><br/>
              <div class="row" style="border: solid 3px purple;  margin-right: 30px; margin-left: 2px">
                  <div class="col-xs-12">
                    <h4 class="text-center " style="color:purple;"> <strong>Assigned  User to Project </strong>(<?php echo $NumberProjectUsers; ?>)</h4>
                </div>

              </div>
              <br/>
              <?php
                  
                  foreach($list as $row)
                  {

                    $role = $row['role'];
                    if ($role=='')
                    {
                      $role= "Member";
                    }
              ?>
              <div class="row" style="text-decoration:underline; margin-left: 150px" >
                  <div class="col-xs-4">
                        <?php echo "<i class='fa fa-folder-open'></i> <a href='manageprojects.php'>".$row['name']."</a>"; ?>
                  </div>

                  <div class="col-xs-3">
                        <?php  
                          echo "<i class='fa fa-user'></i> <a href='#'>".$row['lastname'].' '.$row['firstname']."</a>";
                        ?>
                  </div>
                  <div class="col-x3-5">
                      <?php
                          echo "<i class='fa fa-users'></i> <a href='#'>".$role."</a>";
                      ?>
                  </div>

              </div>
              <hr>



              <?php
                  }
              ?>
                          
    </div><!-- end of container //-->
</div>    <!--end of background //-->

<!--space from the  fixed footer-->
<br>
<br>


<?php
   require_once("footer.php");

?>
