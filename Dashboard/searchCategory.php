<h2> Category </h2><br><br><hr><br>


	<p id="addHeading">Existing categories.</p>

	
	<table id="displayTable">
		<tr>
			<td>ID</td>
			<td>Category Name</td>
			<td>For Male/Female</td>
		</tr>
	
	<?php
	 $sql = "SELECT * FROM category WHERE category.categoryName like '%$search%'ORDER BY id DESC";
	 $result = mysqli_query($connection,$sql);
	 while($row = mysqli_fetch_assoc($result)){
	 	echo"<tr>";
	 	echo"<td>";
	 	echo $row['id'];
		echo"</td>";
		echo"<td>";
	 	echo $row['categoryName'];  
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['gender'];
	 	echo"</td>";
	 	echo "<td>  <a id='updateButton' href=updateCategory.php?id=".$row['id'].">Update</a></td>";
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
			<form method="post" action="addCategory.php" >
				<input type="submit" name="submit1" value="ADD Category">
			</form>
<?php
include("footer.php");
?>