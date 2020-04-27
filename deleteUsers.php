<?php
require_once("myPhpFunctionalities/Configuration.php");

if (!isset($_GET['id']) || $_GET['id']=='')
{
    header("location:createAndManageUser.php");
}
//test
$memberid = $_GET['id'];

$Members = new Member();
$Members->deleteUser($memberid);
header("location:createAndManageUser.php");

?>

