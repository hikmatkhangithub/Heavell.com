
<?php
include("header.php");

/*for deleting */
if(isset($_GET["mode"])) {
	$mode=$_GET["mode"];
	if($mode=="del") {
		$id=$_GET["id"];
		$sql="DELETE FROM brand WHERE id='$id'";
		$result=mysqli_query($connection,$sql);
		
	}
}
?>
<h2> Brand </h2><br><br><hr><br>


	<p id="addHeading">Existing Brand</p>

	
	<table id="displayTable">
		<tr>
			<td>ID</td>
			<td>Brand Name</td>
			
			

		</tr>
	
	<?php
	 $sql = "SELECT * FROM brand ORDER BY id DESC";
	 $result = mysqli_query($connection,$sql);
	 while($row = mysqli_fetch_assoc($result)){
	 	echo"<tr>";
	 	echo"<td>";
	 	echo $row['id'];
		echo"</td>";
		echo"<td>";
	 	echo $row['brandName'];  
	 	echo"</td>";
	 	
	 	echo "<td>  <a id='updateButton' href=updateBrand.php?id=".$row['id'].">Update</a></td>";
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
			<form method="post" action="addbrand.php" >
				<input type="submit" name="submit1" value="ADD Brand!!">
			</form>
<?php
include("footer.php");
?>