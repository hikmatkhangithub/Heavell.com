<?php 
 include("header.php");
 ?>
	<body id="mensCorner">
	<div class="row">
	 
	</div><br><br><br>
	<div class="row">
		
	<div class="twelve columns">
		<div class="two columns" id="sideBar">
		<h2 id="headingForCategory">Categories</h2>
		<ul id="textInsideCategory">
		<?php  
		$sql = "SELECT * FROM category WHERE gender='male'";
		$result =mysqli_query($connection,$sql);
		while($row=mysqli_fetch_assoc($result)){
					$id=$row['id'];
			echo"<li class><a id='displayCategoryNames' href='showProductOfMens.php?id=".$id."'>".$row["categoryName"]."</a></li>";
		}
		?>
		</ul>
		</div>
		<div class="ten columns" id="contentBar">
		<div class="row">
		<div class="one columns"> </div>
		<div class="four columns"> 
		 <ul class="menu">
                <li><a href="#s1">Select Brand</a>
                    <ul class="submenu">
                    <?php
                    $sql = "SELECT brand.id, brand.brandName FROM brand";
                    $result =mysqli_query($connection,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                    	$id=$row['id'];
                        echo"<li>";
                        echo"<a href='showProductOfMensByBrand.php?id=".$id."'>".$row["brandName"]."</a></li>";
                    }

                       ?>
                        
                    </ul>
                </li>
                </ul>
            </div>
               	<div class="three columns"> </div>
               	<div class="three columns"> <form action="searchMens.php"><li class="field"><input name="search" type="text" placeholder="Type to Search"></li><input type="submit" name="submit" value="Search"></form></div>

               	
				
		</div>

		
		