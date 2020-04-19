<?php
require_once("myPhpFunctionalities/Config.php");

if (!isset($_GET['id']) || $_GET['id']=='')
{
    header("location:assign_reviewer1.php");
}

$paperid = $_GET['id'];

$paper = new Paper();
$paper> deletePaper($paperid);
header("location:assign_reviewer1.php");

?>