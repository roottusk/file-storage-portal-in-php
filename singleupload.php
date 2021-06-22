<?php session_start();
$log="";

require("var.php");
$savePath="\uploads\ ";







$finfo = finfo_open(FILEINFO_MIME_TYPE);
$path_info = pathinfo($_FILES['userfile']['name']);




$infofile=mysqli_real_escape_string($conn, $infofile);







function addtoDB($name,$path)
{
//echo "Function is called<br>";
$conn=$GLOBALS["conn"];

$url=$YOUR_WEBSITE_URL.$path;


$query="INSERT INTO files values('','$name','$url')";

if(mysqli_query($conn,$query)) 
{
$GLOBALS["log"]=$GLOBALS["log"]."<br>".$name." added to DB<br>";
//echo $name." added to DB<br>";

}
else
{
$GLOBALS["log"]=$GLOBALS["log"]."<br> $name not added to DB.<br>";
//echo $conn->errno();
}
	
}









if ($_SESSION["pass"]=="admin@123")
{
    //echo __DIR__;
    //echo "Session is right";
$target=$savePath.$_FILES['userfile']['name'];
$name=$_FILES['userfile']['name'];
                        
			if(move_uploaded_file($_FILES['userfile']['tmp_name'],__DIR__.$target))
			{
			    //echo "file uploaded";
				addtoDB($name,$target);
			}

}
else
{
	header('Location:index2.php?loggedin=not');
}
echo "<script>window.top.location='https://localhost/upload.php?uploaded=1'</script>";


?>