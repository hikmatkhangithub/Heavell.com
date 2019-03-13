<?php
include("dashboard/connection.php");
if(isset($_SESSION["frontEndUser"])) {
$id=$_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$qty = $_POST["qty"];
$size = $_POST["size"];
$image=$_POST["image"];

$_SESSION["cart"][]=array("id"=>$id,"name"=>$name,"price"=>$price,"qty"=>$qty,"size"=>$size, "image"=>$image);
header("location: cart.php");
}
else
{			
   	
	$id=$_POST["id"];
	$name = $_POST["name"];
	$price = $_POST["price"];
	$qty = $_POST["qty"];
	$size = $_POST["size"];
	$image=$_POST["image"];

	$_SESSION["cart"][]=array("id"=>$id,"name"=>$name,"price"=>$price,"qty"=>$qty,"size"=>$size, "image"=>$image);
   header("location: frontEndLogin.php");
              }

?>

