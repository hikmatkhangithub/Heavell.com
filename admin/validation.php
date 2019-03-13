<?php
include("../dashboard/connection.php");
$uname		=	$_POST["userName"];
$pwd		=	md5($_POST["password"]);
// Check the empty validation then send back with error variable via GET method. 
$error="";
if($uname=="" || $pwd=="") {
		
		header("location: index.php?error=2");
		$error.="Please fill all the required fields. <br> ";
	die();
} 


  else {
	$sqlLogin="SELECT * FROM admin WHERE username='$uname' and password='$pwd'";
	$result = mysqli_query($connection,$sqlLogin) or die(mysqli_error());
	while($row=mysqli_fetch_assoc($result)) {
		$_SESSION["adminuser"]=$row['username']; // Add username in session variable. 
		$_SESSION["adminuserid"]=$row['password']; // Add id in session variable 
		header("location: ../dashboard/backEnd1.php"); // redirect to dashboard
		die();
	}
	$message = "Please check username and password. It does not exist.";
	header("location: index.php?error=1");
	echo"There is something Wrong with your email and password please try again!!";

	 // if user and password didn't amtch send back to index with varibale via GET method. 
	die();
}
?>