<?php  
	session_start();

	if ($_SESSION['username'] && $_SESSION['level']) 
	{
		header("location:home.php");
	}
	else
	{
		header("location:login.php");
	}
?>