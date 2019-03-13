<?php
include("header.php");
?>
		<h2>Update Products</h2>
<?php
$id = $_GET["id"];
// echo $id;
?>

<form method="post" action="" enctype="multipart/form-data">
<table id="tableForUpdate" >
    <tr>
      <td colspan="2">
      <?php
      $error="";

			if(isset($_POST["submit"])){
				
				$productName = $_POST["productname"];
				$productDescription = $_POST["description"];
				$price = $_POST["price"];
		        $inStock = $_POST["instock"];
				$brand_id = $_POST["brandid"];
				$cat_id = $_POST["categoryid"];
				$featured=$_POST["featured"];
				$size=$_POST["size"];

				$picture		=	"";

				if($cat_id=="" || $brand_id=="" || $productDescription=="" || $price=="" || $inStock==""|| $productName=="" || $feature="" || $size=="") {
				$error.="Please fill all the required fields. <br> ";	
				
				}
				if($price<0 || !is_numeric($price)) {
				$error.="Price must be greater than 0. <br>";	
				}			
					
			if($error=="") {
				if(is_uploaded_file($_FILES["picture"]["tmp_name"])) {
					move_uploaded_file($_FILES["picture"]["tmp_name"],"../images/".$_FILES["picture"]["name"]);
					$picture = $_FILES["picture"]["name"];
					$sql=" UPDATE product set sizeAvailable='$size', featured='$featured', productName='$productName', productDescription='$productDescription', picture='$picture', price='$price', instock='$inStock', brandid='$brand_id', categoryid=$cat_id WHERE id='$id' ";
				}
				else{
					$sql=" UPDATE product set sizeAvailable='$size', featured='$featured', productName='$productName', productDescription='$productDescription', price='$price', instock='$inStock', brandid='$brand_id', categoryid=$cat_id WHERE id='$id' ";
				}
								
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				if($result) {
					echo "Data Submitted";		
				} else {
					echo mysqli_error();	
				}	

			}										
			else{
				echo $error;
			}
			}
			$sql=" SELECT * FROM product WHERE id='$id' ";
		$result = mysqli_query($connection,$sql);
		while($row=mysqli_fetch_assoc($result)) {
			$cat_id 		= 	$row['categoryid'];
			$productName = $row["productName"];
			$productDescription = $row["productDescription"];
			$price = $row["price"];
		    $inStock = $row["instock"];
			$brand_id = $row["brandid"];
			$featured= $row["featured"];
			$picture=$row["image"];
			$size=$row["sizeAvailable"];
		}
		?>
      </td>
      </tr>
    		<tr>
			<td>
			Product Name
			</td>
			<td>
			<input name="productname" id="pname" value="<?php echo $productName; ?>"><br>
			</td>
			<tr>
			<td>
			Product Description
			</td>
			<td>
			<textarea name="description" id="desc"> <?php echo $productDescription; ?></textarea>
			</td>
			</tr>
			<tr>
			<td>
			Feature Image
			</td>
			<td>
			<input type="file" name="picture" id="pict" />
			<img src="../images/<?php echo $picture; ?>" width="100" height="100" />
			</td>
			</tr>
			<tr>
			<td>
			Price
			</td>
			<td>
			<input type="number" name="price" id="pric" value="<?php echo $price; ?>"><br>
			</td>
			</tr>
			<tr>
			<td>
			In stock
			</td>
			<td><select name="instock" id="in_stock">
      		  <option value="Y" <?php if($inStock=="Y") echo "selected"; ?>>Yes</option>
        	  <option value="N" <?php if($inStock=="N") echo "selected"; ?>>No</option>
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
					if($brand_id==$row['id']) {
						echo "<option value='".$row['id']."' selected>".$row['brandName']."</option>";	
					} else {
						echo "<option value='".$row['id']."'>".$row['brandName']."</option>";		
					}
				}
			?>

       	 </select>
        </td>
        </tr>
        <td>
			Show in Featured Product
			</td>
			<td><select name="featured" id="feature">
      		  <option value="Y" <?php if($featured=="Y") echo "selected"; ?>>Yes</option>
        	  <option value="N" <?php if($featured=="N") echo "selected"; ?>>No</option>
    		   </select></td>
			</tr>
			<tr>
			<tr>
			<td>
			Size Available
			</td>
			<td>
			<input name="size" id="size" value="<?php echo $size; ?>"><br>
			</td>
     		</tr>
  </table>
  <input type="submit" name="submit" id="submit" value="Save Data" /></td>
</form>
<?php
include("footer.php");
?>