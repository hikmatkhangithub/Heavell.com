<?php 
 include("header.php");
 $id = $_SESSION["tradersId"];
 $name = $_SESSION["tradersName"];
 if(isset($_GET["mode"])) {
	$mode=$_GET["mode"];
	if($mode=="del") {
		$id=$_GET["id"];
		$sql="DELETE FROM shop WHERE id='$id'";
		$result=mysqli_query($connection,$sql);
		
	}
}
 ?><br><br><br>
 <div class="row">
 
 	<div class="three columns"><div class='medium success btn'><a href='addShop.php'>Add Shop Here</a></div> </div><br><br><br>
</div>
<div class="row">
<h3>Your Shop's</h3>
	<table id="displayTable">
		<tr>
			<td>Name</td>
			<td>Location</td>
			<td>Permission</td>
			
			
			

		</tr>
	
	<?php
	$sql = "SELECT * FROM shop where traderId='$id'";
	 $result = mysqli_query($connection,$sql);
	 while($row = mysqli_fetch_assoc($result)){
	 	$id=$row['id'];
	 	echo"<tr>";
	 	echo"<td>";
	 	echo $row['shopName'];
		echo"</td>";
	 	echo"<td>";
	 	echo $row['location'];
		echo"</td>";
		echo"<td>";
	 	echo $row['permission'];  
	 	echo"</td>";
	 	echo "<td>  <a id='updateButton' href=updateShop.php?id=".$row['id'].">Update</a></td>";
	 	
	 	echo "<td>  <a onclick='return confirmDel()' id='deleteButton' href=?mode=del&id=".$row['id'].">Delete</a> </td>";
	 	echo "<td>  <a id='updateButton' href=addProductShop.php?id=".$row['id']."><div class='medium success btn'>Add Product For This Shop</a></div></a></td>";
	 	echo"</tr>";


	 }

	?>
			</table>



</div>

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