<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);
   require_once("includes/login_module.php");
   $pageTitle = "Assign User to Project";  
   require_once("classes/Config.php");
   require_once("header.php");    
   
   
   $status='';   

   $paper = new Paper();
   $reviews = $paper->getAllPapersInReview();
   $numInReview = $reviews->num_rows;


   

    

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
                    <h3 class="text-left price-headline" style="color:purple;">Papers in Review (<?php echo $numInReview;  ?>)</h3>
                </div>                
              </div>
              
              <hr>     


              
              <div class="row">
                        <div class="col-xs-4">
                              <strong><big>Project Group</big></strong>
                        </div>
                        <div class="col-xs-5">
                                <strong><big>Paper</big></strong>
                        </div>
              </div>
              
              <br/>   
              

              <?php
                    foreach($reviews as $res)
                    {

                        $paperid = $res['id'];

              ?>
                    <div class="row">
                        <div class="col-xs-4">
                              <i class='fa fa-folder-o'></i>
                              <?php echo "<a href='projects.php'>".$res['name']."</a>";  ?>

                        </div>
                        <div class="col-xs-5">
                                <i class='fa fa-file-o'></i>
                                <?php echo "<a href='submited_paper_info.php?pid=".$res['id']."'>".$res['title']."</a>";
                                ?>
                        </div>
                        <div class="col-xs-12">
                                  <h5><strong>Assigned Reviewers</strong></h5>
                                  <ol>
                                      <?php
                                          $selReviewers = $paper->getReviewersToPaper($paperid);

                                          foreach($selReviewers as $row)
                                          {
                                              $dateassigned = new DateTime($row['dateassigned']);
                                              $dateassigned = $dateassigned->format('l jS F, Y');
                                              echo "<li>".$row['lastname'].' '.$row['firstname']."  - <small>assigned on ".$dateassigned." &nbsp;&nbsp;&nbsp;<strong>(Duration: ".$row['duration']." days)</strong></small></li>";

                                          }

                                    ?>
                                  </ol>

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
