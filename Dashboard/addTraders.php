<?php
include("header.php");
?>

		
		
		<form method="post">
			
			<p id="addHeading">
			You can add Traders Here!!<br>
			<br><hr><br>
			</p>

			<table>
			<tr>
			<td>
			Trader Name</td><td>	<input name="name" id="trader"><br>
			</td>
			</tr>
			<tr>
			<td>
			Trader Address</td><td>	<input name="address" id="trader"><br>
			</td>
			</tr>
			<tr>
			<td>
			Trader Phone</td><td>	<input name="phone" id="trader"><br>
			</td>
			</tr>
			<tr>
			<td>
			Trader Email</td><td>	<input name="email" type="email" id="trader"><br>
			</td>
			</tr>
			<tr>
			<td>
			Trader Username</td><td>	<input name="username" id="trader"><br>
			</td>
			</tr>
			<tr>
			<td>
			Trader Password</td><td>	<input name="password" id="trader" type="password"><br>
			</td>
			</tr>
        </table>
<br><br>
			<input type="submit" name="submit" value="Add">
			<input type="reset" name="reset" value="reset">
		</form><br><hr>
		<?php

			$name = "";
			$address = "";
			$phone = "";
			$email = "";
			$username = "";
			$password = "";
			
			$error="";

			if(isset($_POST["submit"])){
				
				$name = $_POST["name"];
				$address = $_POST["address"];
				$phone = $_POST["phone"];
				$email = $_POST["email"];
				$username = $_POST["username"];
				$password = md5($_POST["password"]);
				if($name=="" || $address=="" || $phone=="" || $email=="" || $username=="" || $password=="" ) {
				$error.="Please fill all the required fields. <br> ";	
			}		
			if($error=="") {
				$sql = "INSERT INTO traders (name, address, phone, email, username, password) VALUES ('$name','$address','$phone','$email','$username','$password')";
								
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
				


				
			</table>
<?php
include("footer.php");
?>