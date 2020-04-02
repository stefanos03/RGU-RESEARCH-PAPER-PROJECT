<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
   require_once("includes/login_module.php");
   $pageTitle = "Assign User to Project";  
   require_once("classes/Config.php");
   require_once("header.php");    
   
   
   $status='';


   

                $paper = new Paper();
                $list = $paper->getAllSubmitedPapers();
                $totalPapers = $list->num_rows;
    

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
                    <h3 class="text-left price-headline" style="color:purple;">Paper Submissions (<?php echo $totalPapers; ?>)</h3>
                </div>

                
            </div>
                  
                  <!-- row 1 //-->
                  <hr>
           
          

              

              
              <div class="row" >
                  <div class="col-xs-4">
                        <strong><big>Project</big></strong>
                  </div>
                  <div class="col-xs-4">
                        <strong><big>Paper Title</big></strong>
                  </div>
                  <div class="col-xs-4">
                      <strong><big>File</big></strong>
                  </div>

              </div>
              <br/>
              <?php
                  
                  foreach($list as $row)
                  {
                    $datesubmitted = new DateTime($row['datesubmitted']);
                    $datesubmitted = $datesubmitted->format('l jS F, Y');

                    $assign = '';
                    if ($row['status']=='s' || $row['status']=='r')
                    {
                       $assign="<a href='assign_reviewer.php?pid=".$row['id']."'><strong>Assign reviewer</strong></a>";
                    }
                    
              ?>
              <div class="row" >
                  <div class="col-xs-4">
                        <?php 
                            echo "<i class='fa fa-folder-o'></i> <a href='createAndManageProject.php'>" .$row['name']."</a><br/>";
                            echo "<small>Submitted on ".$datesubmitted."</small>";
                        ?>
                  </div>
                  <div class="col-xs-4">
                        <?php  
                            echo "<i class='fa fa-comment-o'></i> <a href='#'>".$row['title']."</a><br/>".$assign;
                        ?>
                  </div>
                  <div class="col-xs-4">
                      <?php
                            echo "<i class='fa fa-file-o'></i> <a target='_blank' href='uploads/".$row['file']."'>".$row['file']."</a>";              
                      ?>
                  </div>

              </div>
              <hr>



              <?php
                  }
              ?>
                          
    </div><!-- end of container //--> 

     
  

    

<?php
   require_once("footer.php");

?>
