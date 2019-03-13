<?php
include("header.php");
?>
		<form method="post">
			
			<p id="addHeading">
			You can add Admin User Here!!<br>
			<br>
			</p>
			<table>
				<tr>
					<td>
					Username:
					</td>		
					<td>
					<input name="username" id="admin"><br>
					</td>
				</tr>
				<tr>
					<td>
					Password:			
					</td>
					<td>
					<input type="password" id="admin" name="password"><br>
					</td>				
				</tr>
				<tr>
					<td>
					Email:
					</td>
					<td>
					<input type="email" name="email" id="admin"><br>
					</td>
				</tr>
			</table>
			<br>
			<input type="submit" name="submit" value="Add">
			<input type="reset" name="reset" value="reset">
		</form>
		<br>
		<?php

			$uName = "";
			$pwd = "";
			$email = "";
			$error = "";
			if(isset($_POST["submit"])){
				
				$uName = $_POST["username"];
				$pwd = md5($_POST["password"]);
				$email=$_POST["email"];
				


				if($uName=="" || $pwd=="" || $email==""){
					$error.="Please fill all required fields.<br>";
				}

				//Checking the duplication of username
				$sql1 = "SELECT * FROM admin where username='$uName'";

				$result1 = mysqli_query($connection,$sql1);

				if (mysqli_num_rows($result1) > 0) {
  					$error.="Username Exists Please type another!!";
					}		


				if($error==""){
				$sql="INSERT INTO admin(username, password, email) VALUES ('$uName','$pwd','$email')";
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
			  
			  if($result){
			  echo"Admin User Added<br> Username::".$uName."<br>"."Password::".$pwd."<br>email::".$email;
			  	$uName = "";
				$pwd = "";
				$email = "";
			 	 }
			  	else {
					echo mysqli_error();	

				}
			}
				else{
					echo $error;
				}
				
			
			}
		?>
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
	 	
	 	echo"</tr>";


	 }

	?>
			</table>
<?php
include("footer.php");
?>