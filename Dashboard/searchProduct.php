<h2> Product </h2><br><br><hr><br>
<br>

	<p id="addHeading">Existing Product</p>

	
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
			

		</tr>
	
	<?php
		
  		$sql=" SELECT category.categoryName, brand.brandName, product.id, product.productName, product.productDescription, product.image, product.price, product.instock, product.featured FROM category, product, brand WHERE category.id= product.categoryid AND brand.id=product.brandid and product.productName like '%$search%' ORDER BY product.id DESC ";
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
	 	echo "<td>  <a id='updateButton' href=updateProduct.php?id=".$row['id'].">Update</a></td>";
	 	echo "<td>  <a onclick='return confirmDel()' id='deleteButton' href=?mode=del&id=".$row['id'].">Delete</a> </td>";
	 	echo"</tr>";


	 }

	?>
			</table>
			 <script>
  	function confirmDel(){
		var con = confirm("Are you sure you want to delete\n It will delete the data permanetly");
		if(con) {
			return true;	
		} else {
			return false;
		}	
	}	
  </script>
			<br>
