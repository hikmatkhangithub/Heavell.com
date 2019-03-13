<?php
include("header.php");
?>
		<form method="post">
			
			<p id="addHeading">
			You can add category here!!<br>
			<br>
			</p>
			
			Category Name			<br>
			<input name="categoryname" id="category"><br>
			For Male or Female<br>
			<input type="radio" name="sex" value="male" checked>Male
 			 <br>
 		    <input type="radio" name="sex" value="female">Female
 		    <br>
 		    <br>
			<input type="submit" name="submit" value="Add">
			<input type="reset" name="reset" value="reset">
		</form>
		<?php
			$cName = "";
			$error = "";
			$gender = "";
			if(isset($_POST["submit"])){
				
				$cName = $_POST["categoryname"];
				$gender = $_POST["sex"];

				if($cName=="" || $gender==""){
					$error.="Please fill required fields";

				}
				if($error==""){

				$sql="INSERT INTO category(categoryName, gender) VALUES ('$cName','$gender')";
				//echo $sql;				
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				if($result){
				  echo"Category Inserted.<br> Category Name:".$cName."<br>For".$gender;
				  $cName = "";
				}

				
				else{
					echo mysqli_error();
				}
			}
			else{
				echo$error;
			}
			}
		?>
				<p id="addHeading">Existing categories.</p>

	
			<table id="displayTable">
				<tr>
					<td>ID</td>
					<td>Category Name</td>
					<td>For Male/Female</td>
				</tr>
	
			<?php
			 	$sql1 = "select * from category";
	 			$result1 = mysqli_query($connection,$sql1);
			 while($row = mysqli_fetch_assoc($result1)){
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
	 			echo"</tr>";
				 }

			?>
			</table>
<?php
include("footer.php");
?>