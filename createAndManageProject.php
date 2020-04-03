
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
   require_once("includes/login_module.php");
   $pageTitle = "Create Project";  
   require_once("classes/Config.php");
   require_once("header.php");    
   //require_once("adminheader.php");


   
   $status='';

   if (isset($_POST['submitForm']))
   {
        $longname = $_POST['longname'];
        $shortname = $_POST['shortname'];

        if ($longname=='' || $shortname=='')
        {
           $status='warning';
           $msg = "All fields are required to be filled before continuing.";
        }else
        {
            $project = new Project();
            $result = $project->createproject($longname,$shortname);
            $status = $result["status"];
            $msg = $result["msg"];
        }
   }

    

?>


        <br/>
<div style="background-image: url('images/background.jpeg')">
        <div class="container">

            <div class="row">
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
                           echo "<h4 style='margin-right: 350px; font-size: 40px; color: purple '>Create & Manage Project</h4>";
                    ?>
                </div>

                <div class="col-xs-12" >

                </div>

                
            </div>

             
            <?php
                  require_once("functions/Alert.php");

            ?>
           

             <form name="create_project" action="createAndManageProject.php" method="post" style="border: solid 3px purple;padding: 10px; background: purple; margin-left: -15px; margin-right: -15px">
                 <h3 class="text-left price-headline" style="color:white; margin-left: 500px; margin-bottom: 40px">Create Project</h3>
              <div class="form-group row" style="margin-left: 200px">
            
                   <label for="Project Name" class="col-xs-12 col-sm-2 col-form-label text-right" style="color: white">Project Name</label>
                      
                    <div class="col-xs-12 col-sm-5">
                        
                            <input class="form-control" type="text" name="longname"/>
                    </div> 

              </div>
              <div class="form-group row" style="margin-left: 200px">
                  
                  <label for="Project Short Name"  class="col-xs-12 col-sm-2 col-form-label text-right" style="color: white">Project Short Name</label>
                  
                  <div class="col-xs-12 col-sm-5">
                      <input class="form-control" type="text" name="shortname"/>
                  </div>
              </div>

              <div class="form-group row">
                  <div class="col-xs-12 col-sm-2"></div>

                  <div class="col-xs-12 col-sm-10" style="margin-left: 700px" >
                      <input  class="btn btn-primary" type="submit" name="submitForm" value="Create" style="color: purple; background: white"/>
                  </div>
              </div>
              </form>
                          
    </div><!-- end of container //-->

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("includes/login_module.php");
$pageTitle = "Manage Project";
require_once("classes/Config.php");
require_once("header.php");

?>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("includes/login_module.php");

require_once("classes/Config.php");
require_once("header.php");

?>

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


<?php
require_once("functions/Alert.php");

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


        ?>
    </div>

    <div class="row">
        <div class="col-xs-12">

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
            $deleteUrl = "<a href='deleteProject.php?id=".$id."'style='color: white'>Delete</a>";


            ?>
            <div class="row">
                <div class="col-xs-12">
                    <?php
                    echo "<strong style='color: white'><i class='fa fa-folder-open' style='color: white'></i> ".$name."</strong>
                                <br/><small> <i  class='fa fa-trash' style='color: white'></i> ".$deleteUrl."</small>";
                    ?>
                </div>
            </div>
            <hr style=" border-top: 1px dotted white;">

            <?php

        }
        ?>

    </div>
</div><!-- end of container //-->







 <br>
 <br>
 <br>
</div><!--Background image-->

 <?php
 require_once("footer.php");

