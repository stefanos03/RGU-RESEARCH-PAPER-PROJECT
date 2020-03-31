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

                           echo "<strong>Welcome ".$_SESSION['myLastname'].' '.$_SESSION['myFirstname']."</strong>,<br>";
                           echo $userRole;
                    ?>
                </div>
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="text-center price-headline " style="color:purple;">Assign User to Project</h3>
                </div>
            </div>
                  <hr>
             <form name="assign_user_toproject" action="assignuser.php" method="post" style="border: 4px solid purple;padding: 100px; margin-right: 30px; background: wheat">
              <div class="form-group row">
                  <label for="Project Short Name"  class="col-xs-12 col-sm-2 col-form-label text-center" style="border: 2px solid purple; padding:3px; margin-right: 10px">Project</label>
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
                  
                  <label for="Project Short Name"  class="col-xs-12 col-sm-2 col-form-label text-center " style="border: 2px solid purple; padding: 3px; margin-right: 10px">User</label>
                  
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
                $ProjectUsers = $list->num_rows;
              ?>

              <br/><br/>
              <div class="row" style="border: solid 3px purple">
                  <div class="col-xs-12">
                    <h4 class="text-center price-headline" style="color:purple;">Assigned  User to Project (<?php echo $ProjectUsers; ?>)</h4>
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
              <div class="row" style="text-decoration:purple underline; color: purple" >
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

<!--space from the  fixed footer-->
<br>
<br>
<br>


<?php
   require_once("footer.php");

?>
