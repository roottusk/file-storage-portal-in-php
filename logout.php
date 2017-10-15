<?php session_start();
if(!empty($_GET["logout"])) {
	$_SESSION["pass"] = "";
	header('Location:index.php');
	
}
?>