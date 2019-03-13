<?php
include("header.php");
?>

		
		
		<form method="post">
			
			<p id="addHeading">
			You can add Brand Here!!<br>
			<br><hr><br>
			</p>

			<table>
			<tr>
			<td>
			Brand Name</td><td>	<input name="brandname" id="admin"><br>
			</td>
			
        </table>
<br><br>
			<input type="submit" name="submit" value="Add">
			<input type="reset" name="reset" value="reset">
		</form><br><hr>
		<?php

			$bname = "";
			
			$error="";

			if(isset($_POST["submit"])){
				
				$bname = $_POST["brandname"];

				if($bname=="") {
				$error.="Please fill all the required fields. <br> ";	
			}		
			if($error=="") {
				$sql = "INSERT INTO brand (brandName) VALUES ('$bname')";
								
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				if($result) {
					echo "Data Submitted";		
					$bname  =   "";
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
				


				<p id="addHeading">Existing User.</p>

	
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
	 	echo"</tr>";


	 }

	?>
			</table>
<?php
include("footer.php");
?>