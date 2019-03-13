<?php 
 include("dashboard/connection.php");
 ?>
<html lang="en">
	<head>
		<title>Heavell.com</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<meta name="keywords" content="Mini & Pricing Tables Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<!-- Gumby CSS  -->
		<link rel="stylesheet" href="gumby/css/gumby.css">
		<!-- Gumby uses Moderniser JS -->
		<script src="gumby/js/libs/modernizr-2.6.2.min.js"></script>

		<link rel="stylesheet" href="css/owl.carousel.css" />

		<!--start of css and js link for full page image slider-->
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
		<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
		<!--end  of css and js link for full page image slider-->


		<!-- Application custom CSS -->
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<!--Script for drop down menu-->

		<!--Script for drop down menu-->


	</head>
	<body>
	<div id="nav1" class="navbar">
<div class="row">
<a class="toggle" gumby-trigger="#nav1 > .row > ul" href="#"><i class="icon-menu"></i></a>
<h1 class="two columns logo"><a href="index.php"><img src="images/logo.png" alt="design studio" gumby-retina=""></a></h1>
            <ul class="ten columns">
    <li><a href="index.php">Home</a></li>
    <li>
      <a href="index.php">Shop Now</a>
      <div class="dropdown">
							<ul>
								<li><a href="mens.php">Shop Mens</a></li>
								<li><a href="womens.php">Shop Womens</a></li>
							</ul>
						</div>
     </li>
     
     
     
   
		<?php
     if(!isset($_SESSION["frontEndUser"]) && !isset($_SESSION["tradersName"])){
     echo"
     <li><a href='tradersLogin.php'>Traders </a></li>
     <li><a href='frontEndLogin.php'><i class='icon-login'></i>Log In</a></li>
     		<li><a href='frontEndSignup.php'>Sign Up</a></li>
     		
     		
     			
     			";
     }
     else if(isset($_SESSION["tradersName"])){
     	echo"<li><a href='traders.php'>WELCOME:".$_SESSION["tradersName"]."</a></li>";
		echo"<li><a href='logout.php'><i class='icon-logout'></i>Log Out</a></li>";

     }
     else{
     	echo" <li><a href='cart.php'>My Cart</a></li>
    		<li><a href='myaccount.php'>My Account</a></li> ";
     	echo"<li><a href='#'>WELCOME:".$_SESSION["frontEndUser"]."</a></li>";
		echo"<li><a href='logout.php'><i class='icon-logout'></i>Log Out</a></li>";

	 }?>


	 
    </ul>
        </div>
      </div>

     
    