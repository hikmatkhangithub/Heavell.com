<?php 
 include("header.php");
 $id = $_SESSION["tradersId"];
 ?>
 

<div id="myAccount">
	<h2>Hello!! <?php echo$_SESSION["tradersName"];  ?></h2>
	<p id="addHeading">Your Details</p>

	
	<table id="displayTable">
		<tr>
			
			<td>Traders Name</td>
			<td>Phone</td>
			<td>Address</td>
			<td>Username</td>
					
				

		</tr>
	
	<?php
		 if(!isset($_SESSION["tradersName"])){
    	header("location: tradersLogin.php");
    		 }

    	else{ 

  		$sql=" SELECT  traders.id, traders.name, traders.phone, traders.address, traders.username FROM traders WHERE traders.id=$id ORDER BY traders.name DESC ";
	 	$result = mysqli_query($connection,$sql);
    	 while($row = mysqli_fetch_assoc($result)){
	 	echo"<tr>";
		echo"<td>";
	 	echo $row['name'];  
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
	 	echo"<td>";echo"<div class='medium success btn'><a href='editTraderAccount.php'>Edit Profile</a></div>"; echo"</td>";
	 	echo"</tr>";


	 }
}
	?>
	
			</table>
<div class="medium warning btn"><a href="orders.php">See Your Order's.</a></div>
<div class="medium danger btn"><a href="tradersShop.php">Your Shop's</a></div>
</div>

<?php
	include("mensFooter.php");
	?>