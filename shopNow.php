<?php 
include("header.php");
$id=$_GET['id'];
?>
<br>
<div id="shopHere">
<?php 
	$sql= "SELECT product.id,product.image, product.productName, product.sizeAvailable, product.productDescription, product.price, product.instock, product.brandid, product.categoryid, brand.brandName, category.categoryName FROM product,brand,category WHERE product.brandid=brand.id and product.categoryid=category.id and product.id=$id";
	$result= mysqli_query($connection,$sql);
	
	while($row = mysqli_fetch_assoc($result)) {
			$id=$row['id'];
			$price=$row['price'];
			$name=$row['productName'];
			$size=$row['sizeAvailable'];
			$image=$row['image'];

		echo"<div class='row' id='shopNow'>";
			
		echo"<div class='four columns'>";
		echo "<img class='buyImage'src='images/".$row['image']."'>";
		echo"</div>";
		echo"<div class='two columns'>";
		echo"</div>";
		echo"<div class='six columns'>";		
		echo"<h2>";
		echo $row['productName'];
		echo"</h2>";
		echo"<br>";
		echo $row['productDescription'];
		echo"<br>";
		echo"<div class='medium danger btn'>$".$row['price']."</div>";
		echo"<br>";
		echo"Available Sizes:".$row['sizeAvailable'];
		echo"<br>";
		echo "
			<form action='cartadd.php' method='post'>
				<input type='hidden' name='id' value='$id'>
				<input type='hidden' name='name' value='$name'>
				<input type='hidden' name='price' value='$price'>
				<input type='hidden' name='image' value='$image'>				
				<table>
				<tr>
				<td>Quantity</td><td><input type='number' name='qty' value='1'></td>
				</tr>
				<tr>
				<td>Size Preference</td><td><input type='text' name='size' value='$size'><td>
				</tr>
				</table>
				<div class='medium secondary btn'><input type='submit' name='cart' value='Add To Cart'> </div>
				

			</form>";
		echo"</div>";
		echo"</div>";


		}

?>
</div>
<?php 
include("mensFooter.php");
?>