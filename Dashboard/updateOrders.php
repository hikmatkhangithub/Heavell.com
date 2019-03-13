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
				
				$status = $_POST["status"];
				
						

				if($status=="") {
				$error.="Please fill all the required fields. <br> ";	
				
				}
				
				
						
					
			if($error=="") {
				
					$sql=" UPDATE orders set  status='$status' WHERE id='$id' ";
								
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

			$sql=" SELECT * FROM orders WHERE id='$id' ";
		$result = mysqli_query($connection,$sql);
		while($row=mysqli_fetch_assoc($result)) {

				$status = $row["status"];
				
							

		}
			?>
      </td>
      </tr>
    		<tr>
			<td>
			Status
			</td>
			<td>
			<input name="status" id="status" value="<?php echo $status; ?>"<br>
			</td>
			</tr>
			
			
     
  </table>
  <input type="submit" name="submit" id="submit" value="Save Data" /></td>
</form>
<?php
include("footer.php");
?>