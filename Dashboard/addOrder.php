<?php
include("header.php");
?>

		
		
		<form method="post">
			
			<p id="addHeading">
			You can add order Here!!<br>
			<br><hr><br>
			</p>

			<table>
			<tr>
			<td>
			First Name
			</td>
			<td>
			<select name="firstName" id="cat_id">
        	<option value="">--SELECT--</option>
        
            <?php
				$sql=" SELECT * FROM customer ORDER BY id DESC ";
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				while($row = mysqli_fetch_assoc($result)) {
					if($cat_id==$row['id']) {
						echo "<option value='".$row['id']."' selected>".$row['firstName']."</option>";	
					} else {
						echo "<option value='".$row['id']."'>".$row['firstName']."</option>";		
					}
				}
			?>

       	 </select>			
			</td>
			<tr>
			<td>
			Last Name
			</td>
			<td>
			<select name="lastName" id="cat_id">
        	<option value="">--SELECT--</option>
        
            <?php
				$sql=" SELECT * FROM customer ORDER BY id DESC ";
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				while($row = mysqli_fetch_assoc($result)) {
					if($cat_id==$row['id']) {
						echo "<option value='".$row['id']."' selected>".$row['lastname']."</option>";	
					} else {
						echo "<option value='".$row['id']."'>".$row['lastName']."</option>";		
					}
				}
			?>

       	 </select>			
			</td>
			</tr>
			<tr>
			<td>
			Product Name
			</td>
			<td>
			<select name="productid" id="cat_id">
        	<option value="">--SELECT--</option>
        
            <?php
				$sql=" SELECT * FROM product ORDER BY id DESC ";
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				while($row = mysqli_fetch_assoc($result)) {
					if($cat_id==$row['id']) {
						echo "<option value='".$row['id']."' selected>".$row['productName']."</option>";	
					} else {
						echo "<option value='".$row['id']."'>".$row['productName']."</option>";		
					}
				}
			?>

       	 </select>
        </td>
        </tr>
			
			<tr>
			<td>
			Paydate
			</td>
			<td>
			<input name="payDate" id="add"><br>			
			</td>
			</tr>
			<tr>
			<td>
			Status
			</td>
			<td>
			<input name="status" id="uname"><br>			
			</td>
			</tr>
			<tr>
			<td>
			Total Price
			</td>
			<td>
			<input name="totalPrice" id="pwd"><br>			
			</td>
			</tr>
			
        
        </table>
<br><br>
			<input type="submit" name="submit" value="Add">
			<input type="reset" name="reset" value="reset">
		</form><br><hr>
		<?php

			$firstName = "";
			$lastName = "";
			$phone="";
			$address="";
			$username="";
			$password = "";
			$productid= "";
			$error="";

			if(isset($_POST["submit"])){
				
				$firstName = $_POST["firstName"];
				$lastName = $_POST["lastName"];
				$phone = $_POST["phone"];
		        $address = $_POST["address"];
				$username = $_POST["username"];
				$password= $_POST["password"];
				$productid = $_POST["productid"];

				if($firstName=="" || $lastName=="" || $phone=="" || $address=="" || $username==""|| $productid=="") {
				$error.="Please fill all the required fields. <br> ";	
				
				}
				
				//checking the duplication of username
				$sql1 = "SELECT * FROM customer where username='$username'";

				$result1 = mysqli_query($connection,$sql1);

				if (mysqli_num_rows($result1) > 0) {
  					$error.="Username Exists Please type another!!";
					}		

							
			if($error=="") {
				
				$sql = "INSERT INTO customer (firstName,lastName, phone, address, username, password, productid) VALUES ('$firstName', '$lastName', '$phone', '$address', '$username', '$password', '$productid')";
								
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				if($result) {
					echo "Data Submitted";		
					$firstName = "";
					$lastName = "";
					$phone="";
					$address="";
					$username="";
					$password = "";
					$productid= "";
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
		<p id="addHeading">Existing Orders</p>

	
	<table id="displayTable">
		<tr>
			<td>ID</td>
			<td>First Name</td>
			<td>last Name</td>
			<td>Product Name</td>
			<td>Paydate</td>
			<td>Status</td>
			<td>Total Price</td>

		</tr>
	
	<?php
  		$sql=" SELECT product.productName,customer.firstName,customer.lastName, orders.id, orders.payDate,orders.status, orders.totalPrice FROM customer, product, orders WHERE product.id= orders.productId AND orders.customerId= customer.id ORDER BY orders.id DESC ";
	 	$result = mysqli_query($connection,$sql);
    	 while($row = mysqli_fetch_assoc($result)){
	 	echo"<tr>";
	 	echo"<td>";
	 	echo $row['id'];
		echo"</td>";
		echo"<td>";
	 	echo $row['firstName'];  
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['lastName'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['productName'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['payDate'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['status'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['totalPrice'];
	 	echo"</td>";
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
			
<?php
include("footer.php");
?>