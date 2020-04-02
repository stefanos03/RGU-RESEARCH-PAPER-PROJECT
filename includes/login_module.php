<?php

if (session_start()!=1)
{
	session_start(); 
	//echo "Just Set";
}
else
{
	//echo "Already set";
}

if (!isset($_SESSION['memberLogin']) && ($_SESSION['memberLogin']!='stefanos2021'))
{
	header("location:index.php");	
}

//$profile = new Member();



?>