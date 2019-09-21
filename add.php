<html>
<head>
	<title>Add Data</title>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<div class="container">
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$pName = $_POST['pName'];
	$pDesc = $_POST['pDesc'];
	$pPrice = $_POST['pPrice'];
	$pStock = $_POST['pStock'];
		
	// checking empty fields
	if(empty($pName) || empty($pDesc) || empty($pPrice) || empty($pStock)) {
				
		if(empty($pName)) {
			echo "<font color='red'>Product Name field is empty.</font><br/>";
		}
		if(empty($pDesce)) {
			echo "<font color='red'>Product Description field is empty.</font><br/>";
		}
		
		if(empty($pPrice)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		
		if(empty($pStock)) {
			echo "<font color='red'>Stock field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO products (pName, pDesc, pPrice, pStock) VALUES(:pName, :pDesc, :pPrice, :pStock)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':pName', $pName);
		$query->bindparam(':pDesc', $pDesc);
		$query->bindparam(':pPrice', $pPrice);
		$query->bindparam(':pStock', $pStock);
		$query->execute();
		
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':pName' => $pName, ':pPrice' => pPrice, ':pStock' => $pStock));
		
		//display success message
		echo "<h2 class=\"text-success\">Data added successfully.</h2>";
		echo "<br/><h2 class=\"text-success\"><a href='addproducts.php'>View Result</a></h2>";
	}
}
?>
</div>
</body>
</html>
