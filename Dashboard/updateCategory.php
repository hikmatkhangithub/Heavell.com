<?php
include("header.php");
?>
		<h2>Update Category</h2>
<?php
$id = $_GET["id"];
?>

<form  method="post" action="">
<table id="tableForUpdate" >
    <tr>
      <td colspan="2">
      <?php
      	  	$error="";
	  	if(isset($_POST["submit"])) {
			$cat_name = $_POST["cat_name"];
			 $update_sex=$_POST["updateSex"];
			if($cat_name=="") { 
				$error.="Please fill all the required fields. <br> ";	
			} 
			if($error=="") {

				$sql=" UPDATE category set categoryName='$cat_name', gender='$update_sex' WHERE id='$id' ";
				$result = mysqli_query($connection,$sql);
				
								if($result) {
					echo "Data Submitted";		
					
				} else {
					echo mysqli_error();	
				}									
			} else {
				echo $error;	
			}

				

			
		}
		$sql="SELECT * FROM category WHERE id='$id'";
		$result = mysqli_query($connection, $sql) or die(mysqli_error());
		$row = mysqli_fetch_assoc($result);
	  ?>
      </td>
      </tr>
    <tr>
      <td>Category Name *</td>
      <td><input type="text" name="cat_name" id="cat_name" value="<?php echo $row['categoryName']; ?>" /></td>
     </tr>
     <tr>
     <td>For(Male/Female)
      <td><input type="radio" name="updateSex" value="male" <?php if($row['gender']=="male") echo "checked"; ?>>Male
      	  <br>
          <input type="radio" name="updateSex" value="female" <?php if($row['gender']=="female") echo "checked"; ?>>Female</td>
    </tr>       
  </table>
  <input type="submit" name="submit" id="submit" value="Save Data" /></td>
</form>
<?php
include("footer.php");
?>