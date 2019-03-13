
<?php
include("header.php");

/*for deleting */
if(isset($_GET["mode"])) {
	$mode=$_GET["mode"];
	if($mode=="del") {
		$id=$_GET["id"];
		$sql="DELETE FROM customer WHERE id='$id'";
		$result=mysqli_query($connection,$sql);
		
	}
}
?>
<h2> Customer </h2><br><br><hr><br>


	<p id="addHeading">Existing Customer</p>

	
	<table id="displayTable">
		<tr>
			<td>ID</td>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Phone</td>
			<td>Address</td>
			<td>Username</td>
			<td>Password</td>		
				

		</tr>
	
	<?php
  		$sql=" SELECT customer.quantity, customer.id, customer.firstName, customer.lastName, customer.phone, customer.address, customer.username, customer.password FROM customer ORDER BY customer.id DESC ";
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
	 	echo $row['phone'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['address'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['username'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['password'];
	 	echo"</td>";
	 	echo "<td>  <a id='updateButton' href=updateCustomer.php?id=".$row['id'].">Update</a></td>";
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
			<form method="post" action="addCustomer.php" >
				<input type="submit" name="submit1" value="ADD Customer!!">
			</form>
<?php
include("footer.php");
?>