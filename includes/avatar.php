<?php

    $ProfilPic = "";
    if ($_SESSION["myPhoto"]!="")
    {
    	$ProfilPic = $_SESSION["myPhoto"];
    }
    else
    {
    	$ProfilPic = "avatar200.png";
    }

    $ProfilPic = "users photos/".$ProfilPic;

?>