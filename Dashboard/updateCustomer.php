<?php
include("header.php");
?>
		<h2>Update Customers</h2>
<?php
$id = $_GET["id"];
// echo $id;
?>

<form method="post" action="">
<table id="tableForUpdate" >
    <tr>
      <td colspan="2">
      <?php
      $error="";

			if(isset($_POST["submit"])){
				
				$firstName = $_POST["firstName"];
				$lastName = $_POST["lastName"];
				$phone = $_POST["phone"];
		        $address = $_POST["address"];
				$username = $_POST["username"];
				$password= $_POST["password"];
						

				if($firstName=="" || $lastName=="" || $phone=="" || $address=="" || $username=="") {
				$error.="Please fill all the required fields. <br> ";	
				
				}
				
				
						
					
			if($error=="") {
				
					$sql=" UPDATE customer set  firstName='$firstName', lastName='$lastName', phone='$phone', address='$address', username='$username', password='$password' WHERE id='$id' ";
								
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				if($result) {
					echo "Data Submitted";		
				} else {
					echo mysqli_error();	
				}	

			}										
			else{
				echo $error;
			}
			}

			$sql=" SELECT * FROM customer WHERE id='$id' ";
		$result = mysqli_query($connection,$sql);
		while($row=mysqli_fetch_assoc($result)) {

				$firstName = $row["firstName"];
				$lastName = $row["lastName"];
				$phone = $row["phone"];
		        $address = $row["address"];
				$username = $row["username"];
				$password= $row["password"];
							

		}
			?>
      </td>
      </tr>
    <tr>
			<td>
			First Name
			</td>
			<td>
			<input name="firstName" id="fname" value="<?php echo $firstName; ?>"<br>
			</td>
			<tr>
			<td>
			Last Name
			</td>
			<td>
			<input name="lastName" id="lname" value="<?php echo $lastName; ?>"><br>
			</td>
			</tr>
			<tr>
			<td>
			Phone
			</td>
			<td>
			<input name="phone" id="phone" value="<?php echo $phone; ?>"><br>			
			</td>
			</tr>
			
			<tr>
			<td>
			Address
			</td>
			<td>
			<input name="address" id="add" value="<?php echo $address; ?>"><br>			
			</td>
			</tr>
			<tr>
			<td>
			Username
			</td>
			<td>
			<input name="username" id="uname" value="<?php echo $username; ?>"><br>			
			</td>
			</tr>
			<tr>
			<td>
			Password
			</td>
			<td>
			<input name="password" id="pwd" value="<?php echo $password; ?>"><br>			
			</td>
			</tr>
			
     
  </table>
  <input type="submit" name="submit" id="submit" value="Save Data" /></td>
</form>
<?php
include("footer.php");
?>