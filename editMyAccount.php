<?php 
 include("header.php");
 ?>
 <?php
$id = $_SESSION["fronEndUserId"];
// echo $id;
?>
<div id="myAccount">
<form method="post" action="">
<table id="tableForUpdate" >
    <tr>
      <td colspan="2">
<?php
     if(!isset($_SESSION["frontEndUser"])){
    	header("location: frontEndLogin.php");
     }

     else{
     	$error="";

			if(isset($_POST["submit"])){
				
				$firstName = $_POST["firstName"];
				$lastName = $_POST["lastName"];
				$phone = $_POST["phone"];
		        $address = $_POST["address"];
				
						

				if($firstName=="" || $lastName=="" || $phone=="" || $address=="") {
				$error.="Please fill all the required fields. <br> ";	
				
				}
				
				
						
					
			if($error=="") {
				
					$sql=" UPDATE customer set  firstName='$firstName', lastName='$lastName', phone='$phone', address='$address' WHERE id='$id' ";
								
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				if($result) {
					echo "Data Updated Sucessfully!!";		
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
							

		}




	 }
	 ?>
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
			
			
     
  </table>
  <input type="submit" name="submit" id="submit" value="Save Data" /></td>
</form>
</div>

<?php
	include("mensFooter.php");
	?>