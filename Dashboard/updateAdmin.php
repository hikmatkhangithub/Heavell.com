<?php
include("header.php");
?>
		<h2>Update Admin Users</h2>
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
			$uname = $_POST["uname"];
			 $pwd=md5($_POST["pwd"]);
			 $email=$_POST["email"];

			if($uname=="" || $pwd=="" || $email=="" ) {
	
			$error.="Please fill all the required fields. <br> ";
				} 


				
					
			if($error=="") {
				$sql=" UPDATE admin set username='$uname',password='$pwd',email='$email' WHERE id='$id' ";
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
		$sql="SELECT * FROM admin WHERE id='$id'";
//		echo $sql;
		$result = mysqli_query($connection, $sql) or die(mysqli_error());
		$row = mysqli_fetch_assoc($result);
	  ?>
      </td>
      </tr>
    <tr>
      <td>Username:: *</td>
      <td><input type="text" name="uname" id="un1ame" value="<?php echo $row['username']; ?>" /></td>
     </tr>
     <tr>
     <td>Password:: *</td>
      <td><input type="text" name="pwd" id="pWd" value="<?php echo $row['password']; ?>" /></td>
     </tr>
     <tr>
     <td>Em@il:: *</td>
      <td><input type="text" name="email" id="Email" value="<?php echo $row['email']; ?>" /></td>
     </tr>
  </table>
  <input type="submit" name="submit" id="submit" value="Save Data" /></td>
</form>
<?php
include("footer.php");
?>