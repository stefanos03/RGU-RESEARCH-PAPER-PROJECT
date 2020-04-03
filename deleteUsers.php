<?php
require_once("classes/Config.php");

if (!isset($_GET['id']) || $_GET['id']=='')
{
    header("location:createAndManageUser.php");
}

$memberid = $_GET['id'];

$Members = new Member();
$Members->deleteUser($memberid);
header("location:createAndManageUser.php");

?>