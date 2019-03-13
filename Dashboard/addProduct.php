<?php
include("header.php");
?>

		
		
		<form method="post" enctype="multipart/form-data">
			
			<p id="addHeading">
			You can add Product Here!!<br>
			<br><hr><br>
			</p>

			<table>
			<tr>
			<td>
			Product Name
			</td>
			<td>
			<input name="productname" id="pname"><br>
			</td>
			<tr>
			<td>
			Product Description
			</td>
			<td>
			<textarea name="description" id="desc"></textarea>
			</td>
			</tr>
			<tr>
			<td>
			Feature Image
			</td>
			<td>
			<input type="file" name="picture" id="pict" />
			</td>
			</tr>
			<tr>
			<td>
			Price
			</td>
			<td>
			<input type="number" name="price" id="pric"><br>
			</td>
			</tr>
			<tr>
			<td>
			In stock
			</td>
			<td><select name="instock" id="in_stock">
      		   <option value="Y"> Yes</option>     

     		   <option value="N">No</option>
    		   </select></td>
			</tr>
			<tr>
			<td>
			Category Name
			</td>
			<td>
			<select name="categoryid" id="cat_id">
        	<option value="">--SELECT--</option>
        
            <?php
				$sql=" SELECT * FROM category ORDER BY id DESC ";
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				while($row = mysqli_fetch_assoc($result)) {
					if($cat_id==$row['id']) {
						echo "<option value='".$row['id']."' selected>".$row['categoryName']."</option>";	
					} else {
						echo "<option value='".$row['id']."'>".$row['categoryName']."</option>";		
					}
				}
			?>

       	 </select>
        </td>
        </tr>
        <tr>
			<td>
			Brand Name
			</td>
			<td>
			<select name="brandid" id="brand_id">
        	<option value="">--SELECT--</option>
        
            <?php
				$sql=" SELECT * FROM brand ORDER BY id DESC ";
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				while($row = mysqli_fetch_assoc($result)) {
					if($cat_id==$row['id']) {
						echo "<option value='".$row['id']."' selected>".$row['brandName']."</option>";	
					} else {
						echo "<option value='".$row['id']."'>".$row['brandName']."</option>";		
					}
				}
			?>

       	 </select>
        </td>
        </tr>
        <tr>
			<td>
			Show in Featured product
			</td>
			<td><select name="featured" id="feature">
			<option value="">--SELECT--</option>
      		   <option value="Y"> Yes</option>     

     		   <option value="N">No</option>
    		   </select></td>
			</tr>
			<tr>
			<td>
			Size Available
			</td>
			<td>
			<input name="size" id="SizeA"><br>
			</td>
			<tr>
        </table>
<br><br>
			<input type="submit" name="submit" value="Add">
			<input type="reset" name="reset" value="reset">
		</form><br><hr>
		<?php

			$productName = "";
			$productDescription = "";
			$image="";
			$price="";
			$inStock="";
			$brand_id = "";
			$cat_id= "";
			$featured="";
			$size="";
			$error="";

			if(isset($_POST["submit"])){
				
				$productName = $_POST["productname"];
				$productDescription = $_POST["description"];
				$price = $_POST["price"];
		        $inStock = $_POST["instock"];
				$brand_id = $_POST["brandid"];
				$cat_id = $_POST["categoryid"];
				$featured= $_POST["featured"];
				$size=$_POST["size"];
				$picture		=	"";

				if($cat_id=="" || $brand_id=="" || $productDescription=="" || $price=="" || $inStock==""|| $productName==""|| $featured=="" || $size=="") {
				$error.="Please fill all the required fields. <br> ";	
				
				}
				if($price<0 || !is_numeric($price)) {
				$error.="Price must be greater than 0. <br>";	
				}
							
				
				//print_r($_FILES);

			if($error=="") {
				if(is_uploaded_file($_FILES["picture"]["tmp_name"])) {
					move_uploaded_file($_FILES["picture"]["tmp_name"],"../images/".$_FILES["picture"]["name"]);
					$picture = $_FILES["picture"]["name"];
				}
				$sql = "INSERT INTO product (productName,productDescription, image, price, instock, brandid, categoryid, featured, sizeAvailable) VALUES ('$productName', '$productDescription', '$picture', '$price', '$inStock', '$brand_id', '$cat_id', '$featured', '$size')";
								
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				if($result) {
					echo "Data Submitted";	
					$productName = "";
					$productDescription = "";
					$image="";
					$price="";
					$inStock="";
					$brand_id = "";
					$cat_id= "";
					$featured="";
					$size="";
				} else {
					echo mysqli_error();	
				}	

			}										
			else{
				echo $error;
			}
			}
		?>
		<hr>
				


				<p id="addHeading">Existing Product.</p>

	
	<table id="displayTable">
		<tr>
			<td>ID</td>
			<td>Product Name</td>
			<td>Product Description</td>
			<td>Image</td>
			<td>Price</td>
			<td>Instock</td>
			<td>Brand Name</td>
			<td>Category Name</td>
			<td>Show in Featured Product</td>
			<td>Size Available</td>			

		</tr>
	
	<?php
  		$sql=" SELECT category.categoryName, brand.brandName, product.id,product.sizeAvailable, product.productName, product.productDescription, product.image, product.price, product.instock, product.featured FROM category, product, brand WHERE category.id= product.categoryid AND brand.id=product.brandid ORDER BY product.id DESC ";
	 	$result = mysqli_query($connection,$sql);
	 while($row = mysqli_fetch_assoc($result)){
	 	echo"<tr>";
	 	echo"<td>";
	 	echo $row['id'];
		echo"</td>";
		echo"<td>";
	 	echo $row['productName'];  
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['productDescription'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo "<img width='80' height='80' src='../images/".$row['image']."'>";
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['price'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['instock'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['brandName'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['categoryName'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['featured'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['sizeAvailable'];
	 	echo"</td>";
	 	echo"</tr>";


	 }

	?>
			</table>
<?php
include("footer.php");
?>