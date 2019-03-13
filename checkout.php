<?php
include("mensHeader.php");
?>
       
        <?php
        	//print_r($_SESSION);
          if($_SESSION["cart"]==""){
            echo"Your cart seems empty please add some goods to it";
          }
          else{
        	if(isset($_SESSION["frontEndUser"])) {
           

            header("location: logout.php");
				    
				  
							
        	} 
          else {
            header("location: frontEndLogin.php");
              }
          }
	?>
	
	
	
	<?php					
        	
        
        ?>
        
        
        
        
<?php
include("mensFooter.php");
?>     