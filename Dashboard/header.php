<?php 
 include("connection.php");
 if(!isset($_SESSION["adminuser"])) {
	header("location: ../admin/index.php");
	die();
}
 ?>
<html >
	<head>
		<title>Admin Pannel</title>
		<meta charset="utf-8" />
		<meta name="author" content="Kafle" />
		<meta name="viewport" content="width=device-width,"initial-scale: 1.0, user- scalabe=0  />

		<!-- Gumby CSS  -->
		<link rel="stylesheet" href="/gumby/css/gumby.css">
		<!-- Gumby uses Moderniser JS -->
		<script src="gumby/js/libs/modernizr-2.6.2.min.js"></script>
		<!-- Application custom CSS -->
		<link rel="stylesheet" href="../css/custom1.css">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
						<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> 


	</head>
	<body>
		<div id ="header"> 
			<div class="logo"> <a href="#">E-Commerce </a> Welcome User!!  <?php echo $_SESSION["adminuser"];?></div>
			<div class="searchBar">
				<form action="search.php"><input type="text" name="search" placeholder="Search Anything Here!!"> 
					<select name="searchDrop" id="in_stock">
      		   <option value="Category"> Category</option>     

     		   <option value="Brand">Brand</option>
     		   <option value="Product"> Product</option>     

    		   </select>
    		   <input type="submit" value="submit" name="submit">
				</form>

			</div>
				<div class="logout"> <a href="logout.php"><button class="logoutButton"><i class="fa fa-expeditedssl"></i> Logout</button></a></div>
		</div>
		

		<div id ="container">
			<div class="sidebar">
					<ul id="navigation">
					<li><a href="#" class="selected">Menu </a></li>
					<li><a href="adminpage.php" >Admin </a></li>
					<li><a href="categoryPage.php">Category</a></li>
					<li><a href="brand.php"> Brand</a></li>
					<li><a href="product.php">Product </a></li>
					<li><a href="customer.php"> Customer</a></li>
					<li><a href="order.php">Order </a></li>
					<li><a href="traders.php">Traders </a></li>
					<li><a href="shop.php">Shops </a></li>
					</ul>
			</div>
			<div class="content" bgproperties="fixed">