<?php 
 include("header.php");
 $id = $_SESSION["fronEndUserId"];
 ?>
 

<div id="myAccount">
	<h2>Hello!! <?php echo$_SESSION["frontEndUser"];  ?></h2>
	<p id="addHeading">You Can Check the Status of your previously Bought goods Here!!</p>

	
	<table id="displayTable">
		<tr>
			
			<td>Product Name</td>
			<td>Price</td>
			<td>Quantity</td>
			<td>Total Price</td>
			<td>Status</td>
					
				

		</tr>
	
	<?php
		 if(!isset($_SESSION["frontEndUser"])){
    	header("location: frontEndLogin.php");
    		 }

    	else{ 

  		$sql=" SELECT  orders.id,orders.productId,orders.customerId, orders.price, orders.quantity, orders.totalPrice, orders.size, orders.status, product.productName FROM orders, product WHERE product.id=orders.productId and orders.customerId=$id ORDER BY orders.id DESC ";
	 	$result = mysqli_query($connection,$sql);
    	 while($row = mysqli_fetch_assoc($result)){
	 	echo"<tr>";
		echo"<td>";
	 	echo $row['productName'];  
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['price'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['quantity'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['totalPrice'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['status'];
	 	echo"</td>";
	 	echo"<td>"; echo"</td>";
	 	echo"</tr>";


	 }
}
	?>
	
			</table>
</div>
<?php
	include("mensFooter.php");
	?>