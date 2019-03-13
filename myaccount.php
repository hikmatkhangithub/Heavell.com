<?php 
 include("header.php");
 $id = $_SESSION["fronEndUserId"];
 ?>
 

<div id="myAccount">
	<h2>Hello!! <?php echo$_SESSION["frontEndUser"];  ?></h2>
	<p id="addHeading">Your Details</p>

	
	<table id="displayTable">
		<tr>
			
			<td>First Name</td>
			<td>Last Name</td>
			<td>Phone</td>
			<td>Address</td>
			<td>Username</td>
					
				

		</tr>
	
	<?php
		 if(!isset($_SESSION["frontEndUser"])){
    	header("location: frontEndLogin.php");
    		 }

    	else{ 

  		$sql=" SELECT  customer.id,customer.firstName, customer.lastName, customer.phone, customer.address, customer.username FROM customer WHERE customer.id=$id ORDER BY customer.id DESC ";
	 	$result = mysqli_query($connection,$sql);
    	 while($row = mysqli_fetch_assoc($result)){
	 	echo"<tr>";
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
	 	echo"<td>"; echo"</td>";
	 	echo"<td>";echo"<div class='medium success btn'><a href='editMyAccount.php'>Edit Profile</a></div>"; echo"</td>";
	 	echo"</tr>";


	 }
}
	?>
	
			</table>
<div class="medium warning btn"><a href="history.php">See Your Shopping History</a></div>
</div>

<?php
	include("mensFooter.php");
	?>