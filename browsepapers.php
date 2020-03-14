<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
   require_once("includes/login_module.php");
   $pageTitle = "Manage Users";  
   require_once("classes/Conf.php");
   require_once("header.php");    
   

   
   

   $paper = new Paper();
   $submissions = '' ;
   $reviews = '';
   $archive = '';

   if ($_SESSION['myRole']=='admin' || $_SESSION['myRole']=='teamleader' )
   {
      $submissions = @$paper->getAllSubmitedPapers();
      $reviews = $paper->getAllPapersInReview();
      

   }
   if ($_SESSION['myRole']=='member' || $_SESSION['myRole']=='')
   {
      
      $submissions = $paper->SubmitedPapersByMember($_SESSION['myUserId']);
      $reviews = $paper->MemberAssignedPapersInReview($_SESSION['myUserId']);
      
      
   }

   $archive = $paper->ReviewedPapers();

   
   $totalSubmissions = @$submissions->num_rows;
   $totalPapersInReview = @$reviews->num_rows;
   $totalInArchive = $archive->num_rows;

    

?>
    

   

    


        <br/><br/>
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

                           echo "<strong>Welcome ".$_SESSION['myLastname'].' '.$_SESSION['myFirstname']."</strong>,<br>";
                           echo $userRole;
                    ?>
                </div>
                <div class="col-xs-12">
                    <h3 class="text-left price-headline" style="color:purple;">Browse Papers</h3>
                </div>

                
            </div>
                  
                  
            <br/>
            <div class="row">
               <div class='col-xs-12'>
                    <div>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><strong>Submissions (<?php echo $totalSubmissions; ?>)</strong></a></li>
                              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><strong>Reviews (<?php echo $totalPapersInReview; ?>)</strong></a></li>
                              <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><strong>Archives (<?php echo $totalInArchive; ?>)</strong></a></li>
                              
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="home">
                              <br/>
                                  <div class='row'>
                                      <div class='col-xs-4'>
                                          <strong><big>Project Group</big></strong>    
                                      </div>
                                      <div class='col-xs-4'>
                                          <strong><big>Title</big></strong>
                                      </div>
                                      <div class='col-xs-4'>
                                          <strong><big>File</big></strong>
                                      </div>
                                  </div>
                                  <hr>
                                  <?php

                                       
                                        foreach($submissions as $row)
                                        {
                                          $datesubmitted = new DateTime($row['datesubmitted']);
                                          $datesubmitted = $datesubmitted->format('l jS F, Y');
                                  ?>
                                      <div class='row'>
                                          <div class='col-xs-4'>
                                              <?php 
                                                  echo "<i class='fa fa-folder-o'></i> <a href='#'>".$row['name']."</a><br/>";
                                                  echo "<small>Submitted on ".$datesubmitted."</small>"
                                              ?>
                                          </div>
                                          <div class='col-xs-4'>
                                                <?php
                                                    echo "<i class='fa fa-file-o'></i> <a href='submited_paper_info.php?pid=".$row['id']."'>".$row['title']."</a>";

                                                ?>
                                          </div>
                                          <div class='col-xs-4'>
                                                <?php
                                                    echo "<i class='fa fa-paperclip'></i> <a href='uploads/".$row['file']."'>".$row['title']."</a>";

                                                  ?>
                                          </div>
                                      </div>
                                      <hr>
                                  <?php 

                                        }

                                  ?>





                              </div>
                              <div role="tabpanel" class="tab-pane" id="profile">
                              <!-- In Reviews //-->
                              <br/>
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
                                          <div class="col-xs-3">
                                                
                                                  <?php
                                                     echo "<strong><big>
                                                              <a href='reviewpaper.php?pid=".$res['id']."'>Review this Paper</a>
                                                           </big></strong>";
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



                              <!-- end of reviews //-->
                              </div>
                              <div role="tabpanel" class="tab-pane" id="messages">
                                <br/>
                                <?php
                                      foreach($archive as $row)
                                      {
                                        $photo = "";


                                        if ($row['photo']!='')
                                        {
                                          $photo = 'users photos/'.$row['photo'];
                                        }
                                        else{
                                          $photo = "users photos/avatar200.png";
                                        }
                                        $code1 = 'oDdpnVaWwgdsjhMFiyIeLjJjSUCThpJUxfUVwTGnNSGeMLToTq';
                                        $code2 = 'FoltjKlLKnBdPvQfPQi!oLU!lStPXzTyZomFgktMQluhRbCDHe';

                                ?>
                                    <div class='row'>
                                        <div class='col-xs-12'>
                                            <?php
                                                echo "<div ><strong><i class='fa fa-file-o'></i> <a href='submited_paper_info.php?pid=".$row['paperid']."'>".$row['title']."</a></strong><div style='padding-top:10px;'>".nl2br($row['comment'])."</div></div>";
                                                echo "<div><i class='fa fa-paperclip'></i> <a href='uploads/".$row['reviewedfile']."'>".$row['reviewedfile']."</a></div>";
                                                echo "<div style='text-align:right;background-color:#f1f1f1;'><a href='member.php?mp=".$code1.'-'.$row['memberid'].'-'.$code2."'>".$row['lastname'].' '.$row['firstname']."</a> <img class='img-circle' style='width:50px;height:50px;' src='".$photo."'><br/></div>"
                                             ?>


                                        </div>

                                    </div>
                                    <hr>

                                <?php
                                      }


                                ?>





                              </div>
                              
                            </div>

                          </div>
               </div><!-- end of col //-->
            </div><!-- end of row //-->
             
            
                          
    </div><!-- end of container //--> 

     
  

    

<?php
   require_once("footer.php");

?>
