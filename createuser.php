<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
   require_once("includes/login_module.php");
   $pageTitle = "Create User";  
   require_once("classes/Conf.php");
   require_once("header.php");    
   
   
   $status='';

   if (isset($_POST['submitForm']))
   {
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        

        if ($lastname=='' || $firstname=='' || $email=='' || $password=='' || $role=='')
        {
           $status='warning';
           $msg = "All fields are required to be filled before continuing.";
        }else
        {
            $user = new User();
            $result = $user->createuser($lastname,$firstname,$email,$password,$role);
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
                    <h3 class="text-left price-headline" style="color:purple;">Create User</h3>
                </div>

                
            </div>
                  
                  <!-- row 1 //-->
                  <hr>
             
            <?php
                  require_once("functions/Alert.php");

            ?>
           

             <form name="create_user" action="createuser.php" method="post">     
              <div class="form-group row">
            
                   <label for="Project Name" class="col-xs-12 col-sm-2 col-form-label text-right">Last Name</label>
                      
                    <div class="col-xs-12 col-sm-5">
                        
                            <input class="form-control" type="text" name="lastname"/>                     
                    </div> 

              </div>
              <div class="form-group row">
                  
                  <label for="Project Short Name"  class="col-xs-12 col-sm-2 col-form-label text-right">First Name</label>
                  
                  <div class="col-xs-12 col-sm-5">
                      <input class="form-control" type="text" name="firstname"/>
                  </div>
              </div>
              <div class="form-group row">
                  
                  <label for="Project Short Name"  class="col-xs-12 col-sm-2 col-form-label text-right">Email</label>
                  
                  <div class="col-xs-12 col-sm-5">
                      <input class="form-control" type="text" name="email"/>
                  </div>
              </div>
              <div class="form-group row">
                  
                  <label for="Project Short Name"  class="col-xs-12 col-sm-2 col-form-label text-right">Password</label>
                  
                  <div class="col-xs-12 col-sm-5">
                      <input class="form-control" type="text" name="password"/>
                  </div>
              </div>

              <div class="form-group row">
                  
                  <label for="Project Short Name"  class="col-xs-12 col-sm-2 col-form-label text-right">Role</label>
                  
                  <div class="form-group col-xs-12 col-sm-5">
                      <select class="form-control" name="role"/>
                            <option></option>
                            <option>Team Leader</option>
                            <option value='member'>Student</option>    
                      </div>
                  </div>
              </div>
              <div class="row">
              </div>
              
              <div class="form-group row" style="margin-top:10px;">
                  <div class="col-xs-12 col-sm-2"></div>
                  <br/>
                  <div class="col-xs-12 col-sm-10">
                      <input  class="btn btn-primary" type="submit" name="submitForm" value="Create"/>
                  </div>
              </div>
              </form>
                          
    </div><!-- end of container //--> 

     
  

    

<?php
   require_once("footer.php");

?>
