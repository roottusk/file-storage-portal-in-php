<?php
session_start();

$message="";
if(!empty($_POST["login"])) {
	

	if($_POST["user_name"]=="admin" && $_POST["password"]=="admin@123") {
	    
	$_SESSION["pass"] = $_POST["password"];
	echo "Logged in";
	echo $_SESSION["pass"];
	
	echo "<script>window.top.location='https://shantanu123.000webhostapp.com/'</script>";
	} else {
	$message = "<h1><center>Invalid Username or Password!</center></h1>";
	echo $message;
	}
}

 
else { 
//echo "In else part";







if($_SESSION["pass"]=="admin@123")
{
//echo $_SESSION['pass'];
	
?>
<form action="check.php" method="post" id="frmLogout">
<div class="member-dashboard">Welcome <?php echo "Admin"; ?>, You have successfully logged in!<br>
Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div>
</form>
</div>
</div>
<?php }
else{
   
	echo "No session found!!";
	//echo $_SESSION["pass"];
}

}

 ?>


<?php
if(!empty($_POST["logout"])) {
	$_SESSION["pass"] = "";
	
	header('Location:index.php');
}
?>
