<?php
include("dashboard/connection.php");
$uname		=	$_POST["userName"];
$pwd		=	md5($_POST["password"]);
// Check the empty validation then send back with error variable via GET method. 
if($uname=="" || $pwd=="") {

	header("location: frontEndLogin.php?error=Username or Password Empty");

	die();
} else {
	$sqlLogin="SELECT * FROM customer WHERE username='$uname' and password='$pwd'";
	$result = mysqli_query($connection,$sqlLogin) or die(mysqli_error());
	while($row=mysqli_fetch_assoc($result)) {

		$_SESSION["frontEndUser"]=$row['username']; // Add username in session variable. 
		$_SESSION["fronEndUserId"]=$row['id']; // Add id in session variable 
		header("location: cart.php"); // redirect to dashboard
		die();
	}
	header("location: frontEndLogin.php?error=Password or Username Mismatch"); // if user and password didn't amtch send back to index with varibale via GET method. 
	die();
}
?>