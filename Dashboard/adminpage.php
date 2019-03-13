
<?php
include("header.php");

/*for deleting */
if(isset($_GET["mode"])) {
	$mode=$_GET["mode"];
	if($mode=="del") {
		$id=$_GET["id"];
		$sql="DELETE FROM admin WHERE id='$id'";
		$result=mysqli_query($connection,$sql);
		
	}
}
?>
<h2> Admin </h2><br><br><hr><br>


	<p id="addHeading">Existing User.</p>

	
	<table id="displayTable">
		<tr>
			<td>ID</td>
			<td>Username</td>
			<td>Password</td>
			<td>Em@il</td>

		</tr>
	
	<?php
	 $sql = "SELECT * FROM admin ORDER BY id DESC";
	 $result = mysqli_query($connection,$sql);
	 while($row = mysqli_fetch_assoc($result)){
	 	echo"<tr>";
	 	echo"<td>";
	 	echo $row['id'];
		echo"</td>";
		echo"<td>";
	 	echo $row['username'];  
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['password'];
	 	echo"</td>";
	 	echo"<td>";   
	 	echo $row['email'];
	 	echo"</td>";
	 	echo "<td>  <a id='updateButton' href=updateAdmin.php?id=".$row['id'].">Update</a></td>";
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
			<form method="post" action="addAdmin.php" >
				<input type="submit" name="submit1" value="ADD Admin User">
			</form>
<?php
include("footer.php");
?>