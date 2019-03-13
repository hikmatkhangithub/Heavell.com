
<?php
include("header.php");
$search = $_GET["search"];
$searchType = $_GET["searchDrop"];
if($searchType=="Product"){
	include("searchProduct.php");
} else if($searchType=="Brand") {
	include("searchBrand.php");
} else if($searchType=="Category") {
	include("searchCategory.php");
} 
?>
			
<?php
include("footer.php");
?>