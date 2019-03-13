<?php
include("header.php");
$tradername = $_SESSION["tradersName"];
$id = $_SESSION["tradersId"];

?>

		
		<br><br><br>
		<form method="post">
			
			<p id="addHeading">
			You can add Shop Here!!<br>
			<br><hr><br>
			</p>

			<table>
			<tr>
			<td>
			Shop Name</td><td>	<input name="name" id="trader"><br>
			</td>
			</tr>
			<tr>
			<td>
			Shop Address</td><td>	<input name="address" id="trader"><br>
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
			$permission="No";
			$error="";

			if(isset($_POST["submit"])){
				
				$name = $_POST["name"];
				$address = $_POST["address"];
				
				if($name=="" || $address=="") {
				$error.="Please fill all the required fields. <br> ";	
			}		
			if($error=="") {
				$sql = "INSERT INTO shop (traderId, shopName, location, permission) VALUES ('$id','$name','$address','$permission')";
								
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				if($result) {
					echo "Your shop detail has been forwarded to the Service Provider. Please wait for the permission";		
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
