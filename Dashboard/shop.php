
<?php
include("header.php");

/*for deleting */
if(isset($_GET["mode"])) {
	$mode=$_GET["mode"];
	if($mode=="del") {
		$id=$_GET["id"];
		$sql="DELETE FROM shop WHERE id='$id'";
		$result=mysqli_query($connection,$sql);
		
	}
}
?>
<h2> Traders </h2><br><br><hr><br>


	<p id="addHeading">Existing Trader</p>

	
	<table id="displayTable">
		<tr>
			<td>Name</td>
			<td>Trader Name</td>
			<td>Location</td>
			<td>Permission</td>
			
			
			

		</tr>
	
	<?php
	 $sql = "SELECT shop.id,name, shopName, location, permission FROM traders, shop WHERE shop.traderId=traders.id";
	 $result = mysqli_query($connection,$sql);
	 while($row = mysqli_fetch_assoc($result)){
	 	$id=$row['id'];
	 	echo"<tr>";
	 	echo"<td>";
	 	echo $row['shopName'];
		echo"</td>";
		echo"<td>";
	 	echo $row['name'];  
	 	echo"</td>";
	 	echo"<td>";
	 	echo $row['location'];
		echo"</td>";
		echo"<td>";
	 	echo $row['permission'];  
	 	echo"</td>";
	 	echo "<td>  <a id='updateButton' href=updateShop.php?id=".$row['id'].">Update</a></td>";
	 	
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
			<form method="post" action="addShop.php" >
				<input type="submit" name="submit1" value="ADD Shop!!">
			</form>
<?php
include("footer.php");
?>