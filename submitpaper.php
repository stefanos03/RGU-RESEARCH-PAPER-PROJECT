<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("includes/login_module.php");
$pageTitle = "Assign User to Project";
require_once("classes/Config.php");
require_once("header.php");


$status='';
$title = '';
$description = '';
$projectid = '';




if (isset($_POST['submitForm']))
{
    $projectid = $_POST['project'];
    $title = $_POST['title'];
    $description = $_POST['description'];


    if ($projectid=='' || $title=='' || $description=='' || $_SESSION['fileUpload']=='')
    {
        $status='warning';
        $msg = "All fields are required to be filled before continuing.";
    }else
    {
        $dataArray = array("projectid"=>$projectid,"title"=>$title,"description"=>$description,"file"=>$_SESSION['uploadedFile'],"submitedby"=>$_SESSION['myUserId']);
        $paper = new Paper();
        $result = $paper->submitPaper($dataArray);
        $status = $result["status"];
        $msg = $result["msg"];
    }
}


if (isset($_POST['uploadFile']))
{
    $projectid = $_POST['project'];
    $title = $_POST['title'];
    $description = $_POST['description'];

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
            <h3 class="text-left price-headline" style="color:purple;">Paper Submission <small>(Upload a research paper)</small></h3>
        </div>


    </div>

    <!-- row 1 //-->
    <hr>

    <?php
    require_once("functions/Alert.php");

    ?>


    <form name="uploadpaper" action="submitpaper.php" method="post" enctype="multipart/form-data">

        <div class="form-group row">

            <label for="Project Name"  class="col-xs-12 col-sm-2 col-form-label text-right">Project</label>

            <div class="form-group col-xs-12 col-sm-5">
                <select class="form-control" name="project">
                    <option></option>

                    <?php
                    $project = new Project();
                    $result = $project->getAllProject();
                    foreach ($result as $row)
                    {
                        $id = $row['id'];
                        $name =  $row['name'];

                        $selected = '';
                        if ($projectid==$id)
                        {
                            $selected = 'selected';
                        }
                        ?>
                        <option <?php echo $selected; ?> value="<?php echo $id; ?>"><?php echo $name; ?></option>


                        <?php

                    }

                    ?>
                </select>
            </div>
        </div>

        <div class="form-group row">

            <label for="Project Name" class="col-xs-12 col-sm-2 col-form-label text-right">Title</label>

            <div class="col-xs-12 col-sm-10">

                <input class="form-control" type="text" name="title" value="<?php echo $title; ?>"/>
            </div>

        </div>
        <div class="form-group row">

            <label for="Project Short Name"  class="col-xs-12 col-sm-2 col-form-label text-right">Description</label>

            <div class="col-xs-12 col-sm-8">
                <textarea class="form-control" cols="80" rows="5" name="description"><?php echo $description; ?></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-3"></div>
            <div class="col-xs-9">
                <?php
                if (isset($_POST['uploadFile']))
                {
                    echo "<strong>";
                    require_once("uploadFile.php");
                    echo "</strong><br/><br/>";




                }
                ?>
            </div>
        </div>

        <div class="form-group row">

            <label for="Project Short Name"  class="col-xs-12 col-sm-2 col-form-label text-right">File</label>

            <div class="col-xs-7 col-sm-5">
                <input type="file" name="fileToUpload" >
                <input type="submit" name="uploadFile" value="Upload File" class="btn btn-default btn-sm">
            </div>

        </div>

        <div class="row" style="margin-top:10px;">

            <div class="col-xs-2 col-sm-2">&nbsp;</div>
            <div class="col-xs-10 col-sm-10">
                <input  class="btn btn-primary" type="submit" name="submitForm" value="Submit Paper"/>
            </div>
        </div>

    </form>

    <?php
    $paper = new Paper();
    $list = $paper->getAllSubmitedPapers();
    $totalPapers = $list->num_rows;
    ?>

    <br/><br/>
    <div class="row">
        <div class="col-xs-12">
            <h4 class="text-left price-headline" style="color:purple;font-weight:bold;">Submissions (<?php echo $totalPapers; ?>)</h4>
        </div>

    </div>
    <div class="row" >
        <div class="col-xs-4">
            <strong><big>Project</big></strong>
        </div>
        <div class="col-xs-3">
            <strong><big>Paper Title</big></strong>
        </div>
        <div class="col-x3-5">
            <strong><big>File</big></strong>
        </div>

    </div>
    <br/>
    <?php

    foreach($list as $row)
    {
        $datesubmitted = new DateTime($row['datesubmitted']);
        $datesubmitted = $datesubmitted->format('l jS F, Y');

        ?>
        <div class="row" >
            <div class="col-xs-4">
                <?php
                echo "<i class='fa fa-folder-o'></i> <a href='manageprojects.php'>".$row['name']."</a><br/>";
                echo "<small>Submitted on ".$datesubmitted."</small>";
                ?>
            </div>
            <div class="col-xs-3">
                <?php
                echo "<i class='fa fa-comment-o'></i> <a href='#'>".$row['title']."</a>";
                ?>
            </div>
            <div class="col-x3-5">
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
