<?php
//  error_reporting(E_ALL);
//ini_set('display_errors', 1);
//
//session_start();
//session_destroy();
$pageTitle = "Home";
require_once("classes/Conf.php");


require_once("header.php");








?>
<header>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:purple;color:white;">
    <img src="images/logop.png" alt="logo" width="70" height="70">
    <strong>RGU Research Paper Project</strong>

    <!--Logo and title ends-->





    <div id="nav-menu" class="collapse navbar-collapse navbar-right"  style="margin-top: 15px; margin-right: 110px">

        <a href="index.php" class=" w3-button w3-hover-purple w3-display-right" style="color: white; margin-top: 200px" > <strong>Go Back</strong></a>

    </div>
    </nav>
</header>

    <section id="header">
      <div class="container">

        <div class="row">

            <div class="col-sm-3">
                <br/><br/>
                <h2>Quick Links</h2>
                <br/>
            <!-- Login form //-->

               <a href="#introduction">Introduction</a><br/>
               <a href="#project_constraints">Project Constraints</a><br/>
               <a href="#functionals">Functional Requirements</a><br/>
               <a href="#non-functionals">Non-Functional Requirements</a><br/>
               <a href="#workflow">Workflow</a><br/>



            </div>


            <div class="col-xs-12 col-sm-9 hidden-xs">
                <br/>
                <h1>Welcome to PreshApp<br/><small>Project Research Sharing App</small></h1>

                <img src="images/logop.png" style='width:250px;'/>

                <br/><br/>
                <h2><a name="introduction">Introduction</a></h2>
                This project is the design, development and implementation of a web application that will facilitate the upload, identification, review, monitoring and tracking of research papers among group members. Research activities; report writing, review, editing and other associated task can be daunting particularly with the need to monitor and track the editorial progress of a number of papers within a limited span of time.
                <br/><br/>
                This project in a bid to address the challenges faced in research editorial cycle will provide an opportunity for the creation of a platform that will support project teams in storing, uploading, assigning and reviewing research papers amongst groups members in a project.
                <br/><br/>
                The users of the system will be categorized into three classes, namely: Administrator, Student Team Leader and Students. All users will be registered members of the application i.e. members will be required to log in to perform designated operations. The administrator has the  highest privileged role to manage the resources (projects, users and papers) on the platform.

                <br/><br/>
                He (administrator) only has the right to create users, setup project groups, allocate team leader role and assign members to the project. The student team leader is responsible for allocating papers to members for review, keeping tab on review period and making document opened to all members after review. Students can upload papers that have been identified worthy of review, which will be submitted to the Student team leader, who will allocate it to any member(s) for review. The group member can only view and access the paper that has been allocated to he/her until the review process is completed, after which the paper and review are accessible to every member in the group.

                <br/><br/>
                <h2><a name="project_constraints">Project Constraints</a></h2>
                <ol>
                    <li>The web application must be hosted on a server with up-to-date code stored in Github
                          <ol type='a'>
                              <li>The application will be hosted on a remote server accessible to the course facilitator/marker and other interested parties for use in the University.</li>
                              <li> All codes will be made available on github at github.com/onwukaok</li>

                          </ol>
                      </li>
                      <li>The application must contain both front end (client side) and (server side) code.
                          <ol type='a'>
                              <li>The front-end is the presentation layer that the user interacts with to perform tasks on the platform. The front-end is the user-friendly GUI (Graphical User Interface) built to give the user a smooth, intuitive and seamless interaction with the application. It is built using HTML, CSS and Bootstrap.</li>
                              <li>The back-end is the logic and data layer. It executes user's requests, by performing query based on the request and return response to the user on the front-end.</li>

                          </ol>
                        </li>
                        <li>The created web application must contain the following features
                            <ol type='a'>
                                <li>A login system
                                    <ol type='i'>
                                        <li>This is a security mechanism to restrict application access to authorized users. This will be created using HTML 5 forms, CSS and Bootstrap on the front-end and PHP/MySQL on the backend.</li>
                                    </ol>

                                </li>
                                <li>More than one user role
                                    <ol type='i'>
                                        <li>This is an identity management and authorization measure to. The application will be able to support users with different roles assigned vary degrees of permissions and privileges in  what a user is capable of doing. However, no one user can have one role at a time.</li>
                                    </ol>
                                </li>
                                <li>Some  type of file upload system; and
                                    <ol type='i'>
                                        <li>
                                            This will facilitate the uploading of research papers on the server for storing and download at request. This will be implemented using HTML 5 file upload facility on the front-end and PHP for executing upload to remote server on the backend.
                                        </li>
                                    </ol>
                                </li>
                                <li>A system for user to input data that is stored and then recalled from a database.
                                    <ol type='i'>
                                        <li>The system will support data storage (documents in editable format) and retrieval using PHP as the application engine and MySQL as the database server.</li>
                                    </ol>
                                </li>
                            </ol>
                        </li>

                 </ol>

                 <br/><br/>
                <h2><a name="functional">System Requirements Specifications <br/>(Functional Requirements)</a></h2>
                These requirements help clearly define the set of functions the application will perform.<br/>

                <img src="images/functional.jpg">



                <br/><br/>
                <h2><a name="non-functional">(Non-Functional Requirements)</a></h2>
                <img src="images/non-functional.jpg">


                <br/><br/>
                <h2><a name="workflow">WorkFlow</a></h2>
                <img src="images/workflow.jpg">
            </div>


        </div>
      </div><!-- container //-->
    </section>





<?php
   require_once("footer.php");
?>
<script type="text/javascript" src="js/datetimelibrary.js"></script>
<script type="text/javascript" src="js/newsletter.js"></script>