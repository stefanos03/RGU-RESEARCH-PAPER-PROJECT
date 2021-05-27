<?php

if (!isset($_GET['pid']) || $_GET['pid']=='')
{
    header("location: SubmitPaperLeader.php");
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("LoginRequirement/Login_Request.php");
$pageTitle = "Assign User to Project";
require_once("myPhpFunctionalities/Configuration.php");
require_once("header.php");


$messagestatus='';

$paperid = $_GET['pid'];
$pageLink = "assign_reviewer1.php?pid=".$paperid;
$paper = new Paper();
$paperInfo  = $paper->getPaperById($paperid);


foreach($paperInfo as $result)
{
    $paperTitle = $result["title"];
    $paperProject = $result['name'];
    $paperDesc = $result['description'];
    $paperFile = $result['file'];
    $paperUserId = $result['userid'];
    $paperSubmitedby = $result['lastname'].' '.$result['firstname'];
    $paperDate = new DateTime($result['datesubmitted']);
    $paperDate = $paperDate->format('l jS F, Y');
}




if (isset($_POST['submitForm']))
{
    $userid = $_POST['user'];
    $duration = $_POST['duration'];


    if ($paperid=='' || $userid=='' || $duration=='' )
    {
        $messagestatus='warning';
        $msg = "All fields are required to be filled before continuing.";
    }else
    {
        $dataArray = array("paperid"=>$paperid,"userid"=>$userid,"duration"=>$duration);
        $paper = new Paper();
        $result = $paper->AssignReviewer($dataArray);
        $messagestatus = $result["status"];
        $msg = $result["msg"];
    }
}



?>
<br/>
<div style="background-image: url('images/background6.jpeg')">
    <?php
    $User_roles = '';
    if ($_SESSION['myRole']=='admin')
    {
        $User_roles = 'Administrator';
    }
    else if ($_SESSION['myRole']=='teamleader')
    {
        $User_roles = 'Team Leader';

    }else if ($_SESSION['myRole']=='member' || $_SESSION['myRole']=='')
    {
        $User_roles = 'Member';
    }

    echo "<strong style='margin-left: 800px; font-size: 40px; color: purple '>Welcome ".$User_roles."</strong>";
    echo "<h4 style='margin-left: 600px; font-size: 40px; color: purple '>Information About the Papers & Projects</h4>";
    ?>
<div class="container" style="border: solid 5px mediumpurple; background: purple; padding: 10px; color: white">
    <div class="col-xs-12 text-right">

    </div>

    <div class="row">
        <div class="col-xs-12">
            <h3 class="text-center price-headline" style="color:white;">Paper Detailed Information </h3>
        </div>


    </div>

    <hr>



    <div class="row">
        <div class="col-xs-12">
            <h4 class="text-center price-headline" style="color:white;font-weight:bold;">Paper Details</h4>
        </div>

    </div>
    <br/>
    <div class="row" >
        <div class="col-xs-12">
            <strong>Project Group</strong>
            <?php
            echo "<br/><i class='fa fa-folder-o'></i> <a href='#' style='color: white'>".$paperProject."</a><br/></br>";

            ?>
        </div>

        <div class="col-xs-12">
            <strong>Paper Title</strong>
            <?php
            echo "<br/><i class='fa fa-file-o'></i> <a href='#' style='color: white'>".$paperTitle."</a><br/><br/>";

            ?>
        </div>
        <div class="col-xs-12" style="color: white">
            <strong>Description</strong>
            <?php
            echo "<br/><i class='fa fa-comment-o'></i> ".$paperDesc."<br/><br/>";
            ?>
        </div>
        <div class="col-xs-12">
            <Strong>File</Strong>
            <?php
            echo "<br/><i class='fa fa-file-o'></i> <a style='color: white' target='_blank' href='uploads/".$paperFile."'>".$paperFile."</a><br/><br/>";
            ?>
        </div>

        <div class="col-xs-12">
            <Strong>Submitted By</Strong>
            <?php
            $code1= "oDdpnVaWwgdsjhMFiyIeLjJjSUCThpJUxfUVwTGnNSGeMLToTq";
            $code2 = "FoltjKlLKnBdPvQfPQi!oLU!lStPXzTyZomFgktMQluhRbCDHe";
            echo "<br/><i class='fa fa-user-o'></i> <a style='color: white' href='#".$code1.'-'.$paperUserId.'-'.$code2."'>".$paperSubmitedby."</a><br/><br/>";
            ?>
        </div>

        <div class="col-xs-12">
            <Strong>Date Submitted</Strong>
            <?php
            echo "<br/><i class='fa fa-calendar-o'></i> ".$paperDate."</a>";
            ?>
        </div>


    </div>

    <hr>

    <div class="row" style="color: white">
        <div class="col-xs-12">
            <h4 class="text-left price-headline" style="color:white;font-weight:bold;">Assigned Reviewers</h4>
        </div>
        <ol>
            <?php
            $selReviewers = $paper->getReviewersToPaper($paperid);

            foreach($selReviewers as $row)
            {
                $removeAssign = '';
                if ($_SESSION['myRole']=='teamleader')
                {
                    $removeAssign = "<a href='#' style='color: white'>Remove</a>";
                }
                $dateassigned = new DateTime($row['dateassigned']);
                $dateassigned = $dateassigned->format('l jS F, Y');
                echo "<li><a style='color: white'  href='#".$code1.'-'.$row['userid'].'-'.$code2."'>".$row['lastname'].' '.$row['firstname']."</a>  - <small>assigned on ".$dateassigned." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$removeAssign."</small></li>";


            }

            ?>

    </div>

    <hr style=" border-top: 1px dotted white;">




</div><!-- end of container //-->

    <hr style=" border-top: 1px solid purple;">
<!--Manage Project starts -->
    <div class="container" style="border: solid 3px purple; padding: 30px; background: purple; color: white">
        <h3 class="text-left price-headline container-fixed-top" style="color:white; margin-left: 500px;">All The  Project</h3>
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
            $deleteUrl = "<a href='deleteProject.php?id=".$id."'style='color: white'></a>";


            ?>
            <div class="row">
                <div class="col-xs-12">
                    <?php
                    echo "<strong style='color: white'><i class='fa fa-folder-open' style='color: white'></i> ".$name."</strong>";

                    ?>
                </div>
            </div>
            <hr style=" border-top: 1px dotted white;">

            <?php

        }
        ?>

    </div>
    <br>
    <br>
    <br>
    <br>
</div><!--end of background-->





<?php
require_once("footer.php");

?>
