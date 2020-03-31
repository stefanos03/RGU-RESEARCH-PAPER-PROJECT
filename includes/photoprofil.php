<?php

    $ProfilPic = "";
    if ($_SESSION["myPhoto"]!="")
    {
    	$ProfilPic = $_SESSION["myPhoto"];
    }
    else
    {
    	$ProfilPic = "photoprofil.png";
    }

    $ProfilPic = "users photos/".$ProfilPic;

?>