<?php
require_once("classes/Conf.php");

if (!isset($_GET['id']) || $_GET['id']=='')
{
	header("location:manageprojects.php");
}

$projectid = $_GET['id'];

$project = new Project();
$project->deleteProject($projectid);
header("location:manageprojects.php");

?>