<?php 
include("mensHeader.php");
$id = $_GET["id"];
?>


<?php
				$sql=" SELECT category.categoryName,category.id, product.id, product.productName, product.productDescription, product.image, product.price, product.instock, product.brandid, product.categoryid,brand.brandName FROM category, product, brand WHERE brand.id=product.brandid and category.id= product.categoryid and category.gender='male' and category.id=$id   ORDER BY product.id DESC ";
	$result = mysqli_query($connection,$sql) or die(mysqli_error());
			$catName = $row['categoryName'];
			echo"<h2>".$catName."</h2>";
	while($row = mysqli_fetch_assoc($result)) {
		$brandName = $row['brandName'];
		$id=$row['id'];
		$name = $row['productName'];
		$price = $row['price'];
		$instock = $row['instock'];
		
		echo "<div class='product'>";
			echo"<div class='four columns'>";
	echo"<div class='main'>";
		echo"<div class='pricing-table'>";
			echo"<div class='pricing'>";

					
				echo"<div class='price-bottom'>";
					echo"<div class='price1'>";
						echo"<div class='dotter'>";
							echo"<h3>$".$price."</h3>";
						echo"</div>";
						echo"<div class='month'>";
						echo"<h4 class='brandNameinProduct'>".$name."</h4>";
						echo"</div>";
						echo"<div class='clear'>"; echo"</div>";
					echo"</div>";
					echo"<div class='price2'>";	
						echo"<ul>";
							echo"<li>"; echo "<img src='images/".$row['image']."'  width='200' heigth='200' class='imageOfProduct'><br>"; echo"</li>";
							echo"<li>"; echo substr($row['productDescription'],0,30);  echo"</li>";
							echo"<li>"; echo "Instock::".$instock; echo"</li>";
							echo"<li>"; echo"<div class='medium danger btn'><a href='shopNow.php?id=".$id."'><i class='icon-list-add'></i>BUY</a></div>";echo"</li>";

						echo"</ul>";
					echo"</div>";
				echo"</div>";
			echo"</div>";
		echo"</div>";
	echo"</div>";
			
			
			// echo "
			// <form action='cartadd.php' method='post'>
			// 	<input type='hidden' name='id' value='$id'>
			// 	<input type='hidden' name='title' value='$title'>
			// 	<input type='hidden' name='price' value='$price'>
			// 	<input type='text' name='qty' value='1'>
			// 	<input type='submit' name='cart' value='Add To Cart'>
			
			// </form>
			// ";

		echo "</div>";
	}
	?>


<?php 
include("mensFooter.php");
$id = $_GET["id"];
?>