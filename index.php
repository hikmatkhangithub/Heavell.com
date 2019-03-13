<?php 
include("header.php");

 ?>
<html lang="en">
	<head>
		<title>E-Commerce</title>
		
		<!-- Gumby CSS  -->
		<link rel="stylesheet" href="gumby/css/gumby.css">
		<!-- Gumby uses Moderniser JS -->
		<script src="gumby/js/libs/modernizr-2.6.2.min.js"></script>

		<link rel="stylesheet" href="css/owl.carousel.css" />

		
		<!-- Application custom CSS -->
		<link rel="stylesheet" type="text/css" href="css/custom.css">

	</head>
	<body>
	
	<div class="firstContainer">
	<div class="row">
	<br><br><br><br><h1>HEAVELL.com</h1><br><br>
	<h3>All for you!</h3> 
	<h3><br><h3>Designed for parents, fit for baby. </h3>
		</div>

		<ul class="cb-slideshow">

            <li><span>Image 01</span><div><h3>HEAVELL.com</h3></div></li>
            <li><span>Image 02</span><div><h3>CLASS</h3></div></li>
            <li><span>Image 03</span><div><h3>IMAGINATION</h3></div></li>
            <li><span>Image 04</span><div><h3>STYLE</h3></div></li>
            <li><span>Image 05</span><div><h3>SWAG</h3></div></li>
            <li><span>Image 06</span><div><h3>MASTER PIECE</h3></div></li>
        </ul>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
           
        </div>


		
		
		
	</div>

	
	</div>
	<br>
	<div class="row" id="secondContainer">
		<div class="six columns" id="skiplink_2">
			<div id="mens">
			<br><br>
			<br>
			<br><br><br>
			<br>
			<br><br><br>
			<div class="medium danger btn"><a href="mens.php">SHOP MEN'S</a></div>
			</div>
		</div>
		
		<div class="six columns">
			<div id="womens">
			<br><br>
			<br>
			<br><br><br>
			<br>
			<br><br><br>
			<div class="medium danger btn"><a href="womens.php">SHOP WOMEN'S</a></div>
			</div>
		</div>
	</div>
	<br>
	<div class="thirdContainer">
	
		<div class="row" id="feature">
			<div class="row">
			<div class="three columns"> </div>
			<div class="six columns"><p id="featuredProduct">Featured Products</p></div>
			<div class="three columns"> </div>
			</div>

			<div class="owl-carousel owl-theme">
<?php 	
			$sql = "SELECT * FROM product WHERE featured='Y'";
			$result = mysqli_query($connection,$sql);
			while($row=mysqli_fetch_assoc($result)){
				$id=$row['id'];
				$price= $row['price'];
				echo"<div class='row'><br><a href='shopNow.php?id=".$id."''>"."<img  class='featureImages' src='images/".$row["image"]."'>"."</a></div>";

				
			}
			

			?>
		</div>
		</div>
	</div><br><br>
		<div class="row">
			<div class="one columns">

			</div>
			<!-- About the company -->
			<div class="six columns" >
				<div id="secondTextBox">
				<h2>HEAVELL.com's Recent Fashion Show</h2>
				<iframe width="500" height="250" src="https://www.youtube.com/embed/KWFwdNIOVBA" frameborder="0" allowfullscreen></iframe>
					</div>
			</div>
			

			<div class="four columns" id="customerview">
				<!-- Customer view  -->
				<p id="greencomabout">
				<img src="images/heavell.png" alt="heavell" />
				HEAVELL.com is an E-Shop eastablished by the young and enthusiastic youths. Especially we are focused on dilvering the high standard goods to the customer. Making a customer satisfied in terms of shopping is the main motto of our E-Shop. We are made for Customer, made by customer and fully dedicated towards our customer. You know what's sucky about regular flashlights? They only come in two colors: white or that yellowish-white that reminds us of the teeth of an avid coffee drinker. What fun is that kind of flashlight?</p>
				
				</p>

			</div>

		</div>
	<br><br><hr>
	
	<?php 
include("footer.php");

 ?>
 </div>	
		<!-- Gumby JS includes -->
		<script src="gumby/js/libs/jquery-2.0.2.min.js"></script>
		<script gumby-touch="gumby/js/libs" src="gumby/js/libs/gumby.min.js"></script>

		<script src="js/owl.carousel.js"></script>
		<script src="owlcarousel/owl.carousel.min.js"></script>


		<script>
				var owl = $('.owl-carousel');
				owl.owlCarousel({
   				 items:4,
   				 loop:true,
    			 margin:10,
    			 autoplay:true,
     			 autoplayTimeout:1000,
   				 autoplayHoverPause:true
				});
		</script>
		<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=44215160"></script>
		
	</body>
</html>