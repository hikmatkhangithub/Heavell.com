<?php
include("header.php");
?>
		<h2>Update Shop</h2>
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
				
				$permission = $_POST["permission"];
				
						

				if($permission=="") {
				$error.="Please fill all the required fields. <br> ";	
				
				}
				
				
						
					
			if($error=="") {
				
					$sql=" UPDATE shop set  permission='$permission' WHERE id='$id' ";
								
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

			$sql=" SELECT * FROM shop WHERE id='$id' ";
		$result = mysqli_query($connection,$sql);
		while($row=mysqli_fetch_assoc($result)) {

				$permission = $row["permission"];
				
							

		}
			?>
      </td>
      </tr>
    		<tr>
			<td>
			Grant Permission
			</td>
			<td>
			<select name="permission" id="per">
      		   <option value="Yes" <?php if($permission=="Yes") echo "selected"; ?>>Yes</option>
        	  <option value="No" <?php if($permission=="No") echo "selected"; ?>>No</option>
    		   </select></td>
			</td>
			</tr>



			
     
  </table>
  <input type="submit" name="submit" id="submit" value="Save Data" /></td>
</form>
<?php
include("footer.php");
?>