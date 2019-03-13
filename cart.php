<?php
include("header.php");
if(!isset($_SESSION["frontEndUser"])) {
  header("location: frontEndLogin.php");
  die();
}

?>  
<body id="cart">
    <div id="myAccount">
       <h2>Cart</h2>
       <p>Here is Your Cart Information <?php echo$_SESSION["frontEndUser"];?></p>
       <h3>Display Cart Information</h3>
        <?php
        if(!isset($_SESSION["cart"])){
            echo"Your cart seems empty please add some goods to it";
          }
          else{
        	$grandTotal=0;
        	foreach($_SESSION["cart"] as $value) {
        		echo$value['image']."<br>";
				echo "ID = ".$value['id']."<br>";
				echo "Productname = ".$value['name']."<br>";
				echo "Price = ".$value['price']."<br>";
				echo "Qty = ".$value['qty']."<br>";
                echo "Size = ".$value['size']."<br>";                
				$total = $value['price']*$value['qty'];
				echo "Total = ".$total."<br>";
				
				$grandTotal+=$total;		
				echo "<hr>";						
        	}
			echo "Grand Total = ".$grandTotal;

        	//Inserting data into value


        $sql = "INSERT INTO orders (customerId, productId, payDate, price, quantity, size, totalPrice  ) VALUES ('{$_SESSION['fronEndUserId']}', '{$value['id']}', 'NOW()', '{$value['price']}', '{$value['qty']}', '{$value['size']}','{$total}')";
        $result=mysqli_query($connection,$sql);
        }
        ?>
        <br><div class="medium primary btn"><a href="index.php">Continue Shopping</a> </div>
          <div class="medium secondary btn"><a href="logout.php"><i class='icon-logout'></i>Log out</a></div>        
        
        </div>
        </body>
<?php
include("mensFooter.php");
?> 