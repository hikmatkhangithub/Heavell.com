<?php
include("header.php");
?>

		
		
		<form method="post">
			
			<p id="addHeading">
			You can add Customer Here!!<br>
			<br><hr><br>
			</p>

			<table>
			<tr>
			<td>
			First Name
			</td>
			<td>
			<input name="firstName" id="fname"><br>
			</td>
			<tr>
			<td>
			Last Name
			</td>
			<td>
			<input name="lastName" id="lname"><br>
			</td>
			</tr>
			<tr>
			<td>
			Phone
			</td>
			<td>
			<input name="phone" id="phone"><br>			
			</td>
			</tr>
			
			<tr>
			<td>
			Address
			</td>
			<td>
			<input name="address" id="add"><br>			
			</td>
			</tr>
			<tr>
			<td>
			Username
			</td>
			<td>
			<input name="username" id="uname"><br>			
			</td>
			</tr>
			<tr>
			<td>
			Password
			</td>
			<td>
			<input name="password" id="pwd"><br>			
			</td>
			</tr>
			
        </table>
<br><br>
			<input type="submit" name="submit" value="Add">
			<input type="reset" name="reset" value="reset">
		</form><br><hr>
		<?php

			$firstName = "";
			$lastName = "";
			$phone="";
			$address="";
			$username="";
			$password = "";
		
			$error="";

			if(isset($_POST["submit"])){
				
				$firstName = $_POST["firstName"];
				$lastName = $_POST["lastName"];
				$phone = $_POST["phone"];
		        $address = $_POST["address"];
				$username = $_POST["username"];
				$password= md5($_POST["password"]);
				

				if($firstName=="" || $lastName=="" || $phone=="" || $address=="" || $username=="") {
				$error.="Please fill all the required fields. <br> ";	
				
				}
				
				
				//checking the duplication of username
				$sql1 = "SELECT * FROM customer where username='$username'";

				$result1 = mysqli_query($connection,$sql1);

				if (mysqli_num_rows($result1) > 0) {
  					$error.="Username Exists Please type another!!";
					}		

							
			if($error=="") {
				
				$sql = "INSERT INTO customer (firstName,lastName, phone, address, username, password ) VALUES ('$firstName', '$lastName', '$phone', '$address', '$username', '$password')";
								
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				if($result) {
					echo "Data Submitted";		
					$firstName = "";
					$lastName = "";
					$phone="";
					$address="";
					$username="";
					$password = "";
					

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
  		$sql=" SELECT  customer.id, customer.firstName, customer.lastName, customer.phone, customer.address, customer.username, customer.password FROM customer ORDER BY customer.id DESC ";
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
			
<?php
include("footer.php");
?>