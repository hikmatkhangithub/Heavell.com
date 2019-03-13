
<?php
include("header.php");

/*for deleting */
if(isset($_GET["mode"])) {
	$mode=$_GET["mode"];
	if($mode=="del") {
		$id=$_GET["id"];
		$sql="DELETE FROM orders WHERE id='$id'";
		$result=mysqli_query($connection,$sql);
		
	}
}
?>
<h2> Orders </h2><br><br><hr><br>


	<p id="addHeading">Existing Orders</p>

	
	<table id="displayTable">
		<tr>
			<td>ID</td>
			<td>Customer Id</td>
			<td>Product Id</td>
			<td>Pay Date</td>
			<td>Status</td>
			<td>Price</td>
			<td>Quantity</td>
			<td>Size</td>		
			<td>Total Price</td>						

		</tr>
	
	<?php
  		$sql=" SELECT orders.id,orders.customerId,orders.productId,orders.payDate,orders.status,orders.price,orders.quantity,orders.size,orders.totalPrice  FROM orders ORDER BY orders.id DESC ";
	 	$result = mysqli_query($connection,$sql);
    	 while($row = mysqli_fetch_assoc($result)){
	 	echo"<tr>";
	 	echo"<td>";
	 	echo $row['id'];
		echo"</td>";
		echo"<td>";
	 	echo $row['customerId'];  
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['productId'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['payDate'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['status'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['price'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['quantity'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['size'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['totalPrice'];
	 	echo"</td>";
	 	echo "<td>  <a id='updateButton' href=updateOrders.php?id=".$row['id'].">Update</a></td>";
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
			
<?php
include("footer.php");
?>