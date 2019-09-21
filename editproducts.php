<?php
// including the database connection file
include_once("config.php");


if(isset($_POST['Submit']))
{	
	$pId = $_POST['pId'];
	$pName = $_POST['pName'];
	$pDesc = $_POST['pDesc'];
	$pPrice = $_POST['pPrice'];
	$pStock = $_POST['pStock'];	
	
	// checking empty fields
	if(empty($pName) || empty($pDesc) || empty($pPrice)  || empty($pStock)) {	
			
		if(empty($pName)) {
			echo "<h4 class=\"text-danger\">Customer Name field is empty.</h4><br/>";
		}
		if(empty($pDesc)) {
			echo "<h4 class=\"text-danger\">pDesc field is empty.</h4><br/>";
		}
		if(empty($pPrice)) {
			echo "<h4 class=\"text-danger\">pPrice field is empty.</h4><br/>";
		}

		if(empty($pStock)) {
			echo "<h4 class=\"text-danger\">Stock Name field is empty.</h4><br/>";
		}

		// if all the fields are filled (not empty) 
			
		//insert data to database	
	} else {	
		//updating the table
		$sql = "UPDATE products SET pName=:pName, pDesc=:pDesc, pPrice=:pPrice, pStock=:pStock WHERE pId=:pId";
				$query = $dbConn->prepare($sql);
		
		$query->bindparam(':pId', $pId);
		$query->bindparam(':pName', $pName);
		$query->bindparam(':pDesc', $pDesc);
		$query->bindparam(':pPrice', $pPrice);
		$query->bindparam(':pStock', $pStock);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':pId' => $pId, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		// header("Location: index.php");
		//display success message
		echo "<font color='green'>Data edited successfully.";
		echo "<br/><a href='addproducts.php'>View Result</a>";
	}
}
?>


<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="addproducts.php">Back</a>
	<br/><br/>

	<?php
//getting id from url
$pId = $_GET['id'];
//fetching data in descending order (lastest entry first)
$sql = "SELECT * FROM products WHERE pId=:pId";
$query = $dbConn->prepare($sql);
$query->execute(array(':pId' => $pId));
while($row = $query->fetch(PDO::FETCH_ASSOC)) { 		
    echo "<tr>";
    echo "<td>".$row['pId']."</td>";
    echo "<td>".$row['pName']."</td>";
    echo "<td>".$row['pPrice']."</td>";	
    echo "<td>".$row['pDesc']."</td>";
    echo "<td>".$row['pStock']."</td>";
   		
	
	



echo "


<form name=\"form1\" method=\"post\" action=\"editproducts.php\">
<table border=\"0\">
		<div class=\"form-group\">
		<h5>Product ID: $row[pId]</h5>
		<input type=\"hidden\" class=\"form-control\" value=\"$row[pId]\" name=\"pId\">
		</div>
        <tr> 
            <td>Product Name</td>
            <td><input type=\"text\" name=\"pName\" value=\"$row[pName]\"></td>
        </tr>
        <tr> 
            <td>Descriptions</td>
            <td><input type=\"text\" name=\"pDesc\" value=\"$row[pDesc]\"></td>
        </tr>
        <tr> 
            <td>Price</td>
            <td><input type=\"number\" name=\"pPrice\" value=\"$row[pPrice]\"></td>
        </tr>
        <tr> 
            <td>Stocks</td>
            <td><input type=\"number\" name=\"pStock\" value=\"$row[pStock]\"></td>
        </tr>
        <tr>
       
            <td><input type=\"submit\" name=\"Submit\" value=\"Save Changes\"></td>
        </tr>
        
    </table>
</form>";
}
?>
	

</body>
</html>
