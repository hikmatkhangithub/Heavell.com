
<?php
include("dashboard/connection.php");
			$firstName = "";
			$lastName = "";
			$phone="";
			$address="";
			$username="";
			$password = "";
			$error="";

			if(isset($_POST["submit"])){
				
				$firstName = $_POST["firstName"];
				$lastName = $_POST["lastName"];
				$phone = $_POST["phone"];
		        $address = $_POST["address"];
				$username = $_POST["username"];
				$password= md5($_POST["password"]);
				

				if($firstName=="" || $lastName=="" || $phone=="" || $address=="" || $username=="") {
				$error.="Please fill all the required fields. <br> ";	
				
				}
					
				
				//checking the duplication of username
				$sql1 = "SELECT * FROM customer where username='$username'";

				$result1 = mysqli_query($connection,$sql1);

				if (mysqli_num_rows($result1) > 0) {
  					$error.="Username Exists Please type another!!";
					}		

							
			if($error=="") {
				
				$sql = "INSERT INTO customer (firstName,lastName, phone, address, username, password) VALUES ('$firstName', '$lastName', '$phone', '$address', '$username', '$password')";
								
				$result = mysqli_query($connection,$sql) or die(mysqli_error());
				if($result) {
					echo "Data Submitted";		
					$firstName = "";
					$lastName = "";
					$phone="";
					$address="";
					$username="";
					$password = "";
					header("location: frontEndLogin.php");

				} else {
					echo mysqli_error();	
				}	

			}										
			else{
				echo $error;
			}
			}
?>