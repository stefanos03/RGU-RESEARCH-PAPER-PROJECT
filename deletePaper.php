<?php
require_once("classes/Config.php");

if (!isset($_GET['id']) || $_GET['id']=='')
{
    header("location:assign_reviewer.php");
}

$paperid = $_GET['id'];

$paper = new Paper();
$paper> deletePaper($paperid);
header("location:assign_reviewer.php");

?>