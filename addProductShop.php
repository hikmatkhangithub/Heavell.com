<?php 
 include("header.php");
 $id = $_GET['id'];
 $id1=$_SESSION['tradersId'];
 $name = $_SESSION["tradersName"];
 if(isset($_GET["mode"])) {
	$mode=$_GET["mode"];
	if($mode=="del") {
		$id=$_GET["id"];
		$sql="DELETE FROM  WHERE id='$id'";
		$result=mysqli_query($connection,$sql);
		
	}
}
 ?><br><Br><br>
 <?php
 		$sql= "SELECT * from shop where id='$id' ";
 		$result = mysqli_query($connection,$sql);
 		while($row=mysqli_fetch_assoc($result)){
 			if($row['permission']=="No"){
 				echo"<h3>Sorry You do not have the permission yet. Please contact Your Service Provider for Permission!!!</h3>";
 			}else{
 				echo"<div class='row'><div class='medium primary btn'><a href='addCategory.php'>Click Here!Add Category</a></div></div>";
 				$productName = "";
			$productDescription = "";
			$image="";
			$price="";
			$inStock="";
			$brand="15";
			$cat_id= "";
			$featured="";
			$size="";
			$error="";

			if(isset($_POST["submit"])){
				
				$productName = $_POST["productname"];
				$productDescription = $_POST["description"];
				$price = $_POST["price"];
		        $inStock = $_POST["instock"];
				
				$cat_id = $_POST["categoryid"];
				$featured= $_POST["featured"];
				$size=$_POST["size"];
				$picture		=	"";

				if($cat_id=="" || $productDescription=="" || $price=="" || $inStock==""|| $productName==""|| $featured=="" ) {
				$error.="Please fill all the required fields. <br> ";	
				
				}
				if($price<0 || !is_numeric($price)) {
				$error.="Price must be greater than 0. <br>";	
				}
							
				
				//print_r($_FILES);

			if($error=="") {
				if(is_uploaded_file($_FILES["picture"]["tmp_name"])) {
					move_uploaded_file($_FILES["picture"]["tmp_name"],"images/".$_FILES["picture"]["name"]);
					$picture = $_FILES["picture"]["name"];
				}
				$sql = "INSERT INTO product (productName,productDescription, image, price, instock, categoryid, featured, sizeAvailable, tradersId, shopId, brandid) VALUES ('$productName', '$productDescription', '$picture', '$price', '$inStock',  '$cat_id', '$featured', '$size','$id1','$id','$brand')";
								
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				if($result) {
					echo "Data Submitted";	
					$productName = "";
					$productDescription = "";
					$image="";
					$price="";
					$inStock="";
					
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
 				
 			}
 		}
 ?>
 <br><br><br>
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
<?php
	include("mensFooter.php");
	?>