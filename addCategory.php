
<?php
include("header.php");

/*for deleting */

?><br><Br><Br>
<div class="row"><h3>Add Category Here!!</h3></div>
<form method="post">
			
			
			<div class="row">
			Category Name			<br>
			<input name="categoryname" id="category"><br>
			<input type="submit" name="submit" value="Add">
			<input type="reset" name="reset" value="reset">
			</div>
		</form>
		<?php
			$cName = "";
			$error = "";
			
			if(isset($_POST["submit"])){
				
				$cName = $_POST["categoryname"];
				

				if($cName=="" ){
					$error.="Please fill required fields";

				}
				if($error==""){

				$sql="INSERT INTO category(categoryName) VALUES ('$cName')";
				//echo $sql;				
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				if($result){
				  echo"<div class='row'>Category Inserted.<br> Category Name:".$cName."<br></div>";
				  $cName = "";
				}

				
				else{
					echo mysqli_error();
				}
			}
			else{
				echo"<div class='row'>";
				echo$error;
				echo"</div>";
			}
			}
		?>
				<div class="row"><h4>Existing categories.</h4></div>

	
			
			<?php
			 	$sql1 = "select * from category";
	 			$result1 = mysqli_query($connection,$sql1);
			 while($row = mysqli_fetch_assoc($result1)){
	 			echo"<div class='row'>";
	 			echo $row['categoryName'];  
	 			echo"</div>";
				 }

			?>
			

