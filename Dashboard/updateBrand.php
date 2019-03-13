<?php
include("header.php");
?>
		<h2>Update Brands</h2>
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
	  	if(isset($_POST["submit"])) {
			$bName = $_POST["bname"];			

			if($bName=="") {
	
			$error.="Please fill all the required fields. <br> ";
				} 
			if($error=="") {
				$sql=" UPDATE brand set brandName='$bName' WHERE id='$id' ";
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
		$sql=" SELECT * FROM brand WHERE id='$id' ";
		$result = mysqli_query($connection,$sql);
		while($row=mysqli_fetch_assoc($result)) {
					$bName = $row['brandName'];

			
		}
	  ?>
      </td>
      </tr>
    <tr>
      <td>Brand Name:: *</td>
      <td><input type="text" name="bname" id="bn1ame" value="<?php echo$bName; ?>" /></td>
     </tr>
     
  </table>
  <input type="submit" name="submit" id="submit" value="Save Data" /></td>
</form>
<?php
include("footer.php");
?>